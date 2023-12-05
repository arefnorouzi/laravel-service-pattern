<?php

namespace App\Services\Post;

use App\DataTransferObjects\PostDto;
use App\Enums\PostSource;
use App\Models\Post;

class PostService
{
    public function store(PostDto $dto)
    {
        return Post::create([
            'title' => $dto->title,
            'description' => $dto->description,
            'source' => $dto->source
        ]);
    }

    public function update(PostDto $dto, Post $post)
    {
        return tap($post)->update([
            'title' => $dto->title,
            'description' => $dto->description,
            'source' => $dto->source
        ]);
    }
}
