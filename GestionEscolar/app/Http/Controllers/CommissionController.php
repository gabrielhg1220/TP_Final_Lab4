<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commission;
use App\Models\Course;

class CommissionController extends Controller
{
    /**
     * Muestra una lista de comisiones.
     */
    public function index(Request $request)
    {
        $commissions = Commission::query();

        // Filtrar por curso
        if ($request->filled('curso')) {
            $commissions->where('course_id', $request->input('curso'));
        }

        // Realiza un filtrado por horario
        if ($request->filled('horario')) {
            $commissions->where('horario', 'like', '%' . $request->input('horario') . '%');
        }

        $commissions = $commissions->with('course')->get();
        $courses = Course::all(); // Obtener todos los cursos disponibles para el filtrado

        return view('commissions.index', compact('commissions', 'courses'));
    }

    /**
     * Muestra el formulario para crear una nueva comision.
     */
    public function create()
    {
        $courses = Course::all();
        return view('commissions.create', compact('courses'));
    }

    /**
     * Almacena (guarda) la comision recientemente creada.
     */
    public function store(Request $request)
    {
        $request->validate([
            'aula' => 'required|string|max:255',
            'horario' => 'required|date_format:H:i',
            'course_id' => 'required|exists:courses,id',
        ]);

        Commission::create($request->all());
        return redirect()->route('commissions.index')->with('success', 'Comisión creada exitosamente.');
    }

    /**
     * Muestra el formulario para editar una comision especifica.
     */
    public function edit(Commission $commission)
    {
        $courses = Course::all();
        return view('commissions.edit', compact('commission', 'courses'));
    }

    /**
     * Actualiza una comision guardada.
     */
    public function update(Request $request, Commission $commission)
    {
        $request->validate([
            'aula' => 'required|string|max:255',
            'horario' => 'required|date_format:H:i',
            'course_id' => 'required|exists:courses,id',
        ]);

        $commission->update($request->all());
        return redirect()->route('commissions.index')->with('success', 'Comisión actualizada exitosamente.');
    }

    /**
     * Elimina una comision guardada.
     */
    public function destroy(Commission $commission)
    {
        $commission->delete();
        return redirect()->route('commissions.index')->with('success', 'Comisión eliminada exitosamente.');
    }
}
