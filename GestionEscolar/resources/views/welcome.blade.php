<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión Escolar - Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
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
    <div class="container dashboard-container">
        <h1 class="text-center mb-5 titulo">Gestión Escolar</h1>
        <div class="row">
            <!-- Card de Estudiantes -->
            <div class="col-md-3 etiquetadash">
                <div class="card dashboard-card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Estudiantes</h5>
                        <p class="card-text">Gestiona a los estudiantes registrados en el sistema.</p>
                        <a href="{{ route('students.index') }}" class="btn btn-primary">Ir a Estudiantes</a>
                    </div>
                </div>
            </div>
            <!-- Card de Materias -->
            <div class="col-md-3 etiquetadash">
                <div class="card dashboard-card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Materias</h5>
                        <p class="card-text">Administra las materias disponibles.</p>
                        <a href="{{ route('subjects.index') }}" class="btn btn-primary">Ir a Materias</a>
                    </div>
                </div>
            </div>
            <!-- Card de Cursos -->
            <div class="col-md-3 etiquetadash">
                <div class="card dashboard-card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Cursos</h5>
                        <p class="card-text">Configura y gestiona los cursos.</p>
                        <a href="{{ route('courses.index') }}" class="btn btn-primary">Ir a Cursos</a>
                    </div>
                </div>
            </div>
            <!-- Card de Comisiones -->
            <div class="col-md-3 etiquetadash">
                <div class="card dashboard-card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Comisiones</h5>
                        <p class="card-text">Organiza las comisiones de los cursos.</p>
                        <a href="{{ route('commissions.index') }}" class="btn btn-primary">Ir a Comisiones</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Agrega una linea en blano -->
    <br>

    <div class="col-md-3">
        <div class="card text-center">
            <div class="card-body fondocard">
                <h5 class="card-title etiquetadash">Reportes</h5>
                <p class="card-text etiquetadash">Visualiza y exporta los reportes del sistema.</p>

                <!-- Contenedor para alinear los botones -->
                <div class="d-flex flex-wrap justify-content-center gap-2">
                    <a href="{{ route('reportes.estudiantes') }}" class="btn btn-primary">Estudiantes Inscritos</a>
                    <a href="{{ route('reportes.cursos') }}" class="btn btn-primary">Cursos por Materia</a>
                </div>

                <br>

                <div class="d-flex flex-wrap justify-content-center gap-2">
                    <a href="{{ route('reportes.comisiones') }}" class="btn btn-primary">Comisiones y Horarios</a>
                    <a href="{{ route('reportes.profesores') }}" class="btn btn-primary">Asistencia Profesores</a>
                </div>                    
                                
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>