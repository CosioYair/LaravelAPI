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

# Admin

  * Email: admin@admin.com
  * Password: admin

# Endpoints

La base para todos los endpoints es: host/
Para poder consumir los servicios primero tendras que hacer login

  * GET

    - users

        respuestas:
          Para un usuario admin: todos los usuarios
          Para un usuario normal: "Unauthorized"

    - users/{user}

        paramtros:
          id

        respuestas:
          Para un usuario admin: el usuario con el id seleccionado
          Para un usuario normal: "Unauthorized"

    - users/{user}/wedding

        paramtros:
          id_usuario

        respuestas:
          Para un todos los usuario: weddings del usuario con id seleccionado

    - users/{user}/wedding/{wedding}

        respuestas:
          Para un todos los usuario: wedding espesifica del usuario con id seleccionado

    - admin/allWeddings

        respuestas:
          Para un usuario admin: todas las weddings
          Para un usuario normal: "Unauthorized"

    - admin/wedding/{wedding}

        respuestas:
          Para un usuario admin: wedding con el id seleccionado
          Para un usuario normal: "Unauthorized"

  * POST

    - login

        paramtros:
          email
          password

        respuestas:
          Para un usuario registrado: usuario seleccionado y su token
          Para un usuario no registrado: "Usuario o contrasena no valida"

    - admin/{user_id}/weddings

        paramtros:
          husband_name
          husband_email
          husband_phone
          wife_name
          wife_email
          wife_phone

        respuestas:
          Para un usuario admin: wedding registrada al usuario con id seleccionado
          Para un usuario normal: "Unauthorized"

    - users

        paramtros:
          name
          email
          password
          c_password

        respuestas:
          Para un usuario admin: el usuario registrado
          Para un usuario normal: "Unauthorized"

    - users/{user}/weddings

        paramtros:
          husband_name
          husband_email
          husband_phone
          wife_name
          wife_email
          wife_phone

        respuestas:
          Para todos los usuarios: wedding registrada al usuario con id seleccionado

  * PUT

    - users/{user}

        paramtros opcionales:
          name
          email

        respuestas:
          Para un usuario admin: el usuario actualizado
          Para un usuario normal: "Unauthorized"

    - users/{user}/weddings/{wedding}

        paramtros opcionales:
          husband_name
          husband_email
          husband_phone
          wife_name
          wife_email
          wife_phone

        respuestas:
          Para todos los usuarios: wedding actualizada con el usuario con id seleccionado

    - admin/{user}/weddings/{wedding}

        paramtros opcionales:
          husband_name
          husband_email
          husband_phone
          wife_name
          wife_email
          wife_phone

        respuestas:
          Para un usuario admin: wedding actualizada
          Para un usuario normal: "Unauthorized"

  * DELETE

    - users/{user}

        respuestas:
          Para un usuario admin: success con codigo 200
          Para un usuario normal: "Unauthorized"

    - users/{user}/weddings/{wedding}

        respuestas:
          Para todos los usuarios: success con codigo 200

    - admin/{user}/weddings/{wedding}

        respuestas:
          Para un usuario admin: success con codigo 200
          Para un usuario normal: "Unauthorized"
