<?php

namespace App\DataTransferObjects;

use App\Enums\PostSource;
use App\Http\Requests\App\PostRequest as AppPostRequest;
use App\Http\Requests\Api\PostRequest as ApiPostRequest;

class PostDto
{
    public function __construct(
        public readonly string $title,
        public readonly string $description,
        public readonly PostSource $source,
    )
    {}

    public static function fromAppRequest(AppPostRequest $request): PostDto
    {
        return new self(
            title: $request->validated('title'),
            description: $request->validated('description'),
            source: PostSource::App
        );
    }

    public static function fromApiRequest(ApiPostRequest $request): PostDto
    {
        return new self(
            title: $request->validated('payload.title'),
            description: $request->validated('payload.description'),
            source: PostSource::Api
        );
    }
}
