<?php

namespace App\Http\Livewire;

use App\Models\News;
use Livewire\Component;

class CategoryPage extends Component
{
    public $data = [];
    public $country = 'gb';
    public $category;

    protected $listeners = ['countryChanged' => 'changedCountry'];

    public function render()
    {
        $this->data['page'] = News::query()
            ->whereCategory($this->category)
            ->whereCountry($this->country)
            ->latest()
            ->take(12)
            ->get();

        return view('livewire.category-page');
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
