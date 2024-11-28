<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subjects = Subject::all();
        return view('subjects.index', compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('subjects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255|unique:subjects',
        ]);

        Subject::create($request->all());
        return redirect()->route('subjects.index')->with('success', 'Materia creada exitosamente.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subject $subject)
    {
        return view('subjects.edit', compact('subject'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subject $subject)
    {
        $request->validate([
            'nombre' => 'required|string|max:255|unique:subjects,nombre,' . $subject->id,
        ]);

        $subject->update($request->all());
        return redirect()->route('subjects.index')->with('success', 'Materia actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subject $subject)
    {
        $subject->delete();
        return redirect()->route('subjects.index')->with('success', 'Materia eliminada exitosamente.');
    }
}
