<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Answer extends Model
{
    use HasFactory;

    protected $fillable = [
        'ticket_id', 
        'p_id', 
        'answer', 
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function image() {
        return $this->hasMany(Photo::class);
    }
}
