<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Instrucciones de instalación:
**Clonar el proyecto:**
```
git clone https://gitlab.com/zacatecasup/ZacatecasUp_REST.git
```

**Actualizar dependencias:**
```
cd ZacatecasUp_REST
composer update
```

**Copiar el archivo .env.example y renombrarlo a .env**
```
cp .env.example .env
```

**Configurar la base de datos en el archivo .env:**
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=mydatabase
DB_USERNAME=myuser
DB_PASSWORD=mypassword
```

**Generar la llave para la aplicación**
```
php artisan key:generate
```

**Correr las migraciones:**
```
php artisan migrate:fresh
```

**Correr proyecto:**
```
php artisan serve --host 0.0.0.0 --port 8000
```

### Comandos básicos de Laravel
**Crear modelo:**
```
php artisan make:model MiModelo
```

**Crear controlador:**
```
php artisan make:controller MiModeloController
```

**Limpiar caché:**
```
php artisan cache:clear
```

**Crear migraciones:**
```
php artisan make:migration my_migration_name
```