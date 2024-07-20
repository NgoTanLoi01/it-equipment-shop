# IT - Equipment - Shop

[![Open in Visual Studio Code](https://img.shields.io/static/v1?logo=visualstudiocode&label=&message=Open%20in%20Visual%20Studio%20Code&labelColor=2c2c32&color=007acc&logoColor=007acc)](https://open.vscode.dev/microsoft/Web-Dev-For-Beginners)

## Project Goals
This project aims to develop a website for selling IT equipment with advanced features such as:
- Support for multiple payment methods
- Order approval process
- Invoice printing
- Order confirmation via email
- Order confirmation via SMS
- Product reviews after receiving the goods
- Admin role management
- Frequently bought together product suggestions
- Product suggestions during search
- Intelligent support system (AI Chatbot)
- Live chat with staff


## How to Install
- Install PHP version 7.3 to 8.0 and Composer.
- Download the project from GitHub:

          git clone https://github.com/NgoTanLoi01/itshop-laravel-vuejs.git
          
- Project setup:

          composer install
          composer update

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
  - Email: ngotanloi2424@gmail.com
