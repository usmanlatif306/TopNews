<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index()
    {
        $keys = ['company_name', 'news_data_key'];
        return view('admin.settings', compact('keys'));
    }

    public function store(Request $request)
    {
        $fields = $request->except('_token');
        foreach ($fields as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['key' => $key, 'value' => $value]
            );
        }

        return redirect()->back()->with('success', 'Settings updated succeffully');
    }

    public function account()
    {
        return view('admin.account');
    }
    public function general(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
        ]);
        $request->user()->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        if ($request->password) {
            $request->user()->update([
                'password' => Hash::make($request->password),
            ]);
        }

        return redirect()->back()->with('success', 'User profile updated succeffully');
    }

    public function profile_image(Request $request)
    {
        $originalFileName = $request->image->getClientOriginalName();
        $filename = pathinfo($originalFileName, PATHINFO_FILENAME);
        $extension = pathinfo($originalFileName, PATHINFO_EXTENSION);
        $fileName = $filename . "-" . time() . "." . $extension;
        $request->image->storeAs('images', $fileName, "public");

        if ($request->user()->image) {
            $path = str_replace('/storage', '/public', $request->user()->image);
            Storage::delete($path);
        }
        $request->user()->update([
            'image' => '/storage/images/' . $fileName
        ]);

        return redirect()->back()->with('success', 'Profile image updated succeffully');
    }
}
