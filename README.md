Hola Chicos! Presten atención a las siguientes indicaciones :)

# Instalar:
* Node.js (https://nodejs.org/es/)
* Composer (https://getcomposer.org/)
* Laravel  (https://laravel.com/docs/5.7/installation)
* Visual Studio Code (https://code.visualstudio.com/) o Git (https://gitforwindows.org/) como terminal de comandos
* PostgreSQL y pgAdmin 4 (https://www.youtube.com/watch?v=e1MwsT5FJRQ&vl=es) 

# --------------1ra opción para manejo de repositorios: Recomendamos utilizar Visual Studio Code en base a este video y esta guía:---------
* http://www.mclibre.org/consultar/informatica/lecciones/vsc-git-repositorio.html
* https://www.youtube.com/watch?v=jPQQISFOkRE&t=167s
# --------------2da opción para manejo de repositorios: Trabajar con GIT - guía de Git y de GitHub:--------------
* http://rogerdudler.github.io/git-guide/index.es.html?fbclid=IwAR2iVy1qknix0buF3JRn7WzUjXQnJ-i-yOTgGsSOZMAlvAGzQnvlCwSFPm0
* https://www.youtube.com/watch?v=3XlZWpLwvvo
# --------------En el repositorio se encuentra el script de creación de la base de datos en Postgres y una carpeta con el proyecto base que les permita seguir haciendo sus entregables.--------------
# --------------Estamos trabajando con Laravel y Bootstrap 4:--------------
# --------------Los tutoriales para usar Bootstrap 4 con Laravel son los siguientes:--------------
*https://www.youtube.com/watch?v=-83eiJ9EaD4
*https://www.youtube.com/watch?v=U3rPtLW5iuI

# --------------ADVERTENCIA:--------------
# Al descargar/clonar el proyecto no se suben todos los archivos que se requieren para ejecutar el proyecto, es por esto que se necesita:
# 1.-Añadir manualmente el archivo .env que se encuentra en el repositorio dentro de la carpeta del proyecto cambiando la configuración para poder acceder a la base de datos local (Host, puerto, nombre de la base, usuario, contraseña). 
# 2.-Entrar en la ruta de la carpeta del proyecto usando GIT o visual studio code(con terminal de comandos) y colocar:
  * 2.1.-composer update
  * 2.2.-composer install
  * 2.3.-npm install //(para que se ejecute esta línea de comando se requiere que esté instalado Node.js)
  * 2.4.-php artisan key:generate
  * 2.5.-php artisan serve
  * 2.6.-abrir explorador y ejecutar proyecto colocando localhost:8000 en barra de navegación //el puerto (8000) depende de cada uno
# --------------Si tienen alguna pregunta no duden en contactarnos:--------------
* Jose Salgado: 0994241512 - josesalgado7@hotmail.com
* Isabel Granja: 0984483181 - maisa_178@hotmail.com
# ----------Conexión Laravel - PostgreSQL
* Cambiar en el archivo .env de acuerdo a sus propios datos como el puerto, el nombre de la base, el usuario y la contraseña:
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5433
DB_DATABASE=Cuaderno_Estudiantil
DB_USERNAME=postgres
DB_PASSWORD=admin
* Cambiar el archivo database.php que se encuentra ubicado en la carpeta config:
 Poner en default a postreSQL:
'default' => env('DB_CONNECTION', 'pgsql'),
* Cambiar en la parte que dice 'pgsql' lo siguiente de acuerdo a sus propios datos como el puerto, el nombre de la base, el usuario y la contraseña:
'pgsql' => [
            'driver' => 'pgsql',
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '5433'),
            'database' => env('DB_DATABASE', 'Cuaderno_Estudiantil'),
            'username' => env('DB_USERNAME', 'postgres'),
            'password' => env('DB_PASSWORD', 'admin'),
            'charset' => 'utf8',
            'prefix' => '',
            'prefix_indexes' => true,
            'schema' => 'public',
            'sslmode' => 'prefer',
        ],
 * Luego, en el archivo php.ini descomentar estas líneas eliminando el punto y coma ;
 ;extension=php_pgsql.dll
 ;extension=php_pdo_pgsql.dll
 Debe quedar así:
 extension=php_pgsql.dll
 extension=php_pdo_pgsql.dll
 *Luego por comandos limpiar el caché:
php artisan cache:clear
php artisan config:clear

#----Nota importante-----
Al hacer push no enviar el archivo .env y el de database.php ya que cada uno lo tiene de diferente forma
 
