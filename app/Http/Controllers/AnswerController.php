<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Answer;
use App\Http\Resources\Answer as AnswerResource;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Answer = Answer::orderBy('id','DESC')->paginate(5);

            return AnswerResource::collection($Answer);
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
        $question = $request->isMethod('put') ? Answer::findOrFail($request->answer_id) : new Answer;
        
        $question->id = $request->input('answer_id');
        $question->user_id = $request->input('user_id');
        $question->question_id = $request->input('question_id');
        $question->name = $request->input('name');
        $question->correct = $request->input('correct');
        
        if($question->save()){
            return new AnswerResource($question);
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
        $question =  Answer::findOrFail($id);
        return new AnswerResource($question);
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
        $question = Answer::findOrFail($id);
       
        if($question->delete()){
            return new AnswerResource($question);
        }
    }
}
