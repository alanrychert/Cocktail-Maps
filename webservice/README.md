# Cocktail Maps Web Service

## Description

This project serves as the web service for the Cocktail Maps application. It acts as an API that provides access to the data managed by the backend, including bars, cocktails, and tutorials. The database must be active for the web service to access the information.

## Prerequisites

Make sure your PostgreSQL database is running and properly configured, as the web service relies on it for data access.

## Installation

Clone the repository:

``` git clone https://github.com/alanrychert/Cocktail-Maps/ ```

Navigate to the project directory:

``` cd webservice ```

Install the dependencies:

``` npm install ```

## Running the Web Service

To start the Node.js web service, use the following command:

``` npm start ```

The web service will be accessible at http://localhost:80.

## API Documentation

The web service is documented using Swagger. You can access the API documentation at http://localhost:80.

Using this documentation, you can test the different endpoints offered by the API and see how to interact with the data.

## Testing the API using Postman

In order to test the webservice using Postman, you have to import the file "Coleccion servicio web.postman_collection.json"

![image](https://user-images.githubusercontent.com/50160556/120728905-41add200-c4b4-11eb-9f6e-f5354d956ea3.png)

![image](https://user-images.githubusercontent.com/50160556/120728917-4a9ea380-c4b4-11eb-9036-1307a87bd5fb.png)

![image](https://user-images.githubusercontent.com/50160556/120728927-512d1b00-c4b4-11eb-8a55-7d68c687067a.png)

## Note
Ensure that your PostgreSQL database is active and accessible for the web service to function correctly.


