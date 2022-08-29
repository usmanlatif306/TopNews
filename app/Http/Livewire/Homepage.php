<?php

namespace App\Http\Livewire;

use App\Models\News;
use Livewire\Component;

class Homepage extends Component
{
    public $data = [];
    public $country = 'gb';

    protected $listeners = ['countryChanged' => 'changedCountry'];

    public function render()
    {
        $categories = News::categories();

        foreach ($categories as $category) {
            $this->data[$category] = News::whereCategory($category)->whereCountry($this->country)->latest()->take(6)->get();
        }
        $this->data['total'] = News::count();

        return view('livewire.homepage');
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
