# alanrychert-servicio-web


Para probar el servicio web utilizando postman debe importar en postman el archivo "Coleccion servicio web.postman_collection.json"

![image](https://user-images.githubusercontent.com/50160556/120728905-41add200-c4b4-11eb-9f6e-f5354d956ea3.png)

![image](https://user-images.githubusercontent.com/50160556/120728917-4a9ea380-c4b4-11eb-9036-1307a87bd5fb.png)

![image](https://user-images.githubusercontent.com/50160556/120728927-512d1b00-c4b4-11eb-8a55-7d68c687067a.png)

Presionar "import", y listo.

CAMBIOS REALIZADOS LUEGO DE HACER EL MERGE DE PR APROBADO:

-Se agregó CORS y SANITIZE para poder hacer requerimientos al servicio desde otros origenes, y para implementar la validación de los parámetros pasados a los endpoints.

-Se implementó la validación de los parámetros pasados a los endpoints, ahora se retorna un status 403 cuando el parámetro no es del tipo deseado.

-Los endpoint para conseguir las imagenes ahora responden con una imagen, indicando el tipo imagen en el header de la respuesta.

-Se agregaron endpoints: getBarByName, getBarByAddress

-Se implementó paginación: todos los endpoint que devuelven más de un objeto, ahora devuelven a lo sumo 6 (ya que este es el tamaño de página adoptado) e indicando si es la última página válida que se puede solicitar al servicio

-Ahora todos los objetos (bares, tragos y tutoriales) devueltos cuentan con un link a su archivo adjunto si es que este existe, y sino su propiedad archivos_adjuntos es nula.

-Ahora todos los objetos (bares, tragos y tutoriales) devueltos cuentan con su lista de etiquetas asociadas, la cual incluye el nombre y el id de cada una de las etiquetas asociadas.

-Se comenzó a documentar el servicio web con Swagger, pero aún no está terminada la documentación.
