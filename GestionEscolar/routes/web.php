<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CommissionController;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\CourseStudentController;
use App\Http\Controllers\ReportController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

route::get('/reportes', function () {
    return view('reports.reportes');
})->name('reportes');

Route::resource('students', StudentController::class);
Route::resource('subjects', SubjectController::class);
Route::resource('courses', CourseController::class);
Route::resource('commissions', CommissionController::class);
Route::resource('professors', ProfessorController::class);
Route::resource('course_student', CourseStudentController::class);

Route::get('professors/{professor}/assign', [ProfessorController::class, 'assignForm'])->name('professors.assign');
Route::post('professors/{professor}/assign', [ProfessorController::class, 'assign'])->name('professors.assign.store');

// Vistas de reportes
Route::get('reporte/estudiantes-inscritos', [ReportController::class, 'estudiantesInscritos'])->name('reportes.estudiantes');
Route::get('reporte/cursos-por-materia', [ReportController::class, 'cursosPorMateria'])->name('reportes.cursos');
Route::get('reporte/comisiones-y-horarios', [ReportController::class, 'comisionesYHorarios'])->name('reportes.comisiones');
Route::get('reporte/asistencia-profesores', [ReportController::class, 'asistenciaProfesores'])->name('reportes.profesores');

// Exportaciones
Route::get('/reports/estudiantes-inscritos/pdf', [ReportController::class, 'estudiantesInscritosPDF'])->name('reports.estudiantesInscritosPDF');
Route::get('reporte/estudiantes-inscritos/excel', [ReportController::class, 'estudiantesInscritosExcel'])->name('reportes.estudiantes.excel');
Route::get('/reports/cursos-por-materia/pdf', [ReportController::class, 'cursosPorMateriaPDF'])->name('reports.cursosPorMateriaPDF');