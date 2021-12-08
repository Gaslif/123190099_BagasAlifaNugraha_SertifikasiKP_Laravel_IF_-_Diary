<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreatePost extends Component
{
    use WithFileUploads;

    public $image;

    public $body;  //property public

    public function render()
    {
        return view('livewire.create-post');
    }
    
    public function createPost()
    {
        Post::create([
            'user_id' =>Auth::id(),
            'image' => $this->validate([
                'image' => 'image|max:1024', // 1MB Max
            ]),
            $this->image->store('images'),  //*GAGAL menyimpan foto
            'body' => $this->body,
        ]);

        $this->body = "";  //mengosongkan body ketika di submit
        $this->emit('posted'); 
    }
}
