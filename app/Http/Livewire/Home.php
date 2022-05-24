<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Video;

class Home extends Component
{
    public $categorySelected = 'prelim';

    public function allUser(){
        return User::all();
    }

    public function user($id){
        return User::where('id', $id)->first();
    }

    public function allVideos(){
        return Video::latest()->get();
    }

    public function categories(){

        if($this->categorySelected == 'prelim'){
            return Video::where('category', 'prelim')->latest()->get();
        }
        if($this->categorySelected == 'mid'){
            return Video::where('category', 'mid')->latest()->get();
        }
        if($this->categorySelected == 'final'){
            return Video::where('category', 'final')->latest()->get();
        }
    }

    public function changeCategory($cat){
        $this->categorySelected = $cat;
        $this->render();
    }

    public function render()
    {
        return view('livewire.home', [
            'allUser' => $this->allUser(),
            'categories' => $this->categories()
        ])->layout('layouts.frontend');
    }
}
