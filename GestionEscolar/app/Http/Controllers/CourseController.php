<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Subject;

class CourseController extends Controller
{
    /**
     * Muestra una lista de cursos.
     */
    public function index(Request $request)
    {
        $courses = Course::query();

        if ($request->filled('materia')) {
            $courses->where('subject_id', $request->input('materia'));
        }

        $courses = $courses->with('subject')->get();
        $subjects = Subject::all(); // Obtener todas las materias disponibles para filtrado

        return view('courses.index', compact('courses', 'subjects'));
    }

    /**
     * Muestra el formulario para crear un nuevo curso.
     */
    public function create()
    {
        $subjects = Subject::all();
        return view('courses.create', compact('subjects'));
    }

    /**
     * Almacena (guarda) un curso creado.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'subject_id' => 'required|exists:subjects,id',
        ]);

        Course::create($request->all());
        return redirect()->route('courses.index')->with('success', 'Curso creado exitosamente.');
    }

    /**
     * Muestra un formulario para editar un curso existente.
     */
    public function edit(Course $course)
    {
        $subjects = Subject::all();
        return view('courses.edit', compact('course', 'subjects'));
    }

    /**
     * Actualiza un curso existente.
     */
    public function update(Request $request, Course $course)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'subject_id' => 'required|exists:subjects,id',
        ]);

        $course->update($request->all());
        return redirect()->route('courses.index')->with('success', 'Curso actualizado exitosamente.');
    }

    /**
     * Elimina un curso existente.
     */
    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('courses.index')->with('success', 'Curso eliminado exitosamente.');
    }
}
