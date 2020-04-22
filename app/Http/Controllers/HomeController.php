<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Question;
use App\QuestionsSet;
use App\Response;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $questions_set = QuestionsSet::where('schedule_date', Carbon::today())->get();
        $dailyQuiz = true;


        $lastResponse = Response::where('user_id', Auth::id())->orderBy('id', 'desc')->first();

        if (!empty($lastResponse)) {
            $lastResponseQuestion_id = $lastResponse->question_id;
            $questions_set_idx = Question::find($lastResponseQuestion_id)->questions_set_id;
            $questions_ = Question::where('questions_set_id', $questions_set_idx)->get();

            foreach ($questions_ as $question) {
                if ($question->id <= $lastResponseQuestion_id)
                    continue;

                //next question id
                $question_id = $question->id;
            }

            if (empty($question_id))
                $dailyQuiz = false;
        }


      
        return view('user.home')->with(['questions_set' => $questions_set, 'dailyQuiz' => $dailyQuiz]);
    }


    public function dailyQuiz(Request $request)
    {
        $forced_question_id = $request->id;
        $questions_set = QuestionsSet::where('schedule_date', Carbon::today())->get();
        $questions_set_id  = $questions_set->pluck('id');

        //Stop if no question set available
        if ($questions_set_id->count() == 0)
            // return 'no questions for today'; //return redirect()->view()'';
            return view('user.empty')->with('message', 'No Questions for today!');

        $questions = Question::where('questions_set_id', $questions_set_id)->first();

        //Show question given from param
        if (!empty($forced_question_id)) {


            $questions_set_ids = QuestionsSet::where('schedule_date', Carbon::today())->pluck('id')->toArray();
            if (in_array($forced_question_id, $questions_set_ids)) {
                $question_id = $forced_question_id;
            } else {
                return redirect()->route('home');
            }
        } else {

            //Show next question for the last response

            $lastResponse = Response::where('user_id', Auth::id())->orderBy('id', 'desc')->first();

            if (!empty($lastResponse)) {
                $lastResponseQuestion_id = $lastResponse->question_id;
                $questions_set_idx = Question::find($lastResponseQuestion_id)->questions_set_id;
                $questions_ = Question::where('questions_set_id', $questions_set_idx)->get();

                foreach ($questions_ as $question) {
                    if ($question->id <= $lastResponseQuestion_id)
                        continue;

                    //next question id
                    $question_id = $question->id;
                    $questions = Question::find($question_id);
                }

                if (empty($question_id))
                    return 'ohe okkoma karala eii.. ela kollek oya';
                // return redirect()->route('home'); //when he answer all


            } else {

                //Show first question

                $question_id  = $questions->id;
            }
        }

        $answers = Answer::where('question_id', $question_id)->get();

        return view('user.dailyQuiz')->with(['questions_set' => $questions_set, 'questions' => $questions]);
    }
}
