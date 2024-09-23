# Cocktail Maps Backend

## Description

This project serves as the backend for the Cocktail Maps application. It handles the registration and management of bars, cocktails, and tutorials. Users can create and manage data that will be accessed by the frontend application through the Node.js web service.

## Prerequisites

Before running this project, ensure that you have a PostgreSQL database set up and configured.

## Configuration

Configure the .env file: Update the following database connection details in the .env file:

    DB_CONNECTION=pgsql
    DB_HOST=127.0.0.1
    DB_PORT=5432
    DB_DATABASE=<your_database_name>
    DB_USERNAME=<your_username>
    DB_PASSWORD=<your_password>

## Installation

Clone the repository:

``` git clone https://github.com/alanrychert/Cocktail-Maps/ ```

Navigate to the project directory:

``` cd backend ```

Install the dependencies:

``` composer install ```

## Running Migrations

To set up the database schema, run the migrations:

``` php artisan migrate ```

## Running Seeders
After the migrations, execute the seeders for roles and users:

Seed roles:

``` php artisan db:seed --class=RoleSeeder ```

Seed users:

```php artisan db:seed --class=UserSeeder ```

Note: You can add an admin user in the UsersSeeder during the seeding process.

## Running the Project

To start the Laravel development server, use the following command:

``` php artisan serve ```

The application will be accessible at http://localhost:8000.

## Note

Make sure to have your PostgreSQL database running and properly configured to access the full functionality of the application.
