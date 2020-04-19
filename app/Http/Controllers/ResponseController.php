<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Response;
use App\Http\Resources\Response as ResponseResource;

class ResponseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Response = Response::orderBy('id','DESC')->paginate(5);

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
        $response = $request->isMethod('put') ? Response::findOrFail($request->response_id) : new Response;
        
        $response->id = $request->input('response_id');
        $response->user_id = $request->input('user_id');
        $response->question_id = $request->input('question_id');
        $response->answer_id = $request->input('answer_id');
        $response->correct = $request->input('correct');
        
        if($response->save()){
            return new ResponseResource($response);
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
       
        if($response->delete()){
            return new ResponseResource($response);
        }
    }
}
