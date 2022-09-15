<?php

namespace App\Http\Livewire;

use App\Models\News;
use Livewire\Component;
use Livewire\WithPagination;

class AdminPosts extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search = '';
    public $categories;
    public $category = 'all';
    public $country = 'gb';
    public $limit = 10;

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
            ->when($this->search !== '', function ($q) use ($searchTerm) {
                return $q->where('title', 'like', $searchTerm)
                    ->orWhere('category', 'like', $searchTerm);
            })
            ->latest();

        return view('livewire.admin-posts', [
            'posts' => $query->paginate($this->limit)
        ]);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    // select category
    public function selectCategory($category)
    {
        $this->category = $category;
    }

    public function togglePost($id)
    {
        $news = News::find($id);
        $news->update([
            'status' => $news->status ? false : true
        ]);
    }
}
