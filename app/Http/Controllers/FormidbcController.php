<?php

namespace App\Http\Controllers;

use App\Models\Formidbc;
use App\Models\Member;
use Illuminate\Http\Request;

class FormidbcController extends Controller
{
    public function index()
    {
        $formidbcs = Formidbc::with('member')->get();
        return view('formidbcs.index', compact('formidbcs'));
    }

    public function create()
    {
        $members = Member::with(['student', 'group'])->get();
        return view('formidbcs.create', compact('members'));
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $presence = $input['presence'];
        $note = $input['note'];

        $data = [];

        foreach ($presence as $member_id => $presence_status) {
            $data[] = [
                'member_id' => $member_id,
                'presence' => $presence_status,
                'note' => $note[$member_id] ?? null,
            ];
        }

        FormIdbc::insert($data);

        return redirect()->route('formidbcs.index');
    }

    public function edit(Formidbc $formidbc)
    {
        $members = Member::with(['student', 'group'])->get();
        return view('formidbcs.edit', compact('formidbc', 'members'));
    }

    public function update(Request $request, Formidbc $formidbc)
    {
        $formidbc->update($request->all());
        return redirect()->route('formidbcs.index');
    }

    public function destroy(Formidbc $formidbc)
    {
        $formidbc->delete();
        return redirect()->route('formidbcs.index');
    }
}
