<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class ViewMoreController extends Controller
{
    public function homepage(Request $request)
    {
        $total = News::count();
        $latests = News::with('news_description')->take($request->number)->get();

        return view('partials.homepage_view_more', compact('latests', 'total'));
        // return response([
        //     'total' => $total,
        //     'request' => $request->all(),
        //     'latest' => $latests->count()
        // ]);
    }
}
