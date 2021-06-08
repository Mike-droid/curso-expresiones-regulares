# Curso de expresiones regulares

## Introducción a las expresiones regulares

### Bienvenida al curso

> Las expresiones regulares no son necesariamente sencillas, pero son sumamente potentes. Es una inversión que todo buen desarrollador debe de hacer. Es esa navaja suiza que siempre debe estar en las mochilas de los desarrolladores.

### ¿Qué son las expresiones regulares?

Las ER son muy sencillas de crear. Es ir creando patrones en donde las cadenas de caracteres vayan entrano o no entrando. Son para ir "atacando" una línea o un input. Es sencillo siempre y cuando sea una cadena de caracteres.

[Guía Fácil y Completa de Expresiones Regulares desde Cero](https://www.youtube.com/watch?v=wfogZfIS03U)

Las expresiones regulares nos ayudan a ahorrar mucho procesamiento de CPU y uso de memoria. Una de las grandes ventajas de las ER es que están atadas a casi cualquier lenguaje.

### Aplicaciones de las expresiones regulares

Las ER, en pocas palabras, sirven para **buscar**.

Un ejemplo de su uso es en los *logs de servidores*.

Otro ejemplo, es para validar los emails, números de teléfono, etc en formularios.

También son muy usadas en Web Scraping.

[Learn, Build and Test Regular Expressions](https://regexr.com/)

[Regex 101](https://regexr.com/)

### Introducción al lenguaje de expresiones regulares

Las expresiones regulares intentan solucionar problemas del día a día. Se intenta buscar la forma en que ciertos datos son presentados. Por ejemplo un número de teléfono, dependiendo de país y zona, tiene determinada cantidad de números; a veces separados con guiones o puntos, pero la estructura siempre es la misma.

Otro ejemplo de uso de expresiones regulares sería intentar cambiar en un csv los precios de modo europeo a modo americano.

También se pueden usar expresiones regulares no sólo para encontrar coincidencias en los datos, sino para excluir datos que no nos sirven.

## El lenguaje: caracteres, operadores, y construcciones

### El caracter (.)

El punto "." denota "Cualquier carácter". ¡Cuidado, esto incluye los espacios!

### Las clases predefinidas y construidas

Las expresiones regulares son escencialmente las mismas en los distintos lenguajes de programación. Aunque pueden haber algunas diferencias.

- `\d ->` Encuentra todos los dígitos
- `[0-9]` Es más potente para buscar dígitos (podemos específicar entre qué números buscar)
- `\w ->` "All word characters", de la aA a la zZ y el guión bajo
- `\s ->` Encuentra todos los espacios

Hagamos algo más complejo y poderoso: `[a-zA-Z0-9_\.]` -> Encuentra letras en mayúsculas y minúsculas, además, números y también el caracter punto. De la 'a' a la 'z', en mayúsculas y minúsculas.

Expresión regular para encontrar valores hexadecimales: `#[a-fA-F0-9]{3,6}` -> Empieza con '#', tiene letras de la a a la f en mayúsculas y minúsculas, del 0 al 9 y entre 3 y 6 dígitos.

### Los delimitadores: +,*,?

[Página web para ver el flujo lógico de expresiones regulares](https://www.debuggex.com/)

- `*` -> greddy o todo
- `.*` -> Encuentra absolutamente TODOS los caracteres
- `+` -> uno o más
- `?` -> cero o uno
- `\d+[a-z]` -> encuentra uno o más dígitos que al final tengan una letra de palabra
- `\d*[a-z]` -> puede haber sí o no digitos anteriormente
- `\d*[a-z]?` -> puede haber sí o no digitos y después puede haber 0 o 1 letra

### Los contadores {1,4}

Podemos especificar cuántas veces aparece un caracter.

- `\d{min,max}` -> donde 'min' es el número mínimo de ocurrencias y 'max' es el número máximo de ocurriencias.
- `\d{2,2}[\-\.\ ]?` -> Encuentra dígitos, que pueden o no estar separados por 0 o 1 espacio, guión o punto, de longitud 2 cada uno de ellos.

### El caso de (?) como delimitador

- `.+?,` -> Encuentra todo caracter 1 o más veces, antes de la coma, separados por cada coma.
- `.+?[,\n]{1,1}` -> Con esto ya tenemos cada valor en un archivo CSV

### Not (^), su uso y sus peligros

- `\D` -> Encuentra todo lo que no sea un dígito
- `\S` -> Encuentra todo lo que no sea un espacio
- `\W` -> Encuentra todo lo que no sea una palabra
- `^` -> Sirve para negar **SOLAMENTE** dentro los corchetes. Por ejemplo: `[^0-5a-c]` significa que tomará del 6 al 9 y de la 'd' a la 'z'

#### Otros caracteres

- `\t` — Representa un tabulador.
- `\r` — Representa el “retorno de carro” o “regreso al inicio” o sea el lugar en que la línea vuelve a iniciar.
- `\n` — Representa la “nueva línea” el carácter por medio del cual una línea da inicio. Es necesario recordar que en Windows es necesaria una combinación de `\r\n` para comenzar una nueva línea, mientras que en Unix solamente se usa `\n` y en Mac_OS clásico se usa solamente `\r`.
- `\a` — Representa una “campana” o “beep” que se produce al imprimir este carácter.
- `\e` — Representa la tecla “Esc” o “Escape”
- `\f` — Representa un salto de página
- `\v` — Representa un tabulador vertical
- `\x` — Se utiliza para representar caracteres ASCII o ANSI si conoce su código. De esta forma, si se busca el símbolo de derechos de autor y la fuente en la que se busca utiliza el conjunto de caracteres Latin-1 es posible encontrarlo utilizando “\xA9”.
- `\u` — Se utiliza para representar caracteres Unicode si se conoce su código. “\u00A2” representa el símbolo de centavos. No todos los motores de Expresiones Regulares soportan Unicode. El .Net Framework lo hace, pero el EditPad Pro no, por ejemplo.
- `\d` — Representa un dígito del 0 al 9.
- `\w` — Representa cualquier carácter alfanumérico.
- `\s` — Representa un espacio en blanco.
- `\D` — Representa cualquier carácter que no sea un dígito del 0 al 9.
- `\W` — Representa cualquier carácter no alfanumérico.
- `\S` — Representa cualquier carácter que no sea un espacio en blanco.
- `\A` — Representa el inicio de la cadena. No un carácter sino una posición.
- `\Z` — Representa el final de la cadena. No un carácter sino una posición.
- `\b` — Marca la posición de una palabra limitada por espacios en blanco, puntuación o el inicio/final de una cadena.
- `\B` — Marca la posición entre dos caracteres alfanuméricos o dos no-alfanuméricos.

### Reto: Filtrando letras en números telefónicos utilizando negaciones

Mi solución: `[0-9]+[\-?\.?\,?\#?\ ?]?[\W^\f]`

Propuesta de Diego Forero: `(\d{2,2}\W?){3}`

Otra propuesta: `(\d{1,}[^\w]?){6}`

Otra propuesta: `\d\d[^\w]?\d\d[^\w]?\d\d` (Y agregar tantas veces como sea necesario)

### Principio (^) y final de linea ($)

Estos dos caracteres indican en qué posición de la línea debe hacerse la búsqueda:

- el `^` se utiliza para indicar el principio de línea
- el `$` se utiliza para indicar final de línea

`^(\w+,){2,10}\w+$` También sirve para archivos CSV => Empieza con caracter alfanumérico que aparece 1 o más veces y después tiene una coma, de longitud 2 hasta 10, que termina con caracter alfanumérico que aparace 1 o más veces.

[CheatSheet de expresiones regulares](http://w3.unpocodetodo.info/utiles/regex.php)

## Uso práctico de expresiones regulares

### Logs

Las expresiones regulares son bastante usadas en logs. Por ejemplo:

- [LOG ENTRY] [ERROR] The system is beign hacked
- [LOG ENTRY] [WARN] The system may be down
- [LOG ENTRY] [LOG] Everything is OK

Podemos usar: `^\[LOG.*\[LOG\].*$` para encontrar todos los logs, o `^\[LOG.*\[WARN\].*$` para encontrar todos los warnings o también `^\[LOG.*\[ERROR\].*$` para encontrar todos los errores.

Otro ejemplo:

- [LOG ENTRY] [LOG] [user:@beco] Logged in
- [LOG ENTRY] [LOG] [user:@beco] Clicked here
- [LOG ENTRY] [LOG] [user:@mike] Rated the app
- [LOG ENTRY] [LOG] [user:@beco] Logged out
- [LOG ENTRY] [LOG] [user:@celismx] Logged out

`^\[LOG.*\[LOG\].*user:@\w+?\] .*$` -> Podemos encontrar a cualquier log que tenga cualquier usuario, podemos poder un usuario específico con `user:@beco\]`.

[Página de logs para practicar](https://pastebin.com/ptDsJ6tR)

Reto: Buscar cosas en común en los logs y encontrarlas con expresiones regulares.

### Teléfonos

`^\+?\d+[#pe]?\d*$` -> "Quiero una línea que empiece con símbolo de más o sin símbolo de más, seguida por uno o más dígitos y este a su vez puede seguir por cuales quiera de los caracteres que estén dentro de la clase (los '[]'), estos caracteres pueden o no existir, a continuación, puede o puede no haber dígitos.

### URLs

`https?:\/\/[\w\-\.]+\.\w{2,5}\/?\S*` => Ya podemos traer enlaces de internet. Empieza con http, puede o no tener la 's', tiene '://' y después palabras, guiones  o puntos 1 o más veces, luego palabras entre 2 y 5 dígitos de longitud, puede o no seguir con una '/', y terminar con algo que no sea un espacio.

### Mails

- mails: `[\w\._]{5,30}\+?[\w]{0,10}@[\w\.\-]{3,}\.\w{2,5}`
- usuarios: `[\w\._]{5,30}\+?[\w]{0,10}@` -> Tenemos una clase que me permita: Cualquier caracter que sea palabra, que tenga entre 5 y 30 caracteres, posteriormente tener un símbolo de '+' (opcional) y que esta sea compuesta entre 0 y 10, el '@' es obligatorio

[TLD - top level domain](https://es.wikipedia.org/wiki/Dominio_de_nivel_superior)

### Localizaciones

- -99.205646,19.429707,2275.10
- -99.205581, 19.429652,2275.10
- -99.204654,19.428952,2275.58

- Coordenadas 1: `\-?\d{1,3}\.\d{1,6},\s?\-?\d{1,3}\.\d{1,6}.*$`

- -99 12' 34.08"W, 19 34' 56.98"N
-34 54' 32.00"E, -3 21' 67.00"S

- Coordenadas 2: `^\-?\d{1,3}\s\d{1,2}'\s\d{1,2}\.\d{2,2}"[WE],\s?\-?\d{1,3}\s\d{1,2}'\s\d{1,2}\.\d{2,2}"[NS]$`

### Reto: Nombre(s)

Crear una expresión regular para saber si algo es un nombre.

Solución: `^([A-Ú][a-ú]+\s?){1,5}$`
