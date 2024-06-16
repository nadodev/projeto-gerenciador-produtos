<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Sobre o Projeto

O projeto consiste em um sistema em PHP para gerenciar produtos e categorias, permitindo:
- Incluir
- Alterar
- Consultar
- Excluir 

Os produtos e as categorias.

## Como Instalar o projeto

### Primeiro é preciso fazer o clone do projeto, como mostra abaixo
```bash
git clone 
```

### Após isso, instalar as dependencias

```bash
    cd Gerenciador
    composer install
    npm install
```
### fazer uma cópia do arquivo .env.example e renomear para .env e fazer a configuração necessária

### Próximo passo é rodar as migration

```bash
php artisan migrate 
```

obs: se quiser rodar as migration com produtos teste e categoria teste, rode o comando abaixo

```bash
php artisan migrate:fresh --seed
```

obs: se você ainda não estiver com a database criado, apos rodar o comando acima , ele vai pedir se quer criar o banco de dados, você só precisa digitar "[ y ]"


## Rodar o projeto

```php
php artisan serve
```

em outro terminal

```php
 npm run dev
```

