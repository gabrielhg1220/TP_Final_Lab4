<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Muestra una lista de estudiantes.
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
     * Muestra un formulario para crear un nuevo estudiante.
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Almacena un nuevo estudiante creado.
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
     * Muestra un formulario para editar la informacion de un estudiante existente.
     */
    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    /**
     * Actualiza un estudiante existente.
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
     * Eliminar un estudiante existente.
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Estudiante eliminado exitosamente.');
    }
}
