# Crm
Crm test application made with Laravel 5.8, bootstrap, gulp...
REQUIREMENTS
* PHP 7.2
* MySql
* Apache
* Composer
* Gulp
* Npm

## 1. INSTALLATION

Depending on your System, Windows, Linux this setup might change, use this documentation as a general help. 

Download the repository and paste it on a folder inside htdocs.

Create a domain virtual hosts with the name that you decide. For this you should change the file httpd-vhosts.conf inside apache. Add a domain with at least this basic information:

<VirtualHost *:80>
    ServerName crmtest.localhost
    ServerAdmin webmaster@localhost
    DocumentRoot C:\xampp\htdocs\laravel\crm-test\public
    DirectoryIndex index.php
    <Directory C:\xampp\htdocs\laravel\crm-test>
        Options Indexes FollowSymLinks MultiViews
        AllowOverride all
        DirectoryIndex index.php
        Order allow,deny
        allow from all
    </Directory>
    ErrorLog C:\xampp\apache\logs\error.log
    CustomLog C:\xampp\apache\logs\access.log combined
</VirtualHost>

NOTE! Point the document root to /public directory in order to load the index file of Laravel.

Open a console and run composer update to update the libraries of composer. 

Go to your browser and check if the page works. 

## 2. Database installation.

We have two process to do with the database: 

Create a db with the user and password that you want. Check the details and change them on the .env file

a) Migrate the tables. For this within the main directory of laravel type php artisan migrate. This will create the tables used for this app. 

b) Seed the users table with one administrator. For this type in the console php artisan db:seed

The password is 'password' and user admin@admin.com

The setup should be ok. If you go to the url choosen on the virtual host you should see the website with the login form. 

## 3. Login on the system. 

