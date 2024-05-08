<?php

namespace App\Http\Controllers;

use App\Models\Diploma;
use Illuminate\Http\Request;

class DiplomaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $diplomas = Diploma::paginate(15);
        return view('diplomas.index', compact('diplomas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('diplomas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:3|max:255',
        ]);
        Diploma::create($request->all());
        return redirect()->route('diplomas.index')->with('success', 'Diploma created successfully.');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Diploma $diploma)
    {
        return view('diplomas.edit', compact('diploma'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Diploma $diploma)
    {
        $request->validate([
            'name' => 'required|string|min:3|max:255',
        ]);
        $diploma->update($request->all());
        return redirect()->route('diplomas.index')->with('success', 'Diploma updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Diploma $diploma)
    {
        $diploma->delete();
        return redirect()->route('diplomas.index')->with('success', 'Diploma deleted successfully.');
    }
}
