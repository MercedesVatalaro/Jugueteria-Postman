# TP_Especial_Parte_2
Introducción
La API REST permite a los clientes acceder gran parte de los recursos. Esta API tiene predicción de URL, orientada a recursos y utiliza códigos de respuesta HTTP para indicar errores de API. Utiliza funciones HTTP integradas, como la autenticación HTTP y los HTTP verbs, que son entendidos por los clientes HTTP disponibles en el mercado. Todas las respuestas de la API son devueltas en JSON, incluidos los errores.

Endpoints
La URL base para la API:

http://localhost/TP_Especial_Parte2/api

GET:
/products/

Devuelve una colección entera de recursos/productos.

GET:
/products/:ID/

Devuelve un producto determinado por su ID.

Por ejemplo:
http://localhost/TP_Especial_Parte2/api/products/18
{
“id”: 18,
“nombre”: “Hamaca”,
“descripcion”: “Hamaca tabla reforzada”,
“precio”: “11000”,
“id_categoria”: 10,
“ofertas”: “Especial navidad”
}

GET:
/products/:ID/:COLS

Devuelve un producto determinado por su ID y un campo específico.

Por ejemplo:
http://localhost/TP_Especial_Parte2/api/products/82/nombre,id

{
“nombre”: “pelota”,
“id”: 82
}

POST:
/products

Agrega un producto a la colección dando una respuesta de creación exitosa.

Por ejemplo:
“El producto se creo con el Id= 85”

PUT:
/products/:ID

Permite actualizar o editar un producto especificado por su ID de la colección, dando una respuesta exitosa.

Por ejemplo:

“El producto se actualizo correctamente”

DELETE:
/products/:ID

Permite eliminar un producto especificado por su ID de la colección, informando la operación exitosa.

Por ejemplo:
“El producto con el id=85 fue borrado”.

HTTP responses
La REST API usa códigos de respuesta HTTP convencionales para indicar el éxito o el fracaso de una solicitud de API. En general, los códigos en el rango 2xx indican éxito, los códigos en el rango 4xx indican un error que ha fallado dada la información proporcionada (por ejemplo, se omitió un parámetro requerido, etc.) y los códigos en el rango 5xx indican un error del servidor.

En los codigos de respuesta encontrara por ejemplo:
200 => “OK”
201=> “Created”
400=> “Bad Request”
403=> “Forbidden”
404 => “Not found”
500 => “Internal Server Error”

Ordenamiento y filtro
GET:
/products?sort=

Permite seleccionar el o los campos por los cuales se va a ordenar la colección.

GET:
/products?order=desc/asc
Permite seleccionar el modo de ordenamiento, de forma ascendente o descendente.

Por ejemplo:
http://localhost/TP_Especial_Parte2/api/products?order=desc&sort=id
Devolvera una colección ordenada por id en forma descendente.

/products?column=
Permite seleccionar uno o más campos de la tabla de los cuales se va a recibir la información.

Por ejemplo /products?column=nombre,precio
Devolvera solo el nombre y precio de los productos de la colección.

/products?offer=
Hace referencia a las entidades de la colección que se encuentran en oferta especial, determinada como condición en el modelo de datos.

Por ejemplo:
http://localhost/TP_Especial_Parte2/api/products?offer=nombre,id,ofertas
Hace referencia al nombre e id de los productos que tienen esa oferta.

{
“nombre”: “Superman”,
“id”: 17,
“ofertas”: “Especial navidad”
},
{
“nombre”: “Hamaca”,
“id”: 18,
“ofertas”: “Especial navidad”
},
{
“nombre”: “Disfraz Superman”,
“id”: 29,
“ofertas”: “Especial navidad”
},
{
“nombre”: “Bicicleta”,
“id”: 31,
“ofertas”: “Especial navidad”
}
]