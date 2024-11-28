<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commission;
use App\Models\Course;

class CommissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $commissions = Commission::query();

        // Filtrar por curso
        if ($request->filled('curso')) {
            $commissions->where('course_id', $request->input('curso'));
        }

        // Filtrar por horario
        if ($request->filled('horario')) {
            $commissions->where('horario', 'like', '%' . $request->input('horario') . '%');
        }

        $commissions = $commissions->with('course')->get();
        $courses = Course::all(); // Obtener todos los cursos disponibles para filtrado

        return view('commissions.index', compact('commissions', 'courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = Course::all();
        return view('commissions.create', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
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
     * Show the form for editing the specified resource.
     */
    public function edit(Commission $commission)
    {
        $courses = Course::all();
        return view('commissions.edit', compact('commission', 'courses'));
    }

    /**
     * Update the specified resource in storage.
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
     * Remove the specified resource from storage.
     */
    public function destroy(Commission $commission)
    {
        $commission->delete();
        return redirect()->route('commissions.index')->with('success', 'Comisión eliminada exitosamente.');
    }
}
