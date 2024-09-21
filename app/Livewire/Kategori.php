<?php

namespace App\Livewire;

use App\Models\Kategori as KategoriModel; // Import the Kategori model
use Livewire\Component;

class Kategori extends Component
{
    public $kategori, $slug;
    public $updateKategori = false;
    public $addKategori = false;

    protected $rules = [
        'kategori' => 'required',
        'slug' => 'required'
    ];

    public function resetFields()
    {
        $this->kategori = '';
        $this->slug = '';
    }

    public function render()
    {
        $kategori = \App\Models\Kategori::all(); // Fetch all categories
        return view('livewire.kategori', compact('kategori'));
    }

    public function create()
    {
        $this->resetFields();
        $this->addKategori = true;
        $this->updateKategori = false;
    }

    // Additional methods for store, edit, update, and destroy can be added here.
}
