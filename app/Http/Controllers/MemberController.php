<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\Group;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MemberController extends Controller
{
    public function index()
    {
        $members = Member::all();
        return view('members.index', compact('members'));
    }

    public function create()
    {
        $students = Student::all();
        $groups = Group::all();
        return view('members.create', compact('students','groups'));
    }

    public function store(Request $request)
    {
        Member::create($request->all());
        return redirect()->route('members.index');
    }
    public function edit(Member $member)
    {
        $students = Student::all();
        $groups = Group::all();
        return view('members.edit', compact('member','students','groups'));
    }

    public function update(Request $request, Member $member)
    {
        $member->update($request->all());
        return redirect()->route('members.index');
    }

    public function destroy(Member $member)
    {
        $member->delete();
        return redirect()->route('members.index');
    }
}

