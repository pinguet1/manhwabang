<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Manhwa;

class Genre extends Model
{
    protected $fillable = [
        'name',
    ];

    public function manhwas() {

        return $this->belongsToMany(
            \App\Models\Manhwa::class);

    }

}
