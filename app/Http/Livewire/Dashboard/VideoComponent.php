<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use App\Models\Video;
use App\Models\User;

use Livewire\WithPagination;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class VideoComponent extends Component
{
    use WithPagination;
    public $modalFormVisible = false;
    public $modalConfirmDeleteVisible = false;
    public $modelId;

    public $title;
    public $embed_url;
    public $category;
    public $screenshot;

    protected $listeners = ['fileUpload'];
    
    //Validation Rules
    public function rules(){
        return [
            'title' => 'required',
            'embed_url' => 'required',
            'category' => 'required',
        ];
    }

    public function loadModel(){
        $data = Video::where('id', $this->modelId)->first();

        //Assign The Variable Here
        $this->title = $data->title;
        $this->embed_url = $data->embed_url;
        $this->category = $data->category;
    }
    
    //The Data for the model mapped in this component
    public function modelData($videoData = null, $user = null){
        return [
            'user_id' => (auth()->user()->is_admin == 1)? $user->id : auth()->id(),
            'title' => $this->title,
            'embed_url' => $this->embed_url,
            'category' => $this->category,
            'screenshot' => $this->storeImage() ?? $videoData->screenshot,
        ];
    }

    public function create(){
        $this->validate();
        Video::create($this->modelData());
        $this->modalFormVisible = false;
        $this->reset();
    }
    
    public function read(){
        if(auth()->user()->is_admin == 1){
            return Video::paginate(10);
        }
        return Video::where('id', auth()->id())->paginate(10);
    }

    public function update(){
        $this->validate();
        $video = Video::where('id', $this->modelId)->first();
        $user = User::where('id', $video->user_id)->first();
        // Storage::disk('public')->delete($video->screenshot);
        $video->update($this->modelData($video, $user));
        $this->reset();
    }

    public function delete(){
        Video::where('id', $this->modelId)->delete();
        $this->modalConfirmDeleteVisible = false;
    }

    public function createShowModal(){
        $this->resetValidation();
        $this->reset();
        $this->modalFormVisible = true;
    }

    public function updateShowModal($id){
        $this->resetValidation();
        $this->reset();
        $this->modalFormVisible = true;
        $this->modelId = $id;
        $this->loadModel();
    }

    public function deleteShowModal($id){
        $this->modelId = $id;
        $this->modalConfirmDeleteVisible = true;
    }

    public function fileUpload($imageData){
        $this->screenshot = $imageData;
    }

    private function storeImage(){
        if(!$this->screenshot) {
            return null;
        }
        
        $img = Image::make($this->screenshot)->resize(164, 236)->encode('jpg');
        $imgName = Str::random().'.jpg';
        Storage::disk('public')->put($imgName, $img);

        return $imgName;
    }

    public function user($id){
        return User::where('id', $id)->first();
    }

    public function render()
    {
        return view('livewire.Dashboard.video-component', [
            'data'=> $this->read()
        ])->layout('layouts.base');
    }
}