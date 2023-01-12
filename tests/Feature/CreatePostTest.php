<?php

namespace Tests\Feature;

use App\Models\Post;
use Exception;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreatePostTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        try {

            $posts = Post::factory()->count(5)->create();


            foreach($posts as $post) {
                $attributes = [
                    'title' => $post->title,
                    'body' => $post->body,
                    'user_id' => $post->user_id,
                ];

                $this->postJson(route('post.create'), $attributes)->assertCreated()->json();


                $this->assertDatabaseHas('posts', $attributes);
            }
        } catch(Exception $e) {
            return $e->getMessage();
        }
    }
}
