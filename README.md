
# Laravel Real Estate API

## Descripción

Esta API REST permite gestionar propiedades inmobiliarias, personas y solicitudes de visita. Proporciona operaciones CRUD para cada entidad y garantiza la autenticación de usuarios.

## Requisitos

- PHP >= 8.1
- Laravel >= 10.10
- MySQL

## Instalación

1. **Clonar el repositorio:**

   ```bash
   git clone https://github.com/NilviaSM/laravel-real-estate-api
   cd laravel-real-estate-api
   ```

2. **Instalar las dependencias:**

   ```bash
   composer install
   ```

3. **Configurar el archivo `.env`:**

   - Copiar el archivo de ejemplo:

     ```bash
     cp .env.example .env
     ```

   - Configurar la conexión a la base de datos en el archivo `.env`.

4. **Generar la clave de la aplicación:**

   ```bash
   php artisan key:generate
   ```

5. **Migrar la base de datos:**

   ```bash
   php artisan migrate
   ```

6. **Cargar datos iniciales (opcional):**

   ```bash
   php artisan db:seed
   ```

## Endpoints

### Autenticación

- **Registrar un usuario:**
  
  - **POST** `/api/register`
  
  - **Body:**
    ```json
    {
      "name": "John Doe",
      "email": "john@example.com",
      "password": "lacasadejuana",
      "password_confirmation": "lacasadejuana"
    }
    ```

- **Iniciar sesión:**
  
  - **POST** `/api/login`
  
  - **Body:**
    ```json
    {
      "email": "john@example.com",
      "password": "lacasadejuana"
    }
    ```

### Personas

- **Listar personas:**

  - **GET** `/api/personas`
  
- **Crear persona:**

  - **POST** `/api/personas`
  
  - **Body:**
    ```json
    {
      "nombre": "Ana López",
      "email": "ana.lopez@example.com",
      "telefono": "987654321"
    }
    ```

- **Actualizar persona:**

  - **PUT** `/api/personas/{id}`
  
  - **Body:**
    ```json
    {
      "telefono": "123456789"
    }
    ```

- **Eliminar persona:**

  - **DELETE** `/api/personas/{id}`

### Propiedades

- **Listar propiedades:**

  - **GET** `/api/propiedades`

- **Crear propiedad:**

  - **POST** `/api/propiedades`
  
  - **Body:**
    ```json
    {
      "direccion": "Calle Falsa 123",
      "ciudad": "Santiago",
      "precio": 100000,
      "descripcion": "Propiedad en excelente ubicación."
    }
    ```

- **Actualizar propiedad:**

  - **PUT** `/api/propiedades/{id}`
  
  - **Body:**
    ```json
    {
      "precio": 120000
    }
    ```

- **Eliminar propiedad:**

  - **DELETE** `/api/propiedades/{id}`

### Solicitudes de Visita

- **Listar solicitudes de visita:**

  - **GET** `/api/solicitudes-visita`

- **Crear solicitud de visita:**

  - **POST** `/api/solicitudes-visita`
  
  - **Body:**
    ```json
    {
      "persona_id": 1,
      "propiedad_id": 1,
      "fecha_visita": "2024-10-10",
      "comentarios": "Interesado en conocer el departamento."
    }
    ```

- **Actualizar solicitud de visita:**

  - **PUT** `/api/solicitudes-visita/{id}`
  
  - **Body:**
    ```json
    {
      "comentarios": "Visita reprogramada."
    }
    ```

- **Eliminar solicitud de visita:**

  - **DELETE** `/api/solicitudes-visita/{id}`
