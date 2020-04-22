<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\QuestionsSet;
use App\Http\Resources\QuestionsSet as QuestionsSetResource;

class QuestionsSetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questionsSet = QuestionsSet::orderBy('id','DESC')->paginate(5);

            return QuestionsSetResource::collection($questionsSet);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.addQuizSet');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $questions_set = $request->isMethod('put') ? QuestionsSet::findOrFail($request->questions_set_id) : new QuestionsSet;

        $questions_set->id = $request->input('questions_set_id');
        $questions_set->title = $request->input('title');
        $questions_set->description = $request->input('description');
        $questions_set->schedule_date = $request->input('schedule_date');

        if($questions_set->save()){
            return new QuestionsSetResource($questions_set);
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
        $questions_set =  QuestionsSet::findOrFail($id);
        return new QuestionsSetResource($questions_set);
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
        $questions_set = QuestionsSet::findOrFail($id);

        if($questions_set->delete()){
            return new QuestionsSetResource($questions_set);
        }
    }
}
