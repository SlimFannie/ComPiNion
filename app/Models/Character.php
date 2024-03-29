<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    use HasFactory;

    // Un Compinion a plusieurs usagers
    public function users()
    {
        return $this->hasMany(User::class);
    }

}
