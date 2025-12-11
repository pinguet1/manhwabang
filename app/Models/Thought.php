<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Manhwa;

class Thought extends Model
{
    protected $fillable = [
        'user_id',
        'manhwa_id',
        'review',
        'is_spoiler',
        'rating',
        'is_spoiler',
        'helpful_count',
    ];

    protected $casts = [
        'is_spoiler' => 'boolean',
        'rating' => 'integer',
        'helpful_count' => 'integer',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function manhwa()
    {
        return $this->belongsTo(Manhwa::class);
    }
}
