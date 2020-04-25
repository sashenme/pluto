<?php

namespace App\Http\Controllers;

use App\Answer;
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
        $edit = false;
        $questions_sets = QuestionsSet::all();
        $questions = Question::all();
        return view('admin.questionsCreate', compact('edit', 'questions_sets', 'questions'));
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
        $questions = Question::all();
        return view('admin.questionsCreate', compact('edit', 'questions_sets', 'questions'));
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
        $question->title = $request->input('title');


        $question->save();

        foreach ($request->name  as $key => $val) {
            $answer = new Answer;
            $answer->question_id = $question->id;
            $answer->name = $request->input('name')[$key];
            $answer->reason = $request->input('reason')[$key];
            $answer->correct = $request->input('correct')[$key] == '1' ? 1 : 0;

            $answer->save();
        }



        return redirect()->back()->with('success', 'Question and Answers added successfully');
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
        $edit = true;
        $questions_sets = QuestionsSet::all();
        $questions = Question::all();
        $selectedQuestion = Question::find($id);
        return view('admin.questionsCreate', compact('edit', 'questions_sets', 'selectedQuestion', 'questions'));
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
        $this->validate($request, [
            'questions_set_id' => 'required',
            'title' => 'required',
            'name.*' => 'required',
            'reason.*' => 'required',
        ]);

        $questions = Question::find($id);
        $questions->title = $request->input('title');

        $getAnswers = $request->name;

        $currentAnswersCount = Answer::where('question_id', $id)->count();
        $allCount = count($getAnswers);
        $newAnswersCount = $allCount - $currentAnswersCount;

        $newAnswers = array_slice($getAnswers, $currentAnswersCount);
        $updateAnswers = array_slice($getAnswers, 0,  $currentAnswersCount);

        foreach ($updateAnswers  as $key => $val) {
            $answer = Answer::find($request->input('id')[$key]);
            $answer->name = $request->input('name')[$key];
            $answer->reason = $request->input('reason')[$key];
            $answer->correct = $request->input('correct')[$key] == '1' ? 1 : 0;

            $answer->update();
        }
        if ($newAnswersCount > 0) {
            foreach ($newAnswers  as $key => $val) {
                $answer = new Answer;
                $answer->question_id = $id;
                $answer->name = $request->input('name')[$key + $currentAnswersCount];
                $answer->reason = $request->input('reason')[$key + $currentAnswersCount];
                $answer->correct = $request->input('correct')[$key + $currentAnswersCount] == '1' ? 1 : 0;

                $answer->save();
            }
        }

        if ($questions->update())
            return redirect()->back()->with('success', 'Question updated!');
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
            return redirect()->route('questions.index')->with('success', 'Question and Answers are deleted successufully!');
            // return new QuestionResource($question);
        }
    }
}
