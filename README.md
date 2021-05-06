# Donation System

Application Laravel + Vue.js - Adm panel and Donor panel.

## Installation

Clone the repository

    git clone git@github.com:JohnnySilva777/laravel_vue_donor.git

Switch to the repo folder

    cd laravel_vue_donor

Install all the dependencies using composer

    composer install

Install all the dependencies using npm

    npm install
    npm run dev

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Run the seeders

    php artisan db:seed

Start the local development server

    php artisan serve

## Usage

Admin route
```python
login: admin@admin
password: password

/login/admin
```

Donor route
```python
login: donor@gmail.com
password: password

/login/donor
/login/donor/register
```

## Notes
This application was to put acquired knowledge into practice.

* Multi-Auth Laravel

* Working with API routes

* CRUD

* Relations

* Use of the webpack

* Theme integration

* Application of Vue.js in some components of the donor screen

New features and bugfixes are on the way ...

:)
