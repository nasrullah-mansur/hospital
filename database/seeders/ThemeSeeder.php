<?php

namespace Database\Seeders;

use App\Models\Theme;
use Illuminate\Database\Seeder;

class ThemeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Theme::create([
            'theme_name' => 'Consultation System',
            'logo' => 'assets/images/logo.png',
            'favicon' => 'assets/images/favicon.png'
        ]);
    }
}
