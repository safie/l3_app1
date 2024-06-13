<?php

namespace App\Livewire\Posts;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $post;

    public function mount()
    {
        // $posts = Post::paginate(10);

        // $this->posts = $posts->map(
        //     function ($post, $index) use ($currentPage, $perPage) {
        //         $posts->no = ($currentPage - 1) * $perPage + ($index + 1);
        //         return $post;
        //     }
        // );
    }

    public function destroy($id)
    {
        //destroy
        Post::destroy($id);

        //flash message
        session()->flash('message', 'Data Berhasil Dihapus.');

        //redirect
        return redirect()->route('posts.index');
    }

    public function render()
    {
        return view('livewire.posts.index', [
            'posts' => Post::paginate(10)
        ]);
    }
}
