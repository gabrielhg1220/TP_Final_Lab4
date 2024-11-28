<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Commission;
use App\Models\Professor;
use Barryvdh\DomPDF\Facade\Pdf; // Para exportar a PDF

class ReportController extends Controller
{
    // =======================
    // Funcion Para La Vista
    // =======================

    // Reporte de Estudiantes Inscritos
    public function estudiantesInscritos()
    {
        $students = Student::with(['courses.commissions'])->get();
        return view('reports.estudiantes-inscritos', compact('students'));
    }

    // Reporte de Cursos por Materia
    public function cursosPorMateria()
    {
        $subjects = Subject::with('courses')->get();
        return view('reports.cursos-por-materia', compact('subjects'));
    }

    // Reporte de Comisiones y Horarios
    public function comisionesYHorarios()
    {
        $commissions = Commission::with(['course.subject', 'professor'])->get();
        return view('reports.comisiones-y-horarios', compact('commissions'));
    }

    // Reporte de Asistencia de Profesores
    public function asistenciaProfesores()
    {
        $professors = Professor::with('commissions.course')->get();
        return view('reports.asistencia-profesores', compact('professors'));
    }

    // ====================================
    // Funciones para poder Exportar a PDF
    // ====================================

    public function estudiantesInscritosPDF()
    {
        $students = Student::with(['courses.commissions'])->get();
        $pdf = Pdf::loadView('reports.estudiantes-inscritos', compact('students'));
        return $pdf->download('reporte-estudiantes-inscritos.pdf');
    }

    public function cursosPorMateriaPDF()
    {
        $subjects = Subject::with('courses')->get();
        $pdf = Pdf::loadView('reports.cursos-por-materia', compact('subjects'));
        return $pdf->download('reporte-cursos-por-materia.pdf');
    }

    public function comisionesYHorariosPDF()
    {
        $commissions = Commission::with(['course.subject', 'professor'])->get();
        $pdf = Pdf::loadView('reports.comisiones-y-horarios', compact('commissions'));
        return $pdf->download('reporte-comisiones-y-horarios.pdf');
    }

    public function asistenciaProfesoresPDF()
    {
        $professors = Professor::with('commissions.course')->get();
        $pdf = Pdf::loadView('reports.asistencia-profesores', compact('professors'));
        return $pdf->download('reporte-asistencia-profesores.pdf');
    }

}
