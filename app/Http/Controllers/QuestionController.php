<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\QuestionsSet;
use App\User;
use App\Http\Resources\Question as QuestionResource;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Question = Question::orderBy('id', 'DESC')->paginate(5);

        return QuestionResource::collection($Question);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $edit = false;
        $questions_sets = QuestionsSet::all();
        return view('admin.questionsCreate',compact('edit','questions_sets'));
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
            'questions_set_id' => 'required',
            'title' => 'required',
            'name.*' => 'required',
            'reason.*' => 'required', 
        ]);

        $question = $request->isMethod('put') ? Question::findOrFail($request->question_id) : new Question;

        $question->id = $request->input('question_id');
        $question->questions_set_id = $request->input('questions_set_id');
        $question->user_id = $request->input('user_id');
        $question->title = $request->input('title');

        return redirect()->back();
        // if ($question->save()) {
        //     return new QuestionResource($question);
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $question =  Question::findOrFail($id);
        return new QuestionResource($question);
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
        $question = Question::findOrFail($id);

        if ($question->delete()) {
            return new QuestionResource($question);
        }
    }
}
