<?php

namespace App\Http\Controllers;

use App\Models\Presence;
use App\Models\Schedule;
use App\Models\Student;
use Illuminate\Http\Request;

class PresenceController extends Controller
{
    public function index()
    {
        $presences = Presence::all();
        return view('presences.index', compact('presences'));
    }

    public function create()
    {   
        $presences = Presence::all();
        $schedules = Schedule::all();
        $students = Student::all();
        return view('presences.create', compact('schedules','students','presences'));
    }

// Modified store function
public function store(Request $request)
{   
    Presence::create($request->all());
    return redirect()->route('presences.index');
}


    

    public function edit(Presence $presence)
    {
        $schedules = Schedule::all();
        $students = Student::all();
        return view('presences.edit', compact('presence','schedules','students'));
    }

    public function update(Request $request, Presence $presence)
    {
        $presence->update($request->all());
        return redirect()->route('presences.index');
    }

    public function destroy(Presence $presence)
    {
        $presence->delete();
        return redirect()->route('presences.index');
    }
}

