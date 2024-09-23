const express = require('express');
const cors = require('cors');
const app = express();

// middlewares
app.use(express.json());
app.use(express.urlencoded({extended: true}));
app.use(require('sanitize').middleware);
app.use(cors()) // Use this after the variable declaration

// routes
app.use(require('./routes/index'))

const port = process.env.PORT || 80;


app.listen(port, () => {
    console.log(`App running on port ${port}.`)
  });

 // Swagger
const swaggerUi = require('swagger-ui-express');
const swaggerJsdoc = require('swagger-jsdoc');

const options = {
    definition: {
      openapi: "3.0.0",
      info: {
        title: "Cocktail Maps API",
        version: "1.0.0",
        description:
          "Documentación de API CockTail Maps",
        contact: {
          name: "Alan Rychert",
        },
      },
      servers: [
        {
          url: "http://localhost/",
        }
      ],
    },
    apis: ["src/routes/index.js"],
  };
  
  
  const specs = swaggerJsdoc(options);
  app.use(
    "/",
    swaggerUi.serve,
    swaggerUi.setup(specs)
  );