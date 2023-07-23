<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    use HasFactory;

    public function images()
    {
        return $this->hasMany(IdeasImage::class);
    }

    public function Comments()
    {
        return $this->hasMany(IdeasComment::class);
    }

    public function Tags()
    {
        return $this->hasMany(IdeasTag::class);
    }


}
