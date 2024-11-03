<?php

namespace App\Http\Controllers;

use App\Http\Requests\E2ERequest;
use App\Models\E2E;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class E2EController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $e2e=E2E::all();

        if(Auth::user()->user_type=="member")
        {
            return view('e2e.member',compact('e2e'));
        }elseif(Auth::user()->user_type=="leader")
        {
            return view('e2e.leader',compact('one2one'));
        }else{
            return view('e2e.index',compact('e2e'));
        }

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return response()->view('e2e.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(E2ERequest $request)
    {
        $validated = $request->validated();


        $create = E2E::create($validated);

        if($create) {

            session()->flash('notif.success', 'E2E created successfully!');
            return redirect()->route('e2e.index');
        }

        return abort(500);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return response()->view('e2e.form', [
            'e2e' => E2E::findOrFail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(E2ERequest $request, string $id): RedirectResponse
    {
        $e2e = E2E::findOrFail($id);

        $e2e->update($request->validated());

        if($e2e) {
            session()->flash('notif.success', 'E2E updated successfully!');
            return redirect()->route('e2e.index');
        }

        return abort(500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $e2e = E2E::findOrFail($id);



        $delete = $e2e->delete($id);

        if($delete) {
            session()->flash('notif.success', 'E2E deleted successfully!');
            return redirect()->route('e2e.index');
        }

        return abort(500);
    }
}
