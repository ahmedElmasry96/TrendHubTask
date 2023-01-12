<?php

namespace App\Repository\Post;

use App\Models\Post;
use App\Repository\MainRepoInterface;
use App\Traits\ResponseForm;
use Symfony\Component\HttpFoundation\Response;

class PostRepo implements MainRepoInterface {
    use ResponseForm;

    public function create($request) {
        $user = checkUser($request->user_id);
        if ($user) {
            $post = Post::create([
                'title' =>  $request->title,
                'body' => $request->body,
                'user_id' => $request->user_id
            ]);

            return $this->returnData('post', $post, 'Post has bee created successfully', Response::HTTP_CREATED);
        }

        return $this->returnError('User Not Found', Response::HTTP_NOT_FOUND);
    }
}

