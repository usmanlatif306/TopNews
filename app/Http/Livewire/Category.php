<?php

namespace App\Http\Livewire;

use App\Models\Category as ModelsCategory;
use Livewire\Component;

class Category extends Component
{
    public function render()
    {
        return view('livewire.category', [
            'categories' => ModelsCategory::get()
        ]);
    }

    public function toggleCategory($id)
    {
        $category = ModelsCategory::find($id);
        $category->update([
            'status' => $category->status ? false : true
        ]);
    }
}
