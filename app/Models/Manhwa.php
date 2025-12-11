<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Manhwa extends Model
{

    protected $fillable = [
        'title',
        'description',
        'cover_image',
        'author',
        'published_at',
        'status',

    ];

    public function genres(){

        return $this->belongsToMany(
            Genre::class);

    }

    public function thoughts()
    {
        return $this->hasMany(Thought::class);
    }
}
