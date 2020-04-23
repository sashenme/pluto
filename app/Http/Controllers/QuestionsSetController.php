<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\QuestionsSet;
use App\Http\Resources\QuestionsSet as QuestionsSetResource;
use App\Question;

class QuestionsSetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $questions_sets = QuestionsSet::orderBy('id', 'DESC')->paginate(5); 
        $edit = false;
        return view('admin.addQuizSet', compact('questions_sets', 'edit'))
            ->with('i', ($request->input('page', 1) - 1) * 5)
            ->with('success','Questions Set added successfully');
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
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'schedule_date' => 'required|date|date_format:Y-m-d|after:yesterday',
        ]);


        $questions_set = $request->isMethod('put') ? QuestionsSet::findOrFail($request->questions_set_id) : new QuestionsSet;

        $questions_set->id = $request->input('questions_set_id');
        $questions_set->title = $request->input('title');
        $questions_set->description = $request->input('description');
        $questions_set->schedule_date = $request->input('schedule_date');

        if ($questions_set->save()) {
            // return new QuestionsSetResource($questions_set);
            return redirect()->back();
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
        $questions_set = QuestionsSet::find($id);
        $edit = true;
        $questions_sets = QuestionsSet::orderBy('id', 'DESC')->paginate(5);
        return view('admin.addQuizSet', compact('questions_set', 'questions_sets', 'edit'));
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
            'title' => 'required',
            'description' => 'required',
            'schedule_date' => 'required|date|date_format:Y-m-d|after:yesterday',
        ]);

        $input = $request->all();
        $questions_set = QuestionsSet::find($id);
        $questions_set->update($input);

        return redirect()->route('questions-sets.index')
                        ->with('success','Questions Set updated successfully');
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

        if ($questions_set->delete()) {
            // return new QuestionsSetResource($questions_set);
            return redirect()->back()->with('success','Questions set deleted successfully!');
        }
    }
}
