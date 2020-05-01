<?php

namespace App\Http\Controllers;

use App\Http\Resources\Log as LogResource;
use App\Libraries\Common;
use App\Log;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$Log = Log::orderBy('id', 'DESC')->paginate(5);

		return LogResource::collection($Log);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		$lastLogEntry = Log::where('user_id', Auth::id())->orderBy('id', 'desc')->first();
		$entryExists = !empty($lastLogEntry);

		if (!$entryExists) {
			$isLastEntryFromYesterday = false;
			$log = new Log();
			$log->session_time = gmdate("H:i:s", Common::$config['sessionPollSeconds']);
		} else {
			$isLastEntryFromYesterday = Carbon::now()->greaterThanOrEqualTo($lastLogEntry->updated_at->addDay());
			$log = $isLastEntryFromYesterday ? new Log() : $lastLogEntry;

			$log->session_time = $isLastEntryFromYesterday ? gmdate("H:i:s", Common::$config['sessionPollSeconds']) : $log->session_time->addSeconds(Common::$config['sessionPollSeconds']);
		}

		$log->user_id = Auth::id();

		$log->save();
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		$log = Log::findOrFail($id);
		return new LogResource($log);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		$log = Log::findOrFail($id);

		if ($log->delete()) {
			return new LogResource($log);
		}
	}
}
