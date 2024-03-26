<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Relation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user1_id',
        'user2_id',
        'relation',
    ];

    // Une relation a plusieurs users (2)
    public function user(): BelongsToMany {
        return $this->belongsTo(User::class, 'user1_id');
    }

}
