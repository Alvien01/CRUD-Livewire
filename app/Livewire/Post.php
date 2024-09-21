<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads; // Tambahkan ini

#[Title('Post')]
class Post extends Component
{
    use WithFileUploads; // Pastikan ini sudah ada
    public $post, $title, $kategori, $content, $postId, $slug, $status, $updatePost = false, $addPost = false;
    public $image; // Tambahkan ini

    protected $rules = [
        'title' => 'required',
        'content' => 'required',
        'status' => 'required',
        'kategori' => 'required',
        'image' => 'nullable|image|max:1024', // Validasi gambar
    ];

    public function resetFields()
    {
        $this->title = '';
        $this->content = '';
        $this->kategori = '';
        $this->status = 1;
        $this->image = null; // Reset gambar
    }

    public function render()
    {
        $posts = \App\Models\Post::orderBy('created_at', 'asc')->get(); 
        return view('livewire.post', compact('posts'));
    }

    public function create()
    {
        $this->resetFields();
        $this->addPost = true;
        $this->updatePost = false;
    }

    public function store()
{
    $this->validate();

    \App\Models\Post::create([
        'title' => $this->title,
        'kategori' => $this->kategori,
        'content' => $this->content,
        'status' => $this->status, // Pastikan status tersimpan dengan benar
        'slug' => Str::slug($this->title),
        'image' => $this->image ? $this->image->store('images') : null,
    ]);

    session()->flash('success', 'Post Created Successfully!!');
    $this->resetFields();
    $this->addPost = false;
}


    public function edit($id)
    {
        $post = \App\Models\Post::findOrFail($id);
        $this->post = $post;
        $this->title = $post->title;
        $this->kategori = $post->kategori;
        $this->content = $post->content;
        $this->status = $post->status;
        $this->postId = $post->id;
        $this->updatePost = true;
        $this->addPost = false;
    }
    
    public function update()
    {
        $this->validate();

        try {
            \App\Models\Post::whereId($this->postId)->update([
                'title' => $this->title,
                'kategori' => $this->kategori,
                'content' => $this->content,
                'image' => $this->image ? $this->image->store('images') : null, // Simpan gambar jika diupload
                'status' => $this->status,
                'slug' => Str::slug($this->title),

            ]);
            session()->flash('success', 'Post Updated Successfully!!');
            $this->resetFields();
            $this->updatePost = false;
        } catch (\Exception $ex) {
            session()->flash('error', 'Something goes wrong!!');
        }
    }

    public function cancel()
    {
        $this->addPost = false;
        $this->updatePost = false;
        $this->resetFields();
    }

    public function destroy($id)
    {
        try {
            \App\Models\Post::find($id)->delete();
            session()->flash('success', "Post Deleted Successfully!!");
        } catch (\Exception $e) {
            session()->flash('error', "Something goes wrong!!");
        }
    }
}
