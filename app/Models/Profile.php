<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 
        'user_role', 
        'full_name', 
        'slug', 
        'phone', 
        'gender', 
        'birth_date', 
        'age', 
        'address', 
        'medical_history',
        'status'
    ];

}