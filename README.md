# Dulce-Repostera
Proyecto.

Antes de correr el proyecto modifique en el '.env' la información para conectar a la base de datos que creó.

Para correr el proyecto realice el siguiente comando en la ruta del proyecto Dulce-Repostera\dulcerepostera:

```php
$ php artisan migrate
```

Luego de realizar el migrate se deben insertar a la base de datos los datos que creamos. En el archivo inserts que aparece en la carpeta Entrega 1 se encuentran todos los inserts que se deben realizar.

Luego correr el comando:

```php
$ php artisan serve
```

Apenas se genere el link, entrar a ese y ya se puede navegar por todas las funcionalidades del proyecto.

Si se desea correr las pruebas unitarias se debe correr el siguiente comando en la misma ruta del proyecto que indica al principio de este documento:

```php
$ vendor/bin/phpunit --filter WelcomeTest
```