<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Video;

class UserHome extends Component
{
    public $categorySelected = 'prelim';
    public $userId;

    public function mount($userId){
        $this->userId = $userId;
    }

    public function allUser(){
        return User::all();
    }

    public function user($id){
        return User::where('id', $id)->first();
    }

    public function allVideos(){
        return Video::where('user_id', $this->userId)->latest()->get();
    }

    public function categories(){
        if($this->categorySelected == 'prelim'){
            return Video::where('user_id', $this->userId)->where('category', 'prelim')->latest()->get();
        }
        if($this->categorySelected == 'mid'){
            return Video::where('user_id', $this->userId)->where('category', 'mid')->latest()->get();
        }
        if($this->categorySelected == 'final'){
            return Video::where('user_id', $this->userId)->where('category', 'final')->latest()->get();
        }
    }

    public function changeCategory($cat){
        $this->categorySelected = $cat;
        $this->render();
    }

    public function render()
    {
        return view('livewire.user', [
            'categories' => $this->categories(),
        ])->layout('layouts.frontend');
    }
}
