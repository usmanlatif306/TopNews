<?php

namespace App\Http\Livewire;

use App\Models\News;
use Livewire\Component;

class Search extends Component
{
    public $search;
    public $limit = 5;
    public $results = [];
    public $total;
    public $categories;
    public $category = 'all';
    public $country = 'gb';

    protected $listeners = ['countryChanged' => 'changedCountry'];

    public function mount()
    {
        $this->categories = News::categories();
    }


    public function render()
    {
        $searchTerm = '%' . $this->search . '%';

        $query = News::query()
            ->whereCountry($this->country)
            ->when($this->category !== 'all', function ($q) {
                return $q->where('category', $this->category);
            })
            ->where('title', 'like', $searchTerm)
            ->orWhere('category', 'like', $searchTerm);
        // ->orWhere('author', 'like', $searchTerm);

        $this->total = $query->count();
        $this->results = $query->take($this->limit)->get();


        return view('livewire.search');
    }

    // add more results
    public function loadMore($number = 5)
    {
        $this->limit += $number;
    }

    // select category
    public function selectCategory($category)
    {
        $this->category = $category;
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
