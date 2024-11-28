<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Filtrar por nombre si se ha proporcionado un valor
        $students = Student::query();

        if ($request->filled('nombre')) {
            $students->where('nombre', 'like', '%' . $request->input('nombre') . '%');
        }

        // Filtrar por curso si se ha proporcionado un valor
        if ($request->filled('curso')) {
            $students->whereHas('courses', function($query) use ($request) {
                $query->where('courses.id', $request->input('curso'));
            });
        }

        $students = $students->get();
        $cursos = Course::all(); // Obtener todos los cursos disponibles para filtrado

        return view('students.index', compact('students', 'cursos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|unique:students',
        ]);

        Student::create($request->all());
        return redirect()->route('students.index')->with('success', 'Estudiante creado exitosamente.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $student->id,
        ]);

        $student->update($request->all());
        return redirect()->route('students.index')->with('success', 'Estudiante actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Estudiante eliminado exitosamente.');
    }
}
