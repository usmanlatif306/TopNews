<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Content;
use App\Models\News;
use Carbon\Carbon;

class SitemapController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        // sitemap for pages
        $categories = News::categories(false);
        $data['pages']['homepage']['route'] = 'homepage';
        $data['pages']['homepage']['updated_at'] = News::select(['updated_at', 'slug'])->whereCategory('top')->latest()->first()->updated_at;

        foreach ($categories as $category) {
            $page = News::select(['updated_at', 'slug'])->whereCategory($category)->latest()->first();
            $data['pages'][$category]['route'] = 'page';
            $data['pages'][$category]['updated_at'] = $page->updated_at ?? now();
        }

        // sitemap for news
        $posts = News::select(['updated_at', 'slug', 'category'])->get();
        foreach ($posts as $item) {
            $post['route'] = 'news.show';
            $post['slug'] = $item->slug;
            $post['category'] = $item->category;
            $post['updated_at'] = $item->updated_at;
            $data['news'][] = $post;
        }
        // dd($data);


        return response()->view('sitemap.index', compact('data'))->header('Content-Type', 'text/xml');
    }

    // public function page(Request $request)
    // {
    //     $homepage_last_updated_at = settings('homepage_last_updated_at');

    //     if ($homepage_last_updated_at) {
    //         $homepage_last_updated_at = Carbon::createFromDate($homepage_last_updated_at);
    //     }

    //     $data['routes'] = [

    //         'homepage' => $homepage_last_updated_at,
    //         'pricing' => NULL,
    //         'contact' => NULL,
    //         'instant_quote' => NULL,
    //         'how_it_works' => optional($contents)['how-it-works'],
    //         'faq' => optional($contents)['faq'],
    //         'money_back_guarantee' => optional($contents)['money-back-guarantee'],
    //         'privacy_policy' => optional($contents)['privacy-policy'],
    //         'revision_policy' => optional($contents)['revision-policy'],
    //         'disclaimer' => optional($contents)['disclaimer'],
    //         'terms_and_conditions' => optional($contents)['terms-and-conditions']
    //     ];

    //     return response()->view('sitemap.page', compact('data'))->header('Content-Type', 'text/xml');
    // }
}
