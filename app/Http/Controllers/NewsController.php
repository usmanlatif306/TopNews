<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Services\SeoService;
use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\SEOTools;

class NewsController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        (new SeoService())->load('homepage');
        return view('homepage');
    }


    /**
     * single category page 
     *
     * @param  mixed $category
     * @return void
     */
    public function page($category)
    {
        (new SeoService())->load($category);
        return view('page', compact('category'));
    }

    // show single headline
    public function show($category, News $news)
    {
        $news->load('news_description');

        SEOTools::setTitle($news->title . ' | ' . config('app.name'));
        SEOTools::setDescription($news->news_description->description);
        SEOTools::setCanonical(url('/'));
        SEOTools::opengraph()->setUrl(route('news.show', [$news->category, $news->slug]));
        SEOTools::jsonLd()->addImage(asset('images/TopNews-logo-1.png'));


        $latests = News::whereCategory($news->category)->latest()->take(5)->get();

        // share post options
        $shareComponent = \Share::page(
            route('news.show', [$news->category, $news->slug]),
            $news->title,
        )
            ->facebook()
            ->twitter()
            ->linkedin()
            ->telegram()
            ->whatsapp();

        // dd($shareComponent);
        return view('news.show', compact('news', 'latests', 'shareComponent'));
        // dd($headline);
    }

    // search
    public function search(Request $request)
    {
        $search = $request->q;

        return view('news.search', compact('search'));
    }
}
