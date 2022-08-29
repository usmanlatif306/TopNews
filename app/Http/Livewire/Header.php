<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Header extends Component
{
    public $country = 'gb';

    /**
     * render
     *
     * @return void
     */
    public function render()
    {
        return view('livewire.header');
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
