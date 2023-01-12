<?php

namespace Tests\Feature;

use App\Models\Replay;
use Exception;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateReplayTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        try {

            $replaies = Replay::factory()->count(5)->create();


            foreach($replaies as $replay) {
                $attributes = [
                    'body' => $replay->title,
                    'comment_id' => $replay->post_id,
                    'user_id' => $replay->user_id,
                ];

                $this->postJson(route('replay.create'), $attributes)->assertCreated()->json();


                $this->assertDatabaseHas('replaies', $attributes);
            }
        } catch(Exception $e) {
            return $e->getMessage();
        }
    }
}
