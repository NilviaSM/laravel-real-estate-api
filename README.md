
# Laravel Real Estate API

## Descripción
Esta API REST permite gestionar propiedades inmobiliarias, personas y solicitudes de visita. Cada entidad tiene un CRUD completo y están relacionadas entre sí y garantiza la autenticación de usuarios.

## Requerimientos

### 1. Propiedad:
- Identificador único (`id`).
- Dirección (`direccion`).
- Ciudad (`ciudad`).
- comuna (`comuna`). --agregado
- Precio (`precio`).
- Descripción (`descripcion`).
- CRUD completo implementado.

### 2. Persona:
- Identificador único (`id`).
- Nombre completo (`nombre`).
- Correo electrónico (`email`).
- Número de teléfono (`telefono`).
- CRUD completo implementado.

### 3. Solicitud de Visita:
- Identificador único (`id`).
- Identificador de la persona que solicita la visita (`persona_id`).
- Identificador de la propiedad que se desea visitar (`propiedad_id`).
- Fecha programada para la visita (`fecha_visita`).
- Comentarios adicionales (`comentarios`).
- CRUD completo implementado.
- Posibilidad de asociar una solicitud a una propiedad existente y a una persona como contacto.

## Especificaciones Técnicas
- **Repositorio**: Este proyecto se encuentra en un repositorio público de GitHub llamado `laravel-real-estate-api`.
- **Estructura del Proyecto**: El proyecto sigue las convenciones estándar de Laravel.
- **Rutas y Controladores**: Rutas y controladores necesarios para manejar las operaciones CRUD de las tres entidades están implementados.
- **Migraciones y Modelos**: Se proporcionan migraciones para crear las tablas necesarias y los modelos Eloquent para cada entidad.
- **Relaciones**: Las relaciones entre las entidades `Persona`, `Propiedad` y `Solicitud de Visita` están configuradas usando Eloquent.

## Puntos Extra
- **Validación**: Se asegura la validación adecuada de los datos al crear o actualizar registros.
- **Documentación**: Este archivo README.md describe el proyecto y detalla los endpoints de la API y sus funcionalidades.
- **Testing**: Se deben implementar pruebas para validar el correcto funcionamiento de los endpoints CRUD y las relaciones entre las entidades.
- **Autenticación**: Se implementa un sistema básico de autenticación para proteger los endpoints de la API.
- **Filtros y Paginación**: Se agrega soporte para filtros y paginación en los endpoints de listados.
- **Manejo de Errores**: Se proporciona un manejo de errores adecuado y mensajes de respuesta claros.

## Cómo Ejecutar el Proyecto
1. Clonar el repositorio en tu máquina local.
2. Ejecutar `composer install` para instalar las dependencias de PHP.
3. Configurar el archivo `.env` con credenciales de la base de datos.
4. Ejecutar `php artisan migrate` para aplicar las migraciones.
5. Carga los datos iniciales usando `php artisan db:seed`.
6. Inicia el servidor de desarrollo con `php artisan serve`.

## Archivo formato json para importar en postman
Por favor cargar archivo a postman. Se realizaron request tanto para la lectura, editar, actualizar y eliminar, asi como también se prueban los filtros.

## Pruebas
Ejecutar `php artisan test` para realizar todas las pruebas del proyecto y verificar que todo funcione correctamente.

