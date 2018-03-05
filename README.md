# LaravelAPI

# Descripcion

Este proyecto es una API REST en la cual el rol de administrador puede ver, crear, actualizar y eliminar planners.
El administrador y los planners pueden ver, crear, actualizar y eliminar bodas.
En el listado de bodas el administrador puede ver quien creó cada boda.
Cada boda contiene la siguiente información:
Nombre completo, correo electrónico y número telefónico de la novia y el novio.

# Tecnologías

  * Laravel 5.5
  * Passport
  * laravel/permissions
  * Composer 1.5.1

# Instrucciones de instalacion

  * Descargar el repositorio:
    git clone git@github.com:CosioYair/LaravelAPI.git

  --- En la carpeta del proyecto ---

  * Instalar dependencias:
    composer install

  * Ejecutar migraciones:
    php artisan migrate

  * Ejecutar seeds:
    php artisan db:seed

  * Ejecutar el servidor:
    php artisan serve



