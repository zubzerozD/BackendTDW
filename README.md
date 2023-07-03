# BackendTDW 
Integrante: Sebastian Alexis Canales Ortiz// Ingeneria civil informatica

## Descripcion del proyecto
- un modelo llamado “Interaccion” donde ud guardará el id del “perro Interesado”, el id del “perro
candidato” y la preferencia seleccionada (aceptado o rechazado)
- un modelo llamado “Perro” donde guardará la información basica del perro (id, nombre, url de foto,
descripcion)
- las migraciones de ambos modelos.
- un crud para el modelo Perro.
- request que validen la información ingresada. (Perro e Interaccion)
- una api donde se guardarán las preferencias de cada perro.
- una api donde; con el id del perro interesado, ver los perros que ha aceptado y rechazado.

## Requisitos
- Laravel
- Composer
- php
- mysql

## Instalacion
- Clonar el repositorio
- Ejecutar el comando `composer install`
- Ejecutar el comando `php artisan migrate`
- Ejecutar el comando `php artisan serve`
- Ejecutar el comando `php artisan db:seed`

## Rutas

### para crear un perro con Post
- http://127.0.0.1:8000/api/perro/create
- ejemplo de body JSON
```
{
    "name": "perro1",
    "url": "www.google.com/search?q=foto+de+perro"
    "description":"perro1Descripcion"
}
```

### para ver todos los perros con Get
- http://127.0.0.1:8000/api/perro/getall
- sin body

### para ver un perro con Get
- http://127.0.0.1:8000/api/perro/getone
- ejemplo de body JSON
```
{
    "id": 1
}
```

### para actualizar un perro con Put
- http://127.0.0.1:8000/api/perro/update
- ejemplo de body JSON
```
{
    "id": 1,
    "name": "perro1Update",
    "url": "www.google.com/search?q=foto+de+perroUpdate"
    "description":"perro1updateDes"
}
```

### para eliminar un perro con Delete
- http://127.0.0.1:8000/api/perro/delete
- ejemplo de body JSON
```
{
    "id": 1
}
```

### para crear una interaccion con Post
- http://127.0.0.1:8000/api/interaccion/create
- ejemplo de body JSON
```
{
    "id_perro_interesado": 1,
    "id_perro_candidato": 2,
    "preferencia": "aceptado"
}
```

### para ver todas las interacciones con Get
- http://127.0.0.1:8000/api/interaccion/getall
- sin body

### para eliminar una interaccion con Delete
- http://127.0.0.1:8000/api/interaccion/delete
- ejemplo de body JSON
```
{
    "id": 1
}
```

### para actualizar una interaccion con Put
- http://127.0.0.1:8000/api/interaccion/update
- ejemplo de body JSON
```
{
    "id": 1,
    "id_perro_interesado": 1,
    "id_perro_candidato": 2,
    "preferencia": "rechazado"
}
```




