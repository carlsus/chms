<?php

namespace App\Http\Controllers;

use App\Http\Requests\VictoryWeekendRequest;
use App\Models\VictoryWeekend;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class VictoryWeekendController extends Controller
{
   /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $victoryweekend=VictoryWeekend::all();
        return view('victoryweekend.index',compact('victoryweekend'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return response()->view('victoryweekend.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VictoryWeekendRequest $request)
    {
        $validated = $request->validated();


        $create = VictoryWeekend::create($validated);

        if($create) {

            session()->flash('notif.success', 'Member group created successfully!');
            return redirect()->route('victoryweekend.index');
        }

        return abort(500);
    }

    /**
     * Display the specified resource.
     */
    public function show(VictoryWeekendRequest $memberGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return response()->view('victoryweekend.form', [
            'victoryweekend' => VictoryWeekend::findOrFail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VictoryWeekendRequest $request, string $id): RedirectResponse
    {
        $victoryweekend = VictoryWeekend::findOrFail($id);

        $victoryweekend->update($request->validated());

        if($victoryweekend) {
            session()->flash('notif.success', 'Post updated successfully!');
            return redirect()->route('victoryweekend.index');
        }

        return abort(500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $victoryweekend = VictoryWeekend::findOrFail($id);



        $delete = $victoryweekend->delete($id);

        if($delete) {
            session()->flash('notif.success', 'Victory Weekend deleted successfully!');
            return redirect()->route('victoryweekend.index');
        }

        return abort(500);
    }
}
