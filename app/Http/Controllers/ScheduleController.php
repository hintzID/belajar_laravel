<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = Schedule::all();
        return view('schedules.index', compact('schedules'));
    }

    public function create()
    {
        $groups = Group::all();
        $users = User::all();
        return view('schedules.create', compact('groups','users'));
    }

    public function store(Request $request)
    {
        Schedule::create($request->all());
        return redirect()->route('schedules.index');
    }

    public function edit(Schedule $schedule)
    {
        $groups = Group::all();
        $users = User::all();
        return view('schedules.edit', compact('schedule','groups','users'));
    }

    public function update(Request $request, Schedule $schedule)
    {
        $schedule->update($request->all());
        return redirect()->route('schedules.index');
    }

    public function destroy(Schedule $schedule)
    {
        $schedule->delete();
        return redirect()->route('schedules.index');
    }
}