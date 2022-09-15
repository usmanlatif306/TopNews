<?php

// latest previous service

use App\Models\Setting;

if (!function_exists('setting')) {
    function setting($setting_name = Null)
    {
        $setting = Setting::where('key', $setting_name)->first();

        return $setting ? $setting->value : null;
    }
}
