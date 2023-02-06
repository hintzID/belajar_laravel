<?php

namespace App\Http\Controllers;
use App\Models\Group;

use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = schedule::all();
        return view('schedules.index', compact('schedules'));
    }

  /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     
        $groups = Group::all();
        return view('schedules.create', compact('groups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $schedule = new Schedule;
        $schedule->group_id = $request->group_id;
        $schedule->user_id = $request->user_id;
        $schedule->note = $request->note;
        $schedule->start_time = $request->start_time;
        $schedule->end_time = $request->end_time;
        $schedule->save();

        return redirect()->route('schedules.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $schedule = Schedule::findOrFail($id);
        $groups = Group::all();
        return view('schedules.create', compact('groups','schedule'));
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
        $schedule = Schedule::findOrFail($id);
        $schedule->group_id = $request->group_id;
        $schedule->user_id = $request->user_id;
        $schedule->note = $request->note;
        $schedule->start_time = $request->start_time;
        $schedule->end_time = $request->end_time;
        $schedule->save();

        return redirect()->route('schedules.index');
    }

        /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */


    public function destroy($id)
   {
       $schedule = Schedule::findOrFail($id);
       $schedule->delete();

       return redirect()->route('schedules.index');
}


}

