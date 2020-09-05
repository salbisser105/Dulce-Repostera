En el siguiente documento presentaremos las reglas de estilo que debemos seguir los desarrolladores del equipo sosnovka para este proyecto.

### -Archivos PHP


Todos los archivos con extensión .php deben comenzar con el tag <?php y NUNCA se debe combinar diferentes lenguajes de programación en un solo archivo (por ejemplo, en un documento .html no debe haber código PHP.


### -Variables


El nombre de las variables debe ser claro, se deberan utilizar mayusculas y minusculas. Además cada variable debe comenzar con una letra minúscula, al final debe cerrar la variable con ';'

$numPosts = 5;


### -Nombramiento


Las funciones, variables, clases, etc tendran que ser nombradas en inglés y estas deben permitirnos identificar cual es la función de cada elemento.


### -Utilizacion de operadores


Cuando se realicen procesos que requieran utilizar operadores se debe dejar un espacio entre los numeros o variables y el operador. A continuacion, encontraran unos ejemplos: 
```
$num1 = 20;

$num2 = 10;

$sum = $num1 + num2;

$bool = ($num1 >= $num2) && ($sum < 100);
```


### -Constantes


Cuando se desee declarar una constante, tendra que nombrarse en mayuscula sostenida como se mostrara en el siguiente ejemplo:
```php
const CONSTANT = valorPrueba
```

### -Ciclos


Aca estara la estructura basica que deben seguir los ciclos utilizados:

#### Ciclos while

```php
while (condición) {

    // código a realizar
    
}
```
Por ejemplo, para hacer un ciclo que cuente el número de carros hasta llegar a 20:

```php
$numCars = 0;

while ($numCars < 20) {

    $numPeople++;
    
    echo "Actualmente hay $numPeople personas";
    
}
```


#### Ciclos do-while
```php
do {

    // código a realizar
    
}
while (condición);
```

Ejemplo:

```php
$counter = 0;

do {

    echo "Valor del contador do while:  $counter";
    
    ++$counter;
    
}

while ($counter <= 10);
```


#### Ciclos For

Los ciclos for deben seguir la siguiente estructura, donde después de la palabra reservada for se deja un espacio, al igual que después de cada punto y coma y después de cerrar el paréntesis:
```php
for (inicialización; condición; incremento) {

    // código a realizar
    
}
```
Por ejemplo, para hacer un ciclo que imprima los números del 0 al 9:
```php
for ($i = 0; i < 10; i++) {

    echo $i;
    
}
```

#### Ciclos for each
```php
foreach (arreglo as valor) {

    // código a realizar
    
}
```
Ejemplo:
```php
$array = array(1, 2, 3, 4, 5);

foreach ($array as $value) {

    echo $value;
    
}
```

### -Condicionales

La estructura básica de un condicional es:
```php
if (condición) {

    // código a realizar
    
}
```
En caso de existir varios condicionales alternativos:
```php
if (condición) {


}

elseif (condición) {

    // código a realizar
    
}
else {

    // código a realizar
    
}
```

### -Clases


El nombre de las clases debe comenzar con una mayúscula y debe utilizar camel case, siguiendo la estructura:
```php
class ClassName {

    // contenido
    
}
```

### -Funciones


Las funciones deben ser nombradas utilizando camel case y NO deben comenzar con letra mayúscula.
```php
function functionName() {

    // código a realizar
    
}
```
Un ejemplo de una función que reciba como argumentos 2 números y los sume:
```php
function sum($num1, $num2) {

    $sum = $num1 + $num2;
    
    return $sum;
    
}
```
