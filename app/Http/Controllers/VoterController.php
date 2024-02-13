<?php

namespace App\Http\Controllers;

use App\Models\Voter;
use Illuminate\Http\Request;

class VoterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('voters.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('voters.create');
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
    public function show(Voter $voter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Voter $voter)
    {
        return view('voters.edit', compact('voter'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Voter $voter)
    {
        $voter->update($request->all());

        return to_route('voters.index')->with('success', 'Voter details updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Voter $voter)
    {
        $voter->delete();
        return to_route('voters.index')->with('success', 'Voter deleted successfully!');
    }
}
