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
            'full_name' => 'Doctor Name',
            'image' => 'images/profile/1617171121-profile-image.jpg',
            'slug' => 'doctor-name',
            'phone' => '++88 017 1234 578',
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
            'full_name' => 'Patient',
            'image' => 'images/profile/1617171688-profile-image.jpg',
            'slug' => 'ahmed-ahnaf',
            'phone' => '+88 017 1234 578',
            'gender' => 'Male',
            'birth_date' => '12,08,1995',
            'age' => '26',
            'address' => 'Khulna, Bangladesh',
            'medical_history' => 'Veary Normal',
            'status' => 1,
        ]);
        
        Profile::create([
            'user_id' => 3,
            'user_role' => 0,
            'full_name' => 'Patient',
            'image' => null,
            'slug' => 'ahmed-ahnaf',
            'phone' => '+88 017 1234 578',
            'gender' => 'Male',
            'birth_date' => '12,08,1995',
            'age' => '26',
            'address' => 'Khulna, Bangladesh',
            'medical_history' => 'Veary Normal',
            'status' => 1,
        ]);

        Profile::create([
            'user_id' => 4,
            'user_role' => 0,
            'full_name' => 'Patient',
            'image' => null,
            'slug' => 'ahmed-ahnaf',
            'phone' => '+88 017 1234 578',
            'gender' => 'Male',
            'birth_date' => '12,08,1995',
            'age' => '26',
            'address' => 'Khulna, Bangladesh',
            'medical_history' => 'Veary Normal',
            'status' => 1,
        ]);

        Profile::create([
            'user_id' => 5,
            'user_role' => 0,
            'full_name' => 'Patient',
            'image' => null,
            'slug' => 'ahmed-ahnaf',
            'phone' => '+88 017 1234 578',
            'gender' => 'Male',
            'birth_date' => '12,08,1995',
            'age' => '26',
            'address' => 'Khulna, Bangladesh',
            'medical_history' => 'Veary Normal',
            'status' => 1,
        ]);

        Profile::create([
            'user_id' => 6,
            'user_role' => 0,
            'full_name' => 'Patient',
            'image' => null,
            'slug' => 'ahmed-ahnaf',
            'phone' => '+88 017 1234 578',
            'gender' => 'Male',
            'birth_date' => '12,08,1995',
            'age' => '26',
            'address' => 'Khulna, Bangladesh',
            'medical_history' => 'Veary Normal',
            'status' => 1,
        ]);

        Profile::create([
            'user_id' => 7,
            'user_role' => 0,
            'full_name' => 'Patient',
            'image' => null,
            'slug' => 'ahmed-ahnaf',
            'phone' => '+88 017 1234 578',
            'gender' => 'Male',
            'birth_date' => '12,08,1995',
            'age' => '26',
            'address' => 'Khulna, Bangladesh',
            'medical_history' => 'Veary Normal',
            'status' => 1,
        ]);

        Profile::create([
            'user_id' => 8,
            'user_role' => 0,
            'full_name' => 'Patient',
            'image' => null,
            'slug' => 'ahmed-ahnaf',
            'phone' => '+88 017 1234 578',
            'gender' => 'Male',
            'birth_date' => '12,08,1995',
            'age' => '26',
            'address' => 'Khulna, Bangladesh',
            'medical_history' => 'Veary Normal',
            'status' => 1,
        ]);

        Profile::create([
            'user_id' => 9,
            'user_role' => 0,
            'full_name' => 'Patient',
            'image' => null,
            'slug' => 'ahmed-ahnaf',
            'phone' => '+88 017 1234 578',
            'gender' => 'Male',
            'birth_date' => '12,08,1995',
            'age' => '26',
            'address' => 'Khulna, Bangladesh',
            'medical_history' => 'Veary Normal',
            'status' => 1,
        ]);

        Profile::create([
            'user_id' => 10,
            'user_role' => 0,
            'full_name' => 'Patient',
            'image' => null,
            'slug' => 'ahmed-ahnaf',
            'phone' => '+88 017 1234 578',
            'gender' => 'Male',
            'birth_date' => '12,08,1995',
            'age' => '26',
            'address' => 'Khulna, Bangladesh',
            'medical_history' => 'Veary Normal',
            'status' => 1,
        ]);

        Profile::create([
            'user_id' => 11,
            'user_role' => 0,
            'full_name' => 'Patient',
            'image' => null,
            'slug' => 'ahmed-ahnaf',
            'phone' => '+88 017 1234 578',
            'gender' => 'Male',
            'birth_date' => '12,08,1995',
            'age' => '26',
            'address' => 'Khulna, Bangladesh',
            'medical_history' => 'Veary Normal',
            'status' => 1,
        ]);

        Profile::create([
            'user_id' => 12,
            'user_role' => 0,
            'full_name' => 'Patient',
            'image' => null,
            'slug' => 'ahmed-ahnaf',
            'phone' => '+88 017 1234 578',
            'gender' => 'Male',
            'birth_date' => '12,08,1995',
            'age' => '26',
            'address' => 'Khulna, Bangladesh',
            'medical_history' => 'Veary Normal',
            'status' => 1,
        ]);

        Profile::create([
            'user_id' => 13,
            'user_role' => 0,
            'full_name' => 'Patient',
            'image' => null,
            'slug' => 'ahmed-ahnaf',
            'phone' => '+88 017 1234 578',
            'gender' => 'Male',
            'birth_date' => '12,08,1995',
            'age' => '26',
            'address' => 'Khulna, Bangladesh',
            'medical_history' => 'Veary Normal',
            'status' => 1,
        ]);
    }
}
