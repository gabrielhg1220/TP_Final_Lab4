<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión Escolar - Dashboard</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <style>
        body {            
            background-color: #f8f9fa;                 
        }
        .dashboard-card {
            transition: transform 0.3s ease;
            background-image: url('../images/ab5.jpg');
        }
        .dashboard-card:hover {
            transform: scale(1.05);                        
        }
        .dashboard-container {
            margin-top: 50px;
        }
    </style>
</head>

<body class="fondodash">
    <div class="container mt-5">
        <h1 class="text-center mb-5 titulo">Gestión Escolar</h1>
        <div class="row mt-4">

            <!-- Card de Estudiantes -->
            <div class="col-md-4 mb-3">
                <div class="card dashboard-card text-center">
                    <div class="card-body etiquetadash">
                        <h5 class="card-title">Estudiantes</h5>
                        <p class="card-text etiquetadash">Gestion de estudiantes registrados.</p>
                        <a href="{{ route('students.index') }}" class="btn btn-primary">Ir a Estudiantes</a>
                    </div>
                </div>
            </div>

            <!-- Card de Materias -->
            <div class="col-md-4 mb-3">
                <div class="card dashboard-card text-center">
                    <div class="card-body etiquetadash">
                        <h5 class="card-title">Materias</h5>
                        <p class="card-text">Administra las materias disponibles.</p>
                        <a href="{{ route('subjects.index') }}" class="btn btn-primary">Ir a Materias</a>
                    </div>
                </div>
            </div>

            <!-- Card de Cursos -->
            <div class="col-md-4 mb-3">
                <div class="card dashboard-card text-center">
                    <div class="card-body etiquetadash">
                        <h5 class="card-title">Cursos</h5>
                        <p class="card-text">Configura y gestiona los cursos.</p>
                        <a href="{{ route('courses.index') }}" class="btn btn-primary">Ir a Cursos</a>
                    </div>
                </div>
            </div>
            
            <!-- Card de Comisiones -->
            <div class="col-md-4 mb-3">
                <div class="card dashboard-card text-center">
                    <div class="card-body etiquetadash">
                        <h5 class="card-title">Comisiones</h5>
                        <p class="card-text">Organiza las comisiones de los cursos.</p>
                        <a href="{{ route('commissions.index') }}" class="btn btn-primary">Ir a Comisiones</a>
                    </div>
                </div>
            </div>

            <!-- Card de Profesores -->
            <div class="col-md-4 mb-3">
                <div class="card dashboard-card text-center">
                    <div class="card-body etiquetadash">
                        <h5 class="card-title">Profesores</h5>
                        <p class="card-text">Gestion de profesores registrados.</p>
                        <a href="{{ route('professors.index') }}" class="btn btn-primary">Ir a Profesores</a>
                    </div>
                </div>
            </div>

            <!-- Card de Cursos_Estudiantes (Inscripciones de estudiantes) -->
            <div class="col-md-4 mb-3">
                <div class="card dashboard-card text-center">
                    <div class="card-body etiquetadash">
                        <h5 class="card-title">Inscripcion Estudiantes</h5>
                        <p class="card-text">Gestion de incripcion de estudiantes.</p>
                        <a href="{{ route('course_student.index') }}" class="btn btn-primary">Ir a Inscripcion Estudiantes</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card de Reportes -->
        <div class="col-md-4 mb-3">
            <div class="card dashboard-card text-center">
                <div class="card-body etiquetadash">
                    <h5 class="card-title">Reportes</h5>
                    <p class="card-text">Ver y exportar los reportes del sistema.</p>
                    <a href="{{ route('reportes') }}" onclick="openReportes(event)" class="btn btn-primary">Reportes</a>

                    <script>
                        function openReportes(event){
                            event.preventDefault();
                            window.open("{{ route('reportes') }}", "_blank", "width=800,height=400");
                        }
                    </script>
                </div>
            </div>
        </div>
        
    </div>  

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>