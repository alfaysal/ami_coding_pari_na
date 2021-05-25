# Ami Coding Pari Na

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

> ### Ami Coding Pari Na containing real world examples (Authentication,Searching advanced patterns and more) that adheres to the [RealWorld](https://github.com/alfaysal/ami_coding_pari_na) spec and API.



# Getting started

## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/7.x/installation)


Clone the repository

    git clone https://github.com/alfaysal/ami_coding_pari_na.git

Switch to the repo folder

    cd ami_coding_pari_na
    
Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env
Install all the dependencies using composer

    composer install

Generate a new application key

    php artisan key:generate
    
Install for jwt authentication

    composer require tymon/jwt-auth
    
Generate a new JWT authentication secret key

    php artisan jwt:secret

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Start the local development server

    php -S localhost:8000 -t public

You can now access the server at http://localhost:8000

**TL;DR command list**

    git clone https://github.com/alfaysal/ami_coding_pari_na.git
    cd ami_coding_pari_na
    composer install
    cp .env.example .env
    php artisan key:generate
    composer require tymon/jwt-auth
    php artisan jwt:secret
    
**Make sure you set the correct database connection information before running the migrations** [Environment variables](#environment-variables)

    php artisan migrate
    php -S localhost:8000 -t public



## API Specification

This application adheres to the api specifications set by the [Faysal](https://github.com/alfaysal) team. This helps mix and match any backend with any other frontend without conflicts.


# Code overview

## Dependencies

- [jwt-auth](https://github.com/tymondesigns/jwt-auth) - For authentication using JSON Web Tokens

## Folders

- `app` - Contains all the Eloquent models
- `app/Http/Controllers/Api` - Contains all the api controllers
- `config` - Contains all the application configuration files
- `database/migrations` - Contains all the database migrations
- `database/seeds` - Contains the database seeder
- `routes` - Contains all the api routes defined in api.php file

## Environment variables

- `.env` - Environment variables can be set in this file

***Note*** : You can quickly set the database information and other variables in this file and have the application fully working.

----------

# Testing API

Run the laravel development server

    php -S localhost:8000 -t public
    
User should be login for generate jwt token

    http://localhost:8000/api/login

The api can now be accessed at

    http://localhost:8000/api/khoj
    
The token can now be refresh at

    http://localhost:8000/api/refresh

The user can now be logout at

    http://localhost:8000/api/logout

Request headers

| **Required** 	| **Key**              	| **Value**            	|
|----------	|------------------	|------------------	|
| Param      	| start_datetime,end_datetime,user_id     	| bearer token 	|
| Authorization      	| email,password	| XMLHttpRequest   	|
| Refresh ,Logout     	| bearer token	|   	|


# Authentication
 
This applications uses JSON Web Token (JWT) to handle authentication. The token is passed with each request using the `Authorization` header with `Token` scheme. The JWT authentication middleware handles the validation and authentication of the token. Please check the following sources to learn more about JWT.
 
- https://jwt.io/introduction/

