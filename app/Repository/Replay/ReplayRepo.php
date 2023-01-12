<?php

namespace App\Repository\Replay;

use App\Models\Replay;
use App\Repository\MainRepoInterface;
use App\Traits\ResponseForm;
use Symfony\Component\HttpFoundation\Response;

class ReplayRepo implements MainRepoInterface {
    use ResponseForm;

    public function create($request)
    {
        $user = checkUser($request->user_id);
        $comment = checkComment($request->comment_id);
        if ($user) {
            if ($comment) {
                $replay = Replay::create([
                    'replay' =>  $request->replay,
                    'comment_id' => $request->comment_id,
                    'user_id' => $request->user_id
                ]);
            } else {
                return $this->returnError('Comment Not Found', Response::HTTP_NOT_FOUND);
            }
            return $this->returnData('replay', $replay, 'Replay has bee created successfully', Response::HTTP_CREATED);
        } else {
            return $this->returnError('User Not Found', Response::HTTP_NOT_FOUND);
        }
    }
}

