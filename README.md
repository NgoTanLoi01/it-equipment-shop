# ITshop - Laravel - Vue.js
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

[![Open in Visual Studio Code](https://img.shields.io/static/v1?logo=visualstudiocode&label=&message=Open%20in%20Visual%20Studio%20Code&labelColor=2c2c32&color=007acc&logoColor=007acc)](https://open.vscode.dev/microsoft/Web-Dev-For-Beginners)

<p align="center">
  
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>



## How to Install
- Install PHP version 7.3 to 8.0 and Composer.
- Download the project from GitHub:

          git clone https://github.com/NgoTanLoi01/itshop-laravel-vuejs.git
          
- Project setup:

          composer install
          composer update
          npm install

- Run the project:
    - Run the following command to remove the old symbolic link in the Laravel public directory:
   
           Remove-Item -Recurse -Force public\storage
           
    - Run the following command to create a new symbolic link in the Laravel public directory:
   
           php artisan storage:link
           
    - Run the following command to create database tables:
   
          php artisan migrate:fresh --seed
          
    - Start the Laravel project:
    
          php artisan serve
          
    - Access the localhost address that appears:
    
          http://127.0.0.1:8000/

## Author Contact Information
  - Full Name: Ngo Tan Loi
  - Phone: +84 337 120 073
  - Email: ngotanloi2424@gmail.com
