<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IdeasComment extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'date',
        'user_id',
        'idea_id',
        'commentInput',
    ];

    public function idea()
    {
        return $this->belongsTo(Idea::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
