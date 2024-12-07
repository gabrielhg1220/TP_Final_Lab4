<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GESTION ESCOLAR - REPORTES</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>

  <body class="fondo">
    <h1 class="titulo">REPORTES</h1>

    <br><br>

    <div class="container mt-5 text-center">
      <!-- Contenedor para alinear los botones -->
      <div class="d-flex flex-wrap justify-content-center gap-2">
        <a href="{{ route('reportes.estudiantes') }}" class="btn btn-success">Estudiantes Inscritos</a>
        <a href="{{ route('reportes.cursos') }}" class="btn btn-success">Cursos por Materia</a>
      </div>

      <br>

      <div class="d-flex flex-wrap justify-content-center gap-2">
        <a href="{{ route('reportes.comisiones') }}" class="btn btn-success">Comisiones y Horarios</a>
        <a href="{{ route('reportes.profesores') }}" class="btn btn-success">Asistencia Profesores</a>
      </div> 

      <br><br>

      <!-- Botones para voler y cerrar -->
      <div class="row mt-3 justify-content-center">
        <div class="col-md-2">
          <button class="btn btn-danger btn-block x-100" onclick="cerrarVentana()">Cerrar</button>

          <script>
            function cerrarVentana(){
              window.close();
            }
          </script>
        </div>

      </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>