# DISFARMA Honduras

Sistema web de gestión interna desarrollado en Laravel para **Droguería y Distribuidora Farmacéutica San Rafael S. de R.L.**

El sistema integra la administración de medicamentos, proveedores, empleados y un dashboard gerencial con indicadores principales.

## Tecnologías

- Laravel
- PHP
- MySQL
- Bootstrap 5
- Bootstrap Icons
- XAMPP
- Composer

## Módulos principales

- Autenticación de usuarios
- Dashboard gerencial
- Catálogo e inventario de medicamentos
- Gestión de proveedores
- Gestión de empleados
- Control de estados, validaciones y formularios seguros

## Requisitos

- PHP 8.2 o superior
- Composer
- MySQL
- XAMPP o entorno equivalente

## Instalación

```bash
git clone https://github.com/JAAO97/EXAMEN2_WEB.git
cd EXAMEN2_WEB
composer install
```

Crear el archivo `.env` a partir de `.env.example` y configurar la conexión a MySQL.

Luego ejecutar:

```bash
php artisan key:generate
php artisan migrate
php artisan serve
```

Abrir en el navegador:

```text
http://127.0.0.1:8000
```

## Usuario administrador de prueba

Para acceder al sistema en el entorno académico/local:

```text
Correo: admin@disfarma.hn
Contraseña: Admin12345
```

Estas credenciales son únicamente para fines de prueba y demostración del proyecto.

## Seguridad

El sistema incorpora:

- Autenticación mediante Laravel
- Protección CSRF
- Rutas protegidas por middleware
- Contraseñas cifradas con Bcrypt
- Regeneración e invalidación segura de sesiones

## Autor

Proyecto desarrollado como ejercicio práctico de Programación Web — Universidad Nacional Autónoma de Honduras.