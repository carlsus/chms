<?php

namespace App\Http\Controllers;

use App\Models\One2One;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class One2OneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $one2one = One2One::whereNull('leader_id')
                       ->with('user')
                       ->get();
        if(Auth::user()->user_type=="member")
        {
            return view('one2one.member',compact('one2one'));
        }elseif(Auth::user()->user_type=="leader")
        {
            return view('one2one.leader',compact('one2one'));
        }


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(One2One $one2One)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(One2One $one2One)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, One2One $one2One)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(One2One $one2One)
    {
        //
    }
}
