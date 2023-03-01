<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Sobre o Projeto

O projeto "Pacientes" consiste em um pequeno sistema que 
abrange as principais funcionalidades de um software.
<br/>
Seriam essas funcionalidades: Cadastrar, Editar, Deletar, Visualizar e Pesquisar.
<br/>
OBS: O projeto "Pacientes" foi criado apenas com o propósito de estudo 
e não sendo ele para fins comerciais. 

## Tecnologias

PHP / Laravel / Bootstrap / Blade / JavaScript / PostgreSQL

## Instalação

1° Clone o projeto no GitHub<br/>
2° Renomeie o arquivo .env.example na raiz do projeto para .env<br/>
3° Informe as credenciais do seu banco de dados(PostgreSQL) no arquivo .env<br/>
4° Execute as migrations 

### Alguns Comandos Utilizados

composer create-project --prefer-dist laravel/laravel c-p

php artisan serve

php artisan make:migration create_patients_table

php artisan make:model ResidenciaModel

php artisan make:controller ResidenciaController

php artisan make:request StoreRequest

Além dos comandos Git
