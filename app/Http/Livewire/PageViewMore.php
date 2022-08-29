<?php

namespace App\Http\Livewire;

use App\Models\News;
use Livewire\Component;

class PageViewMore extends Component
{
    public $category;
    public $result = 12;
    public $country = 'gb';
    public $total;

    protected $listeners = ['countryChanged' => 'changedCountry'];

    public function mount()
    {
        $this->total = News::whereCategory($this->category)->whereCountry($this->country)->count();
    }

    public function render()
    {
        return view('livewire.page-view-more', [
            'latests' => News::whereCategory($this->category)->whereCountry($this->country)->latest()->take($this->result)->get(),
        ]);
    }


    // add more results
    public function addMore($number = 3)
    {
        $this->result += $number;
    }

    /**
     * changedCountry
     *
     * @param  mixed $country
     * @return void
     */
    public function changedCountry($country)
    {
        $this->country = $country;
    }
}
