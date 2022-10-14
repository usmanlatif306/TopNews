<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Setting;
use Illuminate\Http\Request;

class SeoController extends Controller
{
    public function index()
    {
        $tags = ['title', 'description', 'keywords'];
        $pages = News::categories(false, 'homepage');
        $data = [];

        foreach ($pages as $page) {
            foreach ($tags as $tag) {
                $field = 'seo_' . $tag . '_' . $page;
                $data[$page][$tag] = $field;
            }
        }
        return view('admin.seo', compact('data'));
    }

    public function store(Request $request)
    {
        $fields = $request->except('_token');
        foreach ($fields as $key => $value) {
            if ($value) {
                Setting::updateOrCreate(
                    ['key' => $key],
                    ['key' => $key, 'value' => $value]
                );
            }
        }

        return redirect()->back()->with('success', 'Seo fields updated succeffully');
    }
}
