# Cocktail Maps Application

## Description

This repository contains the full stack of the Cocktail Maps application, consisting of three main components:

Backend: Developed with Laravel, this component manages the registration and management of bars, cocktails, and tutorials. Users can create and manage data accessed by the frontend application.

Web Service: Built with Node.js, this serves as an API that allows the frontend application to interact with the backend. The web service provides endpoints for accessing data and is documented using Swagger.

Frontend: Created with Vue.js, this component allows users to view and interact with the data. Users cannot register or log in; they can only access data uploaded by registered users of the backend.

## Getting Started

To set up and run the application, follow the instructions for each individual component below.

### Backend (Laravel)

1. Configure the database in the .env file.
2. Install dependencies: ``` composer install ```
3. Run migrations: ``` php artisan migrate ```
4. Seed the database with roles and users:
 ``` php artisan db:seed --class=RoleSeeder ```
 ``` php artisan db:seed --class=UserSeeder ```
 (You can also modify the UserSeeder to add an admin user.)
5. Start the Laravel server: ``` php artisan serve ```

### Web Service (Node.js)

1. Ensure your PostgreSQL database is running.
2. Navigate to the web service directory.
3. Install dependencies: ``` npm install ```
4. Start the web service: ``` npm start ```
5. Access the API documentation at http://localhost:80. (Optional).

### Frontend (Vue.js)

1. Ensure the web service is active on port 80.
2. Navigate to the frontend directory.
3. Install dependencies: ``` npm install ```
4. Start the development server: ``` npm run serve ```

## Notes

- The backend does not need to be running for the frontend and web service to work.
- Ensure that the web service is configured correctly for the frontend to function properly.
- The web service acts as a bridge between the frontend and the backend, providing a seamless experience for users.

## Additional Information

For more details on how to set up and run each project, please refer to the README files located within each project’s folder.
