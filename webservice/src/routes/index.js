const {Router} = require('express');
const router = Router();

const{ 
    getBars,
    getBar,
    getBarImage,
    getTragos,
    getTragosByBar,
    getTrago,
    getTragoImage,
    getTutorials,
    getTutorialsByTrago,
    getTutorial,
    getTutorialImage,
    getEtiquetas,
    getEtiqueta,
    getBarByName,
    getBarByAddress,
}= require('../controllers/index.controller');

/**
 * @swagger
 * /bars:
 *   get:
 *     description: Obtiene todos los bares en una página, si no se indica la página o se indica una pagina <=0 devuelve la página 1. El tamaño máximo de la pagina es 6 bares.
 *     tags: 
 *      - Bares
 *     parameters:
 *      - in: query
 *        name: page
 *        schema:
 *          type: integer
 *        description: Número de la página
 *     responses:
 *        '200':
 *          description: Respuesta exitosa 
 *        default:
 *          description: Error inesperado
*/
router.get('/bars', getBars);

/**
 * @swagger
 * /bars/{id_bar}:
 *  get:
 *    description: Obtiene un bar según el id pasado por parametro
 *    tags:
 *      - Bares
 *    parameters:
 *      - in: path
 *        name: id_bar
 *        schema:
 *          type: integer
 *        description: Id del bar
 *    responses:
 *      '200':
 *        description: Respuesta exitosa
 *      '403':
 *        description: El id pasado por parámetro no es de un tipo válido
 *      '404':
 *        description: No se encontró un bar con el id pasado por parámetro
 *      default:
 *        description: Error inesperado
 */
router.get('/bars/:id_bar', getBar);

/**
 * @swagger
 * /bars/byName/{name}:
 *  get:
 *    description: Obtiene los bares con nombre parecido al pasado por parámetro
 *    tags:
 *      - Bares
 *    parameters:
 *      - in: path
 *        name: name
 *        schema:
 *          type: string
 *        description: nombre por el cual se quiere buscar un bar
 *    responses:
 *      '200':
 *        description: Respuesta exitosa
 *      default:
 *        description: Error inesperado
 */
router.get('/bars/byName/:name', getBarByName);

/**
 * @swagger
 * /bars/byAddress/{address}:
 *  get:
 *    description: Obtiene los bares con dirección parecida a la pasada por parámetro
 *    tags:
 *      - Bares
 *    parameters:
 *      - in: path
 *        name: address
 *        schema:
 *          type: string
 *        description: direccion según la cual se quiere buscar bares
 *    responses:
 *      '200':
 *        description: Respuesta exitosa
 *      default:
 *        description: Error inesperado
 */
router.get('/bars/byAddress/:address',getBarByAddress);

/**
 * @swagger
 * /bars/{id_bar}/image:
 *  get:
 *    description: Obtiene la imagen que corresponde al bar con el id pasado por parámetro
 *    tags:
 *      - Bares
 *    parameters:
 *      - in: path
 *        name: id_bar
 *        schema:
 *          type: integer
 *        description: id del bar cuya imagen se solicita
 *    responses:
 *      '200':
 *        description: Respuesta exitosa
 *      '403':
 *        description: El id pasado por parámetro no es de un tipo válido
 *      '404':
 *        description: El bar no existe o no posee imagen
 *      default:
 *        description: Error inesperado
 */
router.get('/bars/:id_bar/image', getBarImage); 

/**
 * @swagger
 * /tragos:
 *   get:
 *     description: Obtiene todos los tragos en una página, si no se indica la página o se indica una pagina <= 0 devuelve la página 1. El tamaño máximo de la pagina es 6 tragos.
 *     tags: 
 *      - Tragos
 *     parameters:
 *      - in: query
 *        name: page
 *        schema:
 *          type: integer
 *        description: Número de la página
 *     responses:
 *        '200':
 *          description: Respuesta exitosa
 *        default:
 *          description: Error inesperado
 * 
*/
router.get('/tragos', getTragos);

/**
 * @swagger
 * /tragos/byBar/{id_bar}:
 *   get:
 *     description: Obtiene en una página todos los tragos ofrecidos por el bar cuyo id fue pasado por parámetro. Si no se indica la página o se indica una pagina <= 0 devuelve la página 1. El tamaño máximo de la pagina es 6 tragos.
 *     tags: 
 *      - Tragos
 *     parameters:
 *      - in: path
 *        name: id_bar
 *        schema:
 *          type: integer
 *        description: Id del bar cuyos tragos se quiere obtener
 *      - in: query
 *        name: page
 *        schema:
 *          type: integer
 *        description: Número de la página
 *     responses:
 *        '200':
 *          description: Respuesta exitosa
 *        '403':
 *          description: El id pasado por parámetro no es de un tipo válido
 *        default:
 *          description: Error inesperado
 * 
*/
router.get('/tragos/byBar/:id_bar',getTragosByBar)

/**
 * @swagger
 * /tragos/{id_trago}:
 *  get:
 *    description: Obtiene un trago según el id pasado por parametro
 *    tags:
 *      - Tragos
 *    parameters:
 *      - in: path
 *        name: id_trago
 *        schema:
 *          type: integer
 *        description: Id del trago
 *    responses:
 *      '200':
 *        description: Respuesta exitosa
 *      '403':
 *        description: El id pasado por parámetro no es de un tipo válido
 *      '404':
 *        description: No se encontró un trago con el id pasado por parámetro
 *      default:
 *        description: Error inesperado
 */
router.get('/tragos/:id_trago', getTrago); 

/**
 * @swagger
 * /tragos/{id_trago}/image:
 *  get:
 *    description: Obtiene la imagen que corresponde al trago con el id pasado por parámetro
 *    tags:
 *      - Tragos
 *    parameters:
 *      - in: path
 *        name: id_trago
 *        schema:
 *          type: integer
 *        description: id del trago cuya imagen se solicita
 *    responses:
 *      '200':
 *        description: Respuesta exitosa
 *      '403':
 *        description: El id pasado por parámetro no es de un tipo válido
 *      '404':
 *        description: El trago no existe o no posee imagen
 *      default:
 *        description: Error inesperado
 */
router.get('/tragos/:id_trago/image', getTragoImage);

/**
 * @swagger
 * /tutorials:
 *   get:
 *     description: Obtiene todos los tutoriales en una página, si no se indica la página o se indica una página <= 0 devuelve la página 1. El tamaño máximo de la pagina es 6 tutoriales.
 *     tags: 
 *      - Tutoriales
 *     parameters:
 *      - in: query
 *        name: page
 *        schema:
 *          type: integer
 *        description: Número de la página
 *     responses:
 *          '200':
 *              description: Respuesta exitosa
 *          default:
 *              description: Error inesperado
*/
router.get('/tutorials', getTutorials);


/**
 * @swagger
 * /tutorials/byTrago/{id_trago}:
 *   get:
 *     description: Obtiene en una página todos los tutoriales del trago cuyo id fue pasado por parámetro. Si no se indica la página o se indica una pagina <= 0 devuelve la página 1. El tamaño máximo de la pagina es 6 tragos.
 *     tags: 
 *      - Tutoriales
 *     parameters:
 *      - in: path
 *        name: id_trago
 *        schema:
 *          type: integer
 *        description: Id del trago cuyos tutoriales se quiere obtener
 *      - in: query
 *        name: page
 *        schema:
 *          type: integer
 *        description: Número de la página
 *     responses:
 *        '200':
 *          description: Respuesta exitosa
 *        '403':
 *          description: El id pasado por parámetro no es de un tipo válido
 *        default:
 *          description: Error inesperado
 * 
*/
router.get('/tutorials/byTrago/:id_trago',getTutorialsByTrago)

/**
 * @swagger
 * /tutorials/{id_tutorial}:
 *  get:
 *    description: Obtiene un tutorial según el id pasado por parametro
 *    tags:
 *      - Tutoriales
 *    parameters:
 *      - in: path
 *        name: id_tutorial
 *        schema:
 *          type: integer
 *        description: Id del tutorial
 *    responses:
 *      '200':
 *        description: Respuesta exitosa
 *      '403':
 *        description: El id pasado por parámetro no es de un tipo válido
 *      '404':
 *        description: No se encontró un tutorial con el id pasado por parámetro
 *      default:
 *        description: Error inesperado
 */
router.get('/tutorials/:id_tutorial', getTutorial); 

/**
 * @swagger
 * /tutorials/{id_tutorial}/image:
 *  get:
 *    description: Obtiene la imagen que corresponde al tutorial con el id pasado por parámetro
 *    tags:
 *      - Tutoriales
 *    parameters:
 *      - in: path
 *        name: id_tutorial
 *        schema:
 *          type: integer
 *        description: id del tutorial cuya imagen se solicita
 *    responses:
 *      '200':
 *        description: Respuesta exitosa
 *      '403':
 *        description: El id pasado por parámetro no es de un tipo válido
 *      '404':
 *        description: El tutorial no existe o no posee imagen 
 *      default:
 *        description: Error inesperado
 */
router.get('/tutorials/:id_tutorial/image', getTutorialImage);  

/**
 * @swagger
 * /etiquetas:
 *   get:
 *     description: Obtiene todas las etiquetas en una página, si no se indica la página devuelve la página 1. El tamaño máximo de la pagina es 6 etiquetas.
 *     tags: 
 *      - Etiquetas
 *     parameters:
 *      - in: query
 *        name: page
 *        schema:
 *          type: integer
 *        description: Número de la página
 *     responses:
 *       '200':
 *         description: Respuesta exitosa
 *       default:
 *         description: Error inesperado
*/
router.get('/etiquetas', getEtiquetas);

/**
 * @swagger
 * /etiquetas/{id_etiqueta}:
 *  get:
 *    description: Obtiene una etiqueta según el id pasado por parametro
 *    tags:
 *      - Etiquetas
 *    parameters:
 *      - in: path
 *        name: id_etiqueta
 *        schema:
 *          type: integer
 *        description: Id de la etiqueta
 *    responses:
 *      '200':
 *        description: Respuesta exitosa
 *      '403':
 *        description: El id pasado por parámetro no es de un tipo válido
 *      default:
 *        description: Error inesperado
 */
router.get('/etiquetas/:id_etiqueta', getEtiqueta); 

module.exports = router;

/**
 * @swagger
 * components:
 *   schemas:
 *     Bar:
 *       type: object
 *       properties:
 *         id_bar:
 *           type: integer
 *           description: Id del bar.
 *           example: 1
 *         nombre:
 *           type: string
 *           description: Nombre del bar.
 *           example: Las tias
 *         ubicacion:
 *           type: string
 *           description: Ubicación del bar.
 *           example: Av Alem 1200, Bahía Blanca, 8000
 *         Horarios:
 *           type: string
 *           description: Horarios en los que el bar está abierto.
 *           example: De 18:00hs y 24:00hs
 *         archivos_adjuntos:
 *           type: string
 *           description: Url del endpoint que devuelve la imagen del bar. Devuelve nulo en lugar del url si no tiene imagen
 *           nullable: true
 *           example: https://cocktail-maps-ws.herokuapp.com/bars/1/image
 *         etiquetas:
 *           type: Array of objects
 *           description: arreglo de objetos cuyas propiedades son el nombre de una etiqueta y su id. Contiene las etiquetas con las que es relacionado el bar.
 *           example: [{"nombre":"Barato","id":"9"}, {"nombre":"caro","id":"10"}]
 *     Trago:
 *       type: object
 *       properties:
 *         id_bar:
 *           type: integer
 *           description: Id del trago.
 *           example: 1
 *         nombre:
 *           type: string
 *           description: Nombre del trago.
 *           example: Margarita
 *         Ingredientes:
 *           type: string
 *           description: Ingredientes del trago.
 *           example: Tequila y jugo de lima
 *         Precio:
 *           type: integer
 *           description: Precio del trago.
 *           example: 450
 *         archivos_adjuntos:
 *           type: string
 *           description: Url del endpoint que devuelve la imagen del trago. Devuelve nulo en lugar del url si no tiene imagen.
 *           nullable: true
 *           example: https://cocktail-maps-ws.herokuapp.com/tragos/1/image
 *         etiquetas:
 *           type: Array of objects
 *           description: arreglo de objetos cuyas propiedades son el nombre de una etiqueta y su id. Contiene las etiquetas con las que es relacionado el trago.
 *           example: [{"nombre":"Barato","id":"9"}, {"nombre":"caro","id":"10"}]
 *
 *     Tutorial:
 *       type: object
 *       properties:
 *         id_tutorial:
 *           type: integer
 *           description: Id del tutorial.
 *           example: 1
 *         nombre:
 *           type: string
 *           description: Nombre del tutorial.
 *           example: Fernet argento 
 *         descripcion:
 *           type: string
 *           description: Descripción y pasos a seguir para preparar el trago.
 *           example: Llenar 3/4 del vaso con hielo, verter 30% de fernet en el vaso y completar con coca cola.
 *         id_trago:
 *           type: integer
 *           description: id del trago que se prepara en este tutorial.
 *           example: 2
 *         autor:
 *           type: string
 *           descirption: Nombre del autor del tutorial.
 *           example: Juan Gomez
 *         archivos_adjuntos:
 *           type: string
 *           description: Url del endpoint que devuelve la imagen del tutorial. Devuelve nulo en lugar del url si no tiene imagen.
 *           nullable: true
 *           example: https://cocktail-maps-ws.herokuapp.com/tutorials/1/image
 *         etiquetas:
 *           type: Array of objects
 *           description: arreglo de objetos cuyas propiedades son el nombre de una etiqueta y su id. Contiene las etiquetas con las que es relacionado el tutorial.
 *           example: [{"nombre":"Fácil","id":"12"}]
 *     Etiqueta:
 *       type: object
 *       properties:
 *         id:
 *           type: integer
 *           description: Id de la etiqueta.
 *           example: 1
 *         nombre:
 *           type: string
 *           description: Nombre de la etiqueta.
 *           example: Ambiente universitario
 */