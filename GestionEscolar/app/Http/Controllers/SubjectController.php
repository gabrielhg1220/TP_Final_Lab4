<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;

class SubjectController extends Controller
{
    /**
     * Muestra la lista de materias.
     */
    public function index()
    {
        $subjects = Subject::all();
        return view('subjects.index', compact('subjects'));
    }

    /**
     * Muestra el formullario para crear una nueva materia.
     */
    public function create()
    {
        return view('subjects.create');
    }

    /**
     * Almacena (Guarda) un curso nuevo creado.
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
     * Muesra el formulario para editar una materia existente.
     */
    public function edit(Subject $subject)
    {
        return view('subjects.edit', compact('subject'));
    }

    /**
     * Actualiza una amteria existente.
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
     * Elimina una materia existente.
     */
    public function destroy(Subject $subject)
    {
        $subject->delete();
        return redirect()->route('subjects.index')->with('success', 'Materia eliminada exitosamente.');
    }
}
