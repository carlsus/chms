<?php

namespace App\Http\Controllers;

use App\Http\Requests\MemberGroupRequest;
use App\Models\MemberGroup;
use Illuminate\Http\Request;


class MemberGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $membergroup=MemberGroup::all();
        return view('membergroup.index',compact('membergroup'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return response()->view('membergroup.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MemberGroupRequest $request)
    {
        $validated = $request->validated();


        $create = MemberGroup::create($validated);

        if($create) {

            session()->flash('notif.success', 'Member group created successfully!');
            return redirect()->route('membergroup.index');
        }

        return abort(500);
    }

    /**
     * Display the specified resource.
     */
    public function show(MemberGroup $memberGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return response()->view('membergroup.form', [
            'membergroup' => MemberGroup::findOrFail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MemberGroup $memberGroup)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $membergroup = MemberGroup::findOrFail($id);



        $delete = $membergroup->delete($id);

        if($delete) {
            session()->flash('notif.success', 'Member group deleted successfully!');
            return redirect()->route('membergroup.index');
        }

        return abort(500);
    }
}
