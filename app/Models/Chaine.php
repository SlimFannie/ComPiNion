<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chaine extends Model
{

    use HasFactory;

    protected $fillable = [
        'user_id',
        'start_date',
        'end_date',
    ];

    // Une chaine a un user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
