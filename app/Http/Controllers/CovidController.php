<?php

namespace App\Http\Controllers;

use App\Covid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\Covid as CovidResource;

class CovidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.covidSelfCheck');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $covid = new Covid;
        $covid->user_id = Auth::id();
        $covid->lang = $request->input('lang');
        $covid->critical = $request->input('critical');
        $covid->q1 = $request->input('txt-q1');
        $covid->q2 = $request->input('txt-q2');
        $covid->q3 = $request->input('txt-q3');
        $covid->q4 = $request->input('txt-q4');
        $covid->q5 = $request->input('txt-q5');
        $covid->q6 = $request->input('txt-q6');
        $covid->q7 = $request->input('txt-q7');
        $covid->q8 = $request->input('txt-q8');
        $covid->recommendation = $request->input('recommendation');

        if ($covid->save()) {
            return new CovidResource($covid);
        } else {
            abort(500);
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
        //
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
        //
    }
}
