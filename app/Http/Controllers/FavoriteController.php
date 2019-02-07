<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;

/**
 * Class FavoriteController
 *
 * @package App\Http\Controllers
 */
class FavoriteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function store(Question $question)
    {
        $question->favorites()->attach(auth()->id());

        if (request()->expectsJSON()){
            return response()->json(null, 204);
        }

        return back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        $question->favorites()->detach(auth()->id());

        if (request()->expectsJSON()){
            return response()->json(null, 204);
        }
        
        return back();
    }
}
