<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class ListPost extends Component
{
    public $updateStateId = 0;  //membuat id untuk update form
    public $body= 0;

    protected $listeners =[
        'posted' =>'$refresh'       //merefresh komponen posted ketika button post di klik -melisten
    ];


    public function render()
    {
        return view('livewire.list-post',[
            'posts' => Post::latest()->get()  //panggil post
        ]);
    }

    public function showUpdateForm($postId) // mengedit text pada body yang telah di post sesuai id
    {
        $post = Post::find($postId);
        $this->body = $post->body;
        $this->updateStateId = $postId;
    }

    public function update($postId) // function methode ketika edit
    {
        $post = Post::find($postId);
        $post->body = $this->body;
        $post->save();

        $this->updateStateId = 0;  // supaya tertutup lagi idnya
    }

    public function delete($postId)
    {
        $post = Post::find($postId);
        $post->delete();
    }
}
