<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function images()
    {
        return $this->hasMany(IdeasImage::class);
    }

    public function comments()
    {
        return $this->hasMany(IdeasComment::class);
    }

    public function tags()
    {
        return $this->hasMany(IdeasTag::class);
    }


}
