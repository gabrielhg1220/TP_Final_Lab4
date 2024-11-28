<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CourseStudent;
use App\Models\Student;
use App\Models\Course;
use App\Models\Commission;

class CourseStudentController extends Controller
{
    /**
     * Muestra la lista de los cursos.
     */
    public function index()
    {
        $inscriptions = CourseStudent::with(['student', 'course', 'commission'])->get();
        return view('course_student.index', compact('inscriptions'));
    }

    /**
     * Muestra el formulario para crear un nuevo Cruso_Estudiante.
     */
    public function create()
    {
        $students = Student::all();
        $courses = Course::all();
        $commissions = Commission::all();

        return view('course_student.create', compact('students', 'courses', 'commissions'));
    }

    /**
     * Almacena (guarda) en la Base de Datos el nuevo Curso_Estudiante creado.
     */
    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'course_id' => 'required|exists:courses,id',
            'commission_id' => 'required|exists:commissions,id',
        ]);

        // Validar que el estudiante no esté ya en otra comisión del mismo curso
        $exists = CourseStudent::where('student_id', $request->student_id)
            ->where('course_id', $request->course_id)
            ->exists();

        if ($exists) {
            return redirect()->back()->withErrors(['error' => 'El estudiante ya está inscripto en este curso.']);
        }

        CourseStudent::create($request->all());

        return redirect()->route('course_student.index')->with('success', 'Inscripción creada exitosamente.');
    }

    /**
     * Muestra el formulario para editar un Curso_Estudiante.
     */
    public function edit(CourseStudent $courseStudent)
    {
        $students = Student::all();
        $courses = Course::all();
        $commissions = Commission::all();

        return view('course_student.edit', compact('courseStudent', 'students', 'courses', 'commissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CourseStudent $courseStudent)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'course_id' => 'required|exists:courses,id',
            'commission_id' => 'required|exists:commissions,id',
        ]);

        // Validar que el estudiante no esté ya en otra comisión del mismo curso (excluyendo esta inscripción)
        $exists = CourseStudent::where('student_id', $request->student_id)
            ->where('course_id', $request->course_id)
            ->where('id', '!=', $courseStudent->id)
            ->exists();

        if ($exists) {
            return redirect()->back()->withErrors(['error' => 'El estudiante ya está inscrito en este curso.']);
        }

        $courseStudent->update($request->all());

        return redirect()->route('course_student.index')->with('success', 'Inscripción actualizada exitosamente.');
    }

    /**
     * Elimina un Curso_Estudiante especifico de la Base de Datos.
     */
    public function destroy(CourseStudent $courseStudent)
    {
        $courseStudent->delete();
        return redirect()->route('course_student.index')->with('success', 'Inscripción eliminada exitosamente.');
    }
}
