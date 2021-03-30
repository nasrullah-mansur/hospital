<?php

namespace App\Models;

use App\Models\User;
use App\Models\Massage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ticket extends Model
{
    use HasFactory;
    use Notifiable;
    protected $fillable = [
        'user_id','subject', 'massage', 'status'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function answer()
    {
        return $this->hasMany(Answer::class, 'ticket_id');
    }
}

