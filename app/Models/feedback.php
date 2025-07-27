<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class feedback extends Model
{
    use HasFactory;
      public function getuser() {
        return $this->belongsTo(User::class, 'user_id'); 
        // yahan 'user_id' woh column hai jo feedback table me user ki ID store karta hai
    }
}
