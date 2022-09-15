<?php

namespace App\Http\Livewire;

use App\Models\News;
use Livewire\Component;

class HomepageViewMore extends Component
{
    public $result = 5;
    public $total;

    public function mount()
    {
        $this->total = News::count();
    }

    public function render()
    {
        return view('livewire.homepage-view-more', [
            'latests' => News::whereStatus(true)->latest()->take($this->result)->get(),
        ]);
    }

    // add more results
    public function addMore($number = 5)
    {
        $this->result += $number;
    }
}
