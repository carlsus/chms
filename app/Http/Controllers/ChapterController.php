<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChapterRequest;
use App\Models\Chapter;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ChapterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $chapter=Chapter::all();
        return view('chapter.index',compact('chapter'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return response()->view('chapter.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ChapterRequest $request)
    {
        $validated = $request->validated();


        $create = Chapter::create($validated);

        if($create) {

            session()->flash('notif.success', 'Member group created successfully!');
            return redirect()->route('chapter.index');
        }

        return abort(500);
    }

    /**
     * Display the specified resource.
     */
    public function show(Chapter $chapter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return response()->view('chapter.form', [
            'chapter' => Chapter::findOrFail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ChapterRequest $request, string $id): RedirectResponse
    {
        $chapter = Chapter::findOrFail($id);

        $chapter->update($request->validated());

        if($chapter) {
            session()->flash('notif.success', 'Post updated successfully!');
            return redirect()->route('chapter.index');
        }

        return abort(500);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chapter $chapter)
    {
        //
    }
}
