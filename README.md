App Colaborativa
====================

About
-----
App Colaborativa. Hecho con Laravel 5 y JQuery

Dudas, comentarios y demás:[suericgp@gmail.com]


¿Cómo instalar?
--------------

1. Instalar [Composer] (https://getcomposer.org/download/) . Se necesita php > 5
2. Instalar [Laravel] (http://laravel.com/docs/5.1#installation) . Instalar Via Composer
3. Ir a la carpeta del proyecto .
4. Correr `composer install`.
5. Renombrar archivo .env.example a .env .
6. Correr `php artisan key:generate` . 
7. Editar .env . Cambiar DB_HOST, DB_DATABASE, DB_USERNAME, DB_PASSWORD por las suyas.
8. Correr `php artisan serve` .
9. Ir al navegador: [http://localhost:8000] . Debería verse: LARAVEL 5 .

Nota
-----
Es importante cambiar editar el archivo .env con los datos de la base de datos. La configuración de la base de datos es independiente de Laravel en cada servidor local o remoto .
