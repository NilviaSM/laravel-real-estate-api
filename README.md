
# Laravel Real Estate API

## Descripción

Este proyecto es una API REST desarrollada con Laravel para gestionar propiedades, personas y solicitudes de visita.

## Requisitos

Antes de comenzar, asegúrese de tener instalado lo siguiente:

- [PHP](https://www.php.net/downloads) (versión 8.0 o superior)
- [Composer](https://getcomposer.org/download/) (gestor de dependencias para PHP)
- [Laravel](https://laravel.com/docs/8.x/installation) (instalado a través de Composer)
- [MySQL](https://dev.mysql.com/downloads/mysql/) o [MariaDB](https://mariadb.org/download/)

## Instalación

Siga estos pasos para instalar y configurar el proyecto en su entorno local:

1. **Clonar el repositorio**

   Ejecute el siguiente comando en la terminal para clonar el repositorio:

   ```bash
   git clone https://github.com/NilviaSM/laravel-real-estate-api.git
   ```

2. **Navegar a la carpeta del proyecto**

   Cambie al directorio del proyecto:

   ```bash
   cd laravel-real-estate-api
   ```

3. **Instalar las dependencias**

   Utilice Composer para instalar las dependencias del proyecto:

   ```bash
   composer install
   ```

4. **Configurar el entorno**

   Copie el archivo `.env.example` a un nuevo archivo `.env` y configure las credenciales de la base de datos:

   ```bash
   cp .env.example .env
   ```

   Luego, abra el archivo `.env` y edite las siguientes líneas:

   ```makefile
   DB_DATABASE=nombre_de_la_base_de_datos
   DB_USERNAME=tu_usuario
   DB_PASSWORD=tu_contraseña
   ```

5. **Ejecutar el siguiente comando para generar la clave de la aplicación**

   ```bash
   php artisan key:generate
   ```

6. **Ejecutar las migraciones**

   Cree las tablas en la base de datos ejecutando:

   ```bash
   php artisan migrate --seed
   ```

   Este comando también ejecutará los seeders para llenar la base de datos con datos de prueba.

7. **Ejecución**

   Para iniciar el servidor de desarrollo de Laravel, ejecute:

   ```bash
   php artisan serve
   ```

   Esto abrirá la aplicación en http://127.0.0.1:8000.

8. **Uso de Postman**

   En la raíz del proyecto, encontrará una colección de Postman llamada `LacasadeJuana-CRUD.postman_collection.json`. Esta colección contiene todas las rutas de la API.

   **Cómo usar la colección en Postman:**

   - Abra **Postman**.
   - Haga clic en **Import** en la esquina superior izquierda.
   - Seleccione **Upload Files** y elija el archivo `LacasadeJuana-CRUD.postman_collection.json` ubicado en la raíz del proyecto.
   - Haga clic en **Import**.

   Ahora podrá ver la colección en su Postman y ejecutar todas las rutas de la API directamente.
