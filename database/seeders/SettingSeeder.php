<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Company Name
        Setting::create([
            'key' => 'company_name',
            'value' => 'Xorexs News'
        ]);

        // Newsdata api key
        Setting::create([
            'key' => 'news_data_key',
            'value' => 'pub_10329a6571ebcbc825afd339630330cb0f7c0'
        ]);
    }
}
