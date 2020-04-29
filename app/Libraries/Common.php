<?php

namespace App\Libraries;

use App\Question;
use App\Response;
use Illuminate\Support\Facades\Auth;

class Common
{

    public static function getNextQuestionId($currentQuestionId = NULL)
    {
        if (empty($currentQuestionId)) {
            $lastResponse = Response::where('user_id', Auth::id())->orderBy('id', 'desc')->first();
            $currentQuestionId = $lastResponse->question_id;
        }

        $questions_set_id = Question::find($currentQuestionId)->questions_set_id;

        $questions = Question::where('questions_set_id', $questions_set_id)->get();

        foreach ($questions as $question) {
            if ($question->id <= $currentQuestionId)
                continue;

            return $nextQuestionId = $question->id;
        }
    }
}
