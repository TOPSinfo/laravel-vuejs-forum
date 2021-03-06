<?php

namespace App\Http\Controllers;

use App\Answer;
use Illuminate\Http\Request;

/**
 * Class VoteAnswerController
 *
 * @package App\Http\Controllers
 */
class VoteAnswerController extends Controller
{
    public function __constructor()
    {
        $this->middleware('auth');
    }

    public function __invoke(Answer $answer)
    {
        $vote = (int) request()->vote;

        $votesCount = auth()->user()->voteAnswer($answer, $vote);

        if (request()->expectsJson()){
            return response()->json([
                'message' => 'Thanks for the feedback',
                'votesCount' => $votesCount
            ]);
        }

        return back();
    }
}
