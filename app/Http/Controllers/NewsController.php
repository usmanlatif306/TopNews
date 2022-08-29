<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Services\NewsDataService;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        // $query = array("country" => "gb", "page" => 0);
        // (new NewsDataService())->getLatestNews($query);
        // $categories = News::categories();

        // foreach ($categories as $category) {
        //     $data[$category] = News::whereCategory($category)->whereCountry('gb')->latest()->take(6)->get();
        // }
        // $data['total'] = News::count();
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
        // $data['page'] = News::whereCategory($category)->latest()->take(12)->get();
        return view('page', compact('category'));
    }

    // show single headline
    public function show($category, News $news)
    {
        $news->load('news_description');

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
