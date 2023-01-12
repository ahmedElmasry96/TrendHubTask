<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePostRequest;
use App\Repository\Post\PostRepo;

class PostController extends Controller
{
    protected $post;

    public function __construct(PostRepo $post)
    {
        $this->post = $post;
    }

    public function create(CreatePostRequest $request)
    {
        return $this->post->create($request);
    }
}
