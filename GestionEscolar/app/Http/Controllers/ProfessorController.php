<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Professor;
use App\Models\Commission;

class ProfessorController extends Controller
{
    /**
     * Muestra el listado de profesores.
     */
    public function index()
    {
        //$professors = Professor::all();
        $professors = Professor::with('commissions')->get(); // Carga las comisiones relacionadas
        return view('professors.index', compact('professors'));
    }

    // Muestra el formulario para asignar comisiones a un profesor
    public function assignForm(Professor $professor)
    {
        $commissions = Commission::all(); // Obtener todas las comisiones
        return view('professors.assign', compact('professor', 'commissions'));
    }

    // Procesa la asignación de comisiones
    public function assign(Request $request, Professor $professor)
    {
        // Validar los datos enviados
        $request->validate([
            'commissions' => 'required|array',
            'commissions.*' => 'exists:commissions,id',
        ]);

        // Sincronizar las comisiones seleccionadas con el profesor
        $professor->commissions()->sync($request->commissions);

        return redirect()->route('professors.index')->with('success', 'Comisiones asignadas correctamente.');
    }

    /**
     * Muestra el formulario para agregar un nuevo profesor.
     */
    public function create()
    {
        $commissions = Commission::all();
        return view('professors.create', compact('commissions'));
    }

    /**
     * Almacena (guarda) un profesor recién agregado.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'commissions' => 'array',
            'commissions.*' => 'exists:commissions,id',
        ]);

        $professor = Professor::create($request->only('nombre'));
        $professor->commissions()->sync($request->commissions);

        return redirect()->route('professors.index')->with('success', 'Profesor creado exitosamente.');
    }

    /**
     * Muestra un formulario para editar un profesor.
     */
    public function edit(Professor $professor)
    {
        $commissions = Commission::all();
        $assignedCommissions = $professor->commissions->pluck('id')->toArray();
        return view('professors.edit', compact('professor', 'commissions', 'assignedCommissions'));
    }

    /**
     * Actualiza el profesor especificado de la Base de Datos.
     */
    public function update(Request $request, Professor $professor)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'commissions' => 'array',
            'commissions.*' => 'exists:commissions,id',
        ]);

        $professor->update($request->only('nombre'));
        $professor->commissions()->sync($request->commissions);

        return redirect()->route('professors.index')->with('success', 'Profesor actualizado exitosamente.');
    }

    /**
     * Elimina el profesor especificado de la Base de Datos.
     */
    public function destroy(Professor $professor)
    {
        $professor->commissions()->detach();
        $professor->delete();

        return redirect()->route('professors.index')->with('success', 'Profesor eliminado exitosamente.');
    }
}
