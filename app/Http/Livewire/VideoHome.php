<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Video;
use App\Models\User;

class VideoHome extends Component
{
    public $videoId;

    public function mount($videoId = null){
        $this->videoId = $videoId;
    }

    public function read(){
        return Video::where('id', $this->videoId)->first();
    }

    public function user($userId){
        return User::where('id', $userId)->first();
    }

    public function userVideos($userId){
        return Video::where('user_id', $userId)->where('id', '!=', $this->videoId)->get();
    }
    
    public function render()
    {
        return view('livewire.video',[
            'data' => $this->read()
        ])->layout('layouts.frontend');
    }
}
