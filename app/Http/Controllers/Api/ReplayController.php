<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateReplayRequest;
use App\Repository\Replay\ReplayRepo;

class ReplayController extends Controller
{
    protected $replay;

    public function __construct(ReplayRepo $replay)
    {
        $this->replay = $replay;
    }

    public function create(CreateReplayRequest $request)
    {
        return $this->replay->create($request);
    }
}
