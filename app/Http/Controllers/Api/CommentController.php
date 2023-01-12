<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCommentRequest;
use App\Repository\Comment\CommentRepo;

class CommentController extends Controller
{
    protected $comment;

    public function __construct(CommentRepo $comment)
    {
        $this->comment = $comment;
    }

    public function create(CreateCommentRequest $request)
    {
        return $this->comment->create($request);
    }
}
