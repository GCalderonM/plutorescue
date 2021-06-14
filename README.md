# Plutorescue 🐶

Plutorescue es una aplicación web que permite a las personas buscar anuncios sobre animales abandonados para así adoptarlos. También permite que los usuarios se registren y posteen sus propios anuncios.

### Pre-requisitos 📋

Qué se necesita para poner en funcionamiento la aplicación:

```
PHP 7.3.23
Node.js
NPM o Yarn
Git
```

## Instalación

Clonamos el proyecto a través de Git.

Ejecutamos composer install para la incorporación de dependencias.

```php
php composer.phar install
```
Añadimos el .env para configurar nuestro entorno de desarrollo.

Ejecutamos el comando artisan para generar una clave única:

```php
php artisan key:generate
```

Ejecutamos el comando artisan migrate para añadir las tablas a nuestra base de datos. Añadimos la opción --seed
para añadir al administrador y a 200 usuarios como base. Si no queremos añadir a los 200 usuarios podemos modificar el seeder.

```php
php artisan migrate --seed
```

Ejecutamos NPM o Yarn para instalar las dependencias de javascript.

*Recomendamos Yarn por ser más rápido en las gestiones.

```
npm install
```
o
```
yarn install
```

Para compilar los archivos javascript y css ejecutaremos el siguiente comando:

```
npm run dev
```
o
```
yarn run dev
```

## Tecnologías 🛠️
* [Laravel](https://laravel.com/docs/8.x/releases) - Laravel 8.
* [Node.js](https://nodejs.org/es/) - Usado para compilar scss y js.
* [TailwindCSS](https://tailwindcss.com) - CSS para el frontend.
* [CoreUI](https://coreui.io) - Plantilla para el backend.
