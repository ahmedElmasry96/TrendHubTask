<?php

namespace Tests\Feature;

use App\Models\Comment;
use Exception;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateCommentTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        try {

            $comments = Comment::factory()->count(5)->create();


            foreach($comments as $comment) {
                $attributes = [
                    'body' => $comment->title,
                    'post_id' => $comment->post_id,
                    'user_id' => $comment->user_id,
                ];

                $this->postJson(route('comment.create'), $attributes)->assertCreated()->json();


                $this->assertDatabaseHas('comments', $attributes);
            }
        } catch(Exception $e) {
            return $e->getMessage();
        }
    }
}
