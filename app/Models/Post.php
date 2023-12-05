<?php

namespace App\Models;

use App\Enums\PostSource;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $casts = [
        'source' => PostSource::class
    ];
}
