# Laravel app with Apiato

Application created as a test task

# Getting started

## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/9.x)

Clone the repository

    git clone git@github.com:PandaDoddo/esoft-middle-test-backend.git

Switch to the repo folder

    cd esoft-middle-test-backend

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Generate a grant client and add the **Client ID** and **Client secret** values to the `CLIENT_WEB_ID` and `CLIENT_WEB_SECRET` fields in the `.env` file

    php artisan passport:client --password

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000

## Database seeding

**Populate the database with seed data with relationships which includes users, roles, permissions and etc.**

Seed basic data

    php artisan db:seed

Seed testing data

    php artisan apiato:seed-test

***Note*** : It's recommended to have a clean database before seeding. You can refresh your migrations at any point to clean the database by running the following command

    php artisan migrate:refresh
