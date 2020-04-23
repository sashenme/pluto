<?php

namespace App\Libraries;

use App\Question;

class Common
{

    public static function getNextQuestion($currentQuestionId)
    {
        $questions_set_id = Question::find($currentQuestionId)->questions_set_id;

        $questions = Question::where('questions_set_id', $questions_set_id)->get();

        foreach ($questions as $question) {
            if ($question->id <= $currentQuestionId)
                continue;

            return $nextQuestionId = $question->id;
        }
    }
}
