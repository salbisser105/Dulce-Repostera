Acá presentaremos las reglas de programacion con las cuales nos guiaremos en este proyecto, aca especificaremos las reglas para los controladores, vistas, rutas, modelos, etc.
Todos los integrantes del equipo sosnovka debemos seguir estos requisitos.
## Modelos
### Estructura
```php
<?php

    namespace App;

    use Illuminate\Database\Eloquent\Model;

    class ModelName extends Model {

        // Atributos <atributos del modelo>
        protected $fillable = [...];

        // getters y setters del modelo
    }
?>
```
### Reglas
1.Los modelos deben ubicarse en la ruta App.

2.Todos los atributos deben tener sus funciones get y set.

3.Para evitar repetición de código se recomienda realizar la validación de datos ingresados por el usuario en el modelo de la siguiente manera:

```php
<?php

    namespace App;

    use Illuminate\Database\Eloquent\Model;
    use Iluminate\Http\Request;

    class ModelName extends Model {

        // Atributos <atributos del modelo>
        protected $fillable = ["model", "year"];

        public static function validate(Request $request) {
            $request->validate([
                "model" => "required",
                "year" => "required|numeric|gt:0"
            ]);
        }

        // getters y setters del modelo
    }
?>
```
5.Para acceder a los atributos de un modelo SIEMPRE se debe hacer utilizando encapsulamiento, es decir se debe hacer uso de los getters y setters. NUNCA se debe acceder directamente al atributo de un modelo. Es decir, para acceder al nombre de un usuario se debe hacer de la siguiente forma:

```php
echo "Esto SI se debe hacer " . User->model();
```
Pero NUNCA de esta manera:
```php
echo "Esto NO se debe hacer " . User["model"];
```
## Controladores
### Estructura
```php
<?php

    namespace App\Http\Controllers;

    class NameController extends Controller {
        // Funciones del controlador
    }
?>
```
### Reglas
1. Los controladores deben ubicarse en la ruta App/Http/Controllers.
2. NUNCA haga un echo en un controlador.
3. Si va a realizar las validaciones en el controlador asegúrese de que esto no implicará tener código repetido en un futuro. Se recomienda realizarlas en los modelos para evitar esto.
## Vistas
### Estructura
```php
@extends('layouts.master')

@section('content')
    // Código HTML
@endsection
```
### Reglas
1. Las vistas deben ubicarse en la ruta resources/views.
2. Cada vista debe ubicarse al interior de un directorio que ayude a determinar a que controlador está asociado.
3. Todas las vistas deben extender del layout master.
4. Todas las vistas deben ser Blade.
5. NUNCA utilice código php al interior de las vistas.
6. El nombramiento de las vistas debe seguir la estructura nombreViews.blade.php

## Texto en las vistas
### Reglas
1. Todos los textos del proyecto deben ir en resources/lang/*

2. Inicialmente se  utilizara el idioma de ingles, dependiendo de los tiempos implementaremos el español los textos de cada uno debe ir en resources/lang/en y resources/lang/es respectivamente. La ultima ruta se utilizara dado el caso que logremos implementarlo en español

3. Para acceder a los textos desde las vistas se utilizará la siguiente estructura:
```php
@lang('messages.welcome');
```
Donde en resources/lang/es/messages.php se encuentra la siguiente estructura:
```php
<?php
    return [
        'welcome' => 'Bienvenido',
        // ... Textos
    ];
?>
```
NOTA: Si es necesario se pueden crear diferentes archivos para contener los textos de cada vista.
Documentos de estilo)
Reglas
1. El estilo de las vistas se realizará por medio de archivos .css.
2. Los archivos .csv deben ubicarse en public/css
## Rutas
### Estructura
```php
Route::get('/index', 'Controller@index')->name("controller.index");
```
### Reglas
1. Las rutas deben ubicarse en el archivo routes/web.php
2. Toda ruta debe estar asociada a un controlador.
3. A cada ruta se le debe asociar un nombre por el que podrá ser accedida.
4. Está prohibido establecer funciones al interior de una ruta. Estas deben ser manejadas por el controlador.

## Generacion automatica de datos
### Reglas
1. Para la creación de tablas en la base de datos se deberá utilizar Migrations para la generación automática de estas.
2. Cada migration deberá ubicarse en database/migrations
3. El nombre de cada migration deberá hacer referencia a la fecha de creación de la tabla y debe seguir la estructura 2020_02_21_000000_table_to_be_created.php
4. Se exportarán los datos de ejemplo que se ingresen a las tablas en un archivo .sql que se almacenara en el directorio raíz del proyecto con el fin de que todos los desarrolladores cuenten con la misma información en la base de datos.
5. El nombre del .sql generado debe especificar a que tabla de la base de datos pertenece.
### Instrucciones
Para crear la tabla ejecute el siguiente comando: 
Para crear la tabla ejecute el comando
```php
$ php artisan migrate
```
NOTA: Antes asegúrese de configurar el archivo .env con los datos respectivos que se manejaran en las bases de datos del grupo. 

Una vez creada la tabla se ingresarán manualmente datos de ejemplo, para esto hay varias alternativas:
Utilizando phpMyAdmin

i. Ingrese a http://localhost/phpmyadmin/.

ii. Seleccione la base de datos dulcereposteradb.

iii.Ingrese a la tabla que acaba de crear y presione el botón Insertar en la parte superior de la pantalla.

iv. Ingrese todos los datos y guarde los cambios.

Para exportar los datos presione el botón Exportar, seleccione formato SQL e ingrese el nombre que desea para el archivo.

Para importar los datos seleccione la tabla en la que los quiere almacenar, presione el botón Importar y seleccione el archivo .sql correspondiente a la tabla.
Utilizando MySQL localmente:
Conectese a la base de datos ejecutando el siguiente comando reemplazando username por un usuario con acceso a mysql e ingrese la contraseña.
```php
$ mysql -u <username> -p
```
Seleccione la base de datos dulcereposteradb.

```php
mysql> USE dulcereposteradb 
```
Inserte los datos utilizando una query INSERT.

Para exportar los datos ejecute el comando en la terminal (por fuera de mysql)

```php
$ mysqldump -u <username> -p dulcereposteradb <tableName> > tableName.sql
```
Para importar los datos ingrese a mysql y ejecute los siguientes comandos:
```php
mysql> USE dulcereposteradb
mysql> IMPORT TABLE FROM <tableName.sql>
```
Desde la aplicación
Ingrese los datos manualmente desde la aplicación, por ejemplo, si desea almacenar productos de ejemplo ingrese a la página de creación de productos y creelos.

Para importar y exportar siga las instrucciones de una de la dos opciones anteriores.

Para terminar recuerde, se debe trabajar en todo momento desde una branch personal. subir los cambios a su branch y seran revisados en una reunion con el arquitecto para ya hacer el merge respectivo, asi podremos llevar un mejor control de lo que estaremos subiendo y esto nos garantizara un mejor orden en nuestro proyecto.
