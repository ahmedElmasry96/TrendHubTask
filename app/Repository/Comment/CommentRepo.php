<?php

namespace App\Repository\Comment;

use App\Models\Comment;
use App\Repository\MainRepoInterface;
use App\Traits\ResponseForm;
use Symfony\Component\HttpFoundation\Response;

class CommentRepo implements MainRepoInterface {
    use ResponseForm;

    public function create($request)
    {
        $user = checkUser($request->user_id);
        $post = checkPost($request->post_id);
        if ($user) {
            if ($post) {
                $comment = Comment::create([
                    'comment' =>  $request->comment,
                    'post_id' => $request->post_id,
                    'user_id' => $request->user_id
                ]);
            } else {
                return $this->returnError('Post Not Found', Response::HTTP_NOT_FOUND);
            }
            return $this->returnData('comment', $comment, 'Comment has bee created successfully', Response::HTTP_CREATED);
        } else {
            return $this->returnError('User Not Found', Response::HTTP_NOT_FOUND);
        }
    }
}

