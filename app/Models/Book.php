<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'name',
        'author',
        'description',
        'genre_id',
        'user_id',
    ];

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
