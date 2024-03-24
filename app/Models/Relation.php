<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Relation extends Model
{
    use HasFactory;

    protected $primaryKey = ['user1_id', 'user2_id'];

    protected $fillable = [
        'user1_id',
        'user2_id',
        'relation',
    ];

    public function user(): BelongsToMany {
        return $this->belongsTo(User::class, 'user1_id');
    }

}
