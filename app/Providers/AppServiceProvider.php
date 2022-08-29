<?php

namespace App\Providers;

use App\Models\News;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    public $news;
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->news = News::latest()->take(20)->get();
        Schema::defaultStringLength(191);
        View::share('breaking_news', $this->news);
        View::share('recent_posts', $this->news->take(5));
    }
}
