<?php

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Profile::create([
            'user_id' => 1,
            'user_role' => 1,
            'full_name' => 'Nasrullah Mansur',
            'slug' => 'nasrullah-mansur',
            'phone' => '01728619733',
            'gender' => 'Male',
            'birth_date' => '12,12,1995',
            'age' => '26',
            'address' => 'Khulna, Bangladesh',
            'medical_history' => 'Veary Good',
            'status' => 1,
        ]);

        Profile::create([
            'user_id' => 2,
            'user_role' => 0,
            'full_name' => 'Ahmed Ahnaf',
            'slug' => 'ahmed-ahnaf',
            'phone' => '01728619722',
            'gender' => 'Male',
            'birth_date' => '12,08,1995',
            'age' => '26',
            'address' => 'Khulna, Bangladesh',
            'medical_history' => 'Veary Normal',
            'status' => 1,
        ]);
    }
}
