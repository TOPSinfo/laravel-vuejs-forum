<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Answer;

/**
 * Class AcceptAnswerController
 *
 * @package App\Http\Controllers
 */
class AcceptAnswerController extends Controller
{
	/**
     * Mark answer as best accepted answer
     *
     * @param Answer $answer
     */
    public function __invoke(Answer $answer)
    {
        $this->authorize('accept', $answer);
        $answer->question->acceptBestAnswer($answer);
        
        if (request()->expectsJSON()){
            return response()->json([
                'message' => "You have accepted this answer as best answer"
            ]);
        }

        return back();
    }
}
