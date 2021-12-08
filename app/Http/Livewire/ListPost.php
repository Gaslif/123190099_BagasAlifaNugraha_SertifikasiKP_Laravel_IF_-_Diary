<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class ListPost extends Component
{
    public $updateStateId = 0;
    public $body= 0;

    protected $listeners =[
        'posted' =>'$refresh'       //merefresh komponen posted ketika button post di klik
    ];


    public function render()
    {
        return view('livewire.list-post',[
            'posts' => Post::latest()->get()
        ]);
    }

    public function showUpdateForm($postId) // mengedit test pada body yang telah di post
    {
        $post = Post::find($postId);
        $this->body = $post->body;
        $this->updateStateId = $postId;
    }

    public function update($postId) // menyimpan editan body
    {
        $post = Post::find($postId);
        $post->body = $this->body;
        $post->save();

        $this->updateStateId = 0;
    }

    public function delete($postId)
    {
        $post = Post::find($postId);
        $post->delete();
    }
}
