<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## INSTRUCTIONS TO GET STARTED
### 1st step
install composer first or if you have composer skip to the next step

for windows
> <a href="https://getcomposer.org/Composer-Setup.exe"> composer install.</a>

During the set up choose the following directory if u have an existing xampp server

> \xampp\php\php.exe 

after installation check terminal to see if composer works

#### $: composer // bash terminal 

#### composer // windows cmd or powershell

### 2nd step
clone project

> git clone https://github.com/Iktisad/tweety.git tweety


or simply clone it using github gui option.
cloned project must be kept in htdocs folder of XAMPP OR WAMPP server

change the name of the zip file or the clone to ***tweety***

### 3rd step 
Setting up the dependencies
move into the application folder from cmd , powershell or terminal

> cd xampp/htdocs/tweety

then run 

> composer install 

This will bring in all the dependencies needed

***NEXT***

copy .env.example file to .env
run the command in terminal, cmd or powershell

> copy .env.example .env

***Set Up The Database in .env file***
open .env file
change

>DB_DATABASE = homestead to DB_DATABASE = tweety

>DB_USERNAME = homestead to DB_USERNAME = root

>DB_PASSWORD = homestead to DB_PASSWORD = ''


### 4th step

#### Now run all the commands below

***Note all these commands mus be run in /xampp/htdocs/tweety directory***

> php artisan key:generate

> php artisan migrate // this will create all the tables in the database

> php artisan serve // this will generate localhost session http//: 127.0.0.1:800 copy paste in your browser to gain access


***Finally if you face any errors during running the project***
run the command inside /xampp/htdocs/tweety

> npm install && run dev 



