<?php

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;

if (! function_exists('checkUser')) {
    function checkUser($userId) {
        $user = User::where('id', $userId)->first();
        if ($user) {
            return true;
        }
        return false;
    }
}

if (! function_exists('checkPost')) {
    function checkPost($postId) {
        $post = Post::where('id', $postId)->first();
        if ($post) {
            return true;
        }
        return false;
    }
}

if (! function_exists('checkComment')) {
    function checkComment($commentId) {
        $comment = Comment::where('id', $commentId)->first();
        if ($comment) {
            return true;
        }
        return false;
    }
}
