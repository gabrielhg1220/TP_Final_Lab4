> Integrante del grupo:
   - Garcia, Gabriel Hernan
   - Numero de Legajo: 18452

-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

>>> Instrucciones para Instalar y Ejecutar la Aplicación <<<

1. Clonar el Repositorio
Primero, necesitas clonar el repositorio desde GitHub (o cualquier otro repositorio remoto).

		git clone https://github.com/tu-usuario/tu-repositorio.git

		cd tu-repositorio

2. Instalar Dependencias con Composer (https://getcomposer.org/)
Asegurarse de tener Composer instalado. Luego, ejecuta este comando para instalar las dependencias de Laravel:

		composer install

3. Configurar el Archivo .env
   - Crea una copia del archivo .env.example como .env:

		cp .env.example .env
   - Abre el archivo .env y configura tus variables de entorno:
     - Base de datos: Actualiza las credenciales para tu servidor SQL (MySQL, PostgreSQL, etc.). Ejemplo:

		DB_CONNECTION=mysql
		DB_HOST=127.0.0.1
		DB_PORT=3306
		DB_DATABASE=nombre_base_datos
		DB_USERNAME=tu_usuario
		DB_PASSWORD=tu_contraseña

4. Configurar y Migrar la Base de Datos
   - Asegúrate de tener la base de datos configurada y en ejecución.
   - Ejecuta las migraciones para crear las tablas necesarias:

		php artisan migrate

   -Para ejecutar datos iniciales (seeders), ejecutar:

		php artisan db:seed

5. Ejecutar el Servidor Local
Laravel incluye un servidor de desarrollo integrado. Para iniciarlo, ejecuta:

		php artisan serve

El comando ejecutará tu aplicación en http://localhost:8000. Puedes acceder a ella desde un navegador.

6. Verificar el Proyecto
   - Abre tu navegador y visita http://localhost:8000 para asegurarte de que la aplicación se ejecuta correctamente.
   - Si utilizas rutas específicas (como reportes o CRUD de empleados), asegúrate de probarlas.

-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

>>> Problemas Comunes y Soluciones <<<

1- Problema: Dependencias no instaladas Si el comando composer install falla, asegúrate de:

   - Tener Composer instalado.
   - Ejecutar el comando desde el directorio raíz del proyecto.

2- Problema: Error en la Base de Datos
   - Verifica que las credenciales en el archivo .env sean correctas.
   - Asegúrate de que la base de datos existe en tu servidor.

3- Problema: Recursos de Frontend no cargan
   - Asegurarse de haber ejecutado npm install y npm run dev.
   - Revisa si las rutas a los archivos CSS y JS están correctamente configuradas.

>>> Resumen de Comandos <<<

git clone https://github.com/tu-usuario/tu-repositorio.git
cd tu-repositorio
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
npm install
npm run dev
php artisan serve
