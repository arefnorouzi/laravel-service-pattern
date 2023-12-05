<?php

namespace App\Http\Controllers\Api;

use App\DataTransferObjects\PostDto;
use App\Enums\PostSource;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\PostRequest;
use App\Http\Resources\Api\PostResource;
use App\Models\Post;
use App\Services\Post\PostService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{
    public function __construct(protected PostService $postService)
    {}

    public function store(PostRequest $request): PostResource|JsonResponse
    {
        try {
            $post = $this->postService->store(
                PostDto::fromApiRequest($request)
            );
        }
        catch (\Exception $e)
        {
            Log::error($e->getMessage());
            return response()->json(['message' => 'store was fail']);
        }

        return PostResource::make($post);
    }

    public function update(PostRequest $request, Post $post): PostResource|JsonResponse
    {
        try {
            $post = $this->postService->update(
                PostDto::fromApiRequest($request),
                $post
            );
        }
        catch (\Exception $e)
        {
            Log::error($e->getMessage());
            return response()->json(['message' => 'update was fail']);
        }

        return PostResource::make($post);
    }

}
