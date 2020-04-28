<?php

namespace App\Http\Controllers;

use App\Answer;
use Illuminate\Http\Request;
use App\Response;
use App\Question;
use App\Http\Resources\Response as ResponseResource;
use Illuminate\Support\Facades\Auth;

class ResponseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Response = Response::orderBy('id', 'DESC')->paginate(5);

        return ResponseResource::collection($Response);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'question_id' => 'required',
            'answer_id' => 'required'
        ]);

        $next = $request->input('next');
        $answer = $request->input('answer_id');
        $question_id = $request->input('question_id');

        $isCorrect = Answer::where('id', $answer)->pluck('correct')->first();

        $correctAnswer = Answer::where('question_id', $question_id)->where('correct', 1)->pluck('name');

        $response =   new Response;
        $response->user_id = Auth::id();
        $response->question_id = $request->input('question_id');
        $response->answer_id = $request->input('answer_id');

        $response->correct = $isCorrect == '1' ? 1 : 0;

        if ($response->save()) {
            if ($isCorrect == '1') {
                return redirect()->route('dailyQuiz')->with(['status' => 'success', 'message' => 'Your answer is correct']);
            } else {
                return redirect()->route('dailyQuiz')->with(['status' => 'danger', 'message' => 'Your answer is wrong, correct answer is ' . $correctAnswer[0]]);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $response =  Response::findOrFail($id);
        return new ResponseResource($response);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $response = Response::findOrFail($id);

        if ($response->delete()) {
            return new ResponseResource($response);
        }
    }
}
