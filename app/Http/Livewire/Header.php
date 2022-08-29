<?php

namespace App\Http\Livewire;

use App\Models\Country;
use Livewire\Component;

class Header extends Component
{
    public $country;

    /**
     * mount
     *
     * @return void
     */
    public function mount()
    {
        $this->country = config('services.country');
    }
    /**
     * render
     *
     * @return void
     */
    public function render()
    {
        return view('livewire.header', [
            'countries' => Country::select(['name', 'code'])->get()
        ]);
    }

    /**
     * updatedCountry
     *
     * @return void
     */
    public function updatedCountry()
    {
        $this->emit('countryChanged', $this->country);
    }
}
