> Integrante del grupo:
   - Garcia, Gabriel Hernan
   - Numero de Legajo: 18452

-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

>>> Instrucciones para Instalar y Ejecutar la Aplicación <<<

1. Requisitos Previos
Antes de comenzar, asegúrate de tener instalados los siguientes componentes en tu sistema:

PHP >= 8.0 (Recomendado: PHP 8.1 o superior)
Composer (Gestor de dependencias para PHP)
Node.js y npm (Para compilar los recursos frontend como Bootstrap)
MySQL o MariaDB (Base de datos utilizada en el proyecto)
Servidor web (Apache, Nginx o el servidor embebido de Laravel)

2. Clonar o Descargar el Proyecto
Clonar el proyecto desde el repositorio, para clonarlo utilizar Git con el siguiente comando:

	git clone https://github.com/tu-usuario/gestion-escolar.git

O descargar el proyecto como un archivo ZIP y extráerlo.
Acceder al directorio del proyecto:

	cd gestion-escolar

3. Instalar Dependencias
Instalar las dependencias de Laravel utilizando Composer, para instalarlo utilizar el comando:

	composer install

Instalar las dependencias frontend utilizando npm:

	npm install

4. Configurar el Archivo .env
- Copiar el archivo de configuración base:

	cp .env.example .env

- Editar el archivo .env para configurar tu conexión a la base de datos llamada GestionEscolar. Asegurarse de especificar los valores correctos para el entorno:

	DB_CONNECTION=mysql
	DB_HOST=127.0.0.1
	DB_PORT=3306
	DB_DATABASE=GestionEscolar
	DB_USERNAME=root
	DB_PASSWORD=tu_contraseña
	
- Genera la clave de la aplicación:

	php artisan key:generate

5. Configurar la Base de Datos
- Crea la base de datos manualmente en MySQL:

	CREATE DATABASE GestionEscolar;

- Ejecuta las migraciones y siembras para crear las tablas y poblarlas con datos iniciales:

	php artisan migrate --seed

6. Compilar los Recursos Frontend
- Compilar los archivos CSS y JavaScript (incluyendo Bootstrap):

	npm run dev

- Para producción, utilizar:

	npm run build

7. Iniciar el Servidor
Inicia el servidor de Laravel:

	php artisan serve

Esto va a iniciar el servidor en http://127.0.0.1:8000.

8. Acceso a la Aplicación
- Abre tu navegador y navega a http://127.0.0.1:8000.
- Accede al Dashboard de la aplicación donde puedes gestionar estudiantes, profesores, cursos, comisiones e inscripciones.

9. Exportación de Reportes (PDF y Excel)
Para que las funcionalidades de exportación a PDF y Excel funcionen correctamente:
- DomPDF: Ya está configurado en composer.json, por lo que no necesitas configuraciones adicionales.
- Maatwebsite/Excel: Asegúrate de que la extensión de PHP zip esté habilitada.

-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

>>> Problemas Comunes y Soluciones <<<

1- Problema: Dependencias no instaladas. Si el comando composer install falla, asegurarse de:

   - Tener Composer instalado.
   - Ejecutar el comando desde el directorio raíz del proyecto.

2- Problema: Error en la Base de Datos.
   - Verificar que las credenciales en el archivo .env sean las correctas.
   - Asegurarse de que la base de datos existe en el servidor.

3- Problema: Los recursos de Frontend no cargan.
   - Asegurarse de haber ejecutado npm install y npm run dev.
   - Revisar si las rutas a los archivos CSS y JS están correctamente configuradas.

>>> Resumen de los Comandos <<<

- git clone https://github.com/tu-usuario/tu-repositorio.git
- cd tu-repositorio
- composer install
- cp .env.example .env
- php artisan key:generate
- php artisan migrate --seed
- npm install
- npm run dev
- php artisan serve
