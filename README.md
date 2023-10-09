<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Initial installation

1. Clone this repository.

```bash
$ git clone https://github.com/roxreis/aluguel-livro
```

2. Running the initial installation.

```bash
$ cd aluguel-livro
$ composer install
$ cp .env.example .env
$ php artisan key:generate
$ composer require laravel/sail --dev
```

3. Up containers.

```bash
$ vendor/bin/sail up -d
```

4. Alias.
```bash
$ alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail'
```

5. Generate migrations.
```bash
$ sail artisan migrate
```

6. Generate Seeders.
```bash
$ sail artisan db:seed --class=UserSeeder
$ sail artisan db:seed --class=BookSeeder
```
