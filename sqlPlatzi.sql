------------------------------------------------------------------
curso sql/mysql
------------------------------------------------------------------
--abrir mysql desde cualquier carpeta: variables de entorno, variables del sistema, path, C:\xampp\mysql\bin;

mysql -u root -p

mysql -u root -h localhost -p

SHOW DATABASES;

USE prueba;

SHOW TABLES;

SELECT DATABASE();--metodo para saber cual BD estas usando

--Las tablas de transaccion son MyISAM(tablas que crecen rapido, los prestamos de una biblioteca), las de catalogo son InnoDB(que crecen lento, como una lista de empleados).

CREATE DATABASE platzi_operation;

CREATE DATABASE IF NOT EXITS platzi_operation;--si no existe la BD la crea, si no solo manda un warning

SHOW warnings;//el show tambien sirve para mostrar los warnings.

Buena practica es, usar sustantivos en plural para las tablas y a poder ser en ingles.
books, users, etc.

CREATE TABLE IF NOT EXISTS books (
    book_id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT, 
    author_id INT UNSIGNED, 
    title VARCHAR(100) NOT NULL, 
    `year` INT UNSIGNED NOT NULL DEFAULT 1900, 
    language VARCHAR(2) NOT NULL DEFAULT 'es' COMMENT 'ISO 639-1 Language code (2 chars)', 
    cover_url VARCHAR(500),
    precio DOUBLE(6,2) NOT NULL DEFAULT 10.0, 
    sellable TINYINT(1) DEFAULT 1,
    copies INT NOT NULL DEFAULT 1,
    description TEXT
    );--UNSIGNED ES QUE NO TENGA NEGATIVOS Y COMMENT ES PARA COMENTAR, ESO DE ISO ES LA NORMA PARA LOS LENGUAJES ESPAÑOL SERIA 'ES'

    CREATE TABLE authors(
        author_id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
        name VARCHAR(100) NOT NULL,
        nationality VARCHAR(3)

    );

    DROP TABLE authors;

Toda tabla necesita su id, y asi identificar rapidamente una tupla/row/fila.

DESC authors; describe la estructuta de una tabla, a diferencia del SHOW CREATE TABLE authors;,
este no muestra la consulta con la que se creo, muestra una tabla con la estructura.

 `language` varchar(2) NOT NULL COMMENT 'ISO 639-1 Language code (2 chars)',// em la definicion
 de una tabla puedes asociar un comentario a una de sus columnas.

 SHOW FULL COLUMNS FROM books; //con este puedes ver mas metadatos de las columnas de una tabla
 y asi poder ver el comentario del campo language.

 `year` int(11) NOT NULL DEFAULT '1900',//year es una palabra reservada de sql, para evitar
 conflictos, se recomienda encerrar los nombres de columna en ``(comillas de identificacion), 
 no confundir con las '', estas son para cadenas, es decir, 'año' cadena, `year`nombre de una
 columna que usa una palabra reservada, asi sql no la confundira.


    CREATE TABLE IF NOT EXISTS clients(
        client_id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
        `name` VARCHAR(50) NOT NULL,
        email VARCHAR(100) NOT NULL UNIQUE,
        birthday DATETIME,
        gender ENUM('M','F','ND') NOT NULL,
        active TINYINT(1) NOT NULL DEFAULT 1,
        created_at TIMESTAMP,


    );--TIMESTAMP 'yyyy-mm-dd hh:ss:ss' fecha epoca, va desde los 1970 a la fecha, es un numero entero en segundos usado en computadoras muy eficiente para calculos, DATETIME es una fecha cualquiera incluso para fechas de siglos pasados por ejemplo, o la fecha de gente nacida antes de los 70, no se guarda en segundos. ENUM valores posibles, en el ejemplo puede ser Masculino, Femenino, no dice.

    --Se recomienda nunca borrar registros o tuplas, crea un campo 'active' y cuando se deba 'borrar' algun registro pasar del activo 1 al desactivo 0




 SELECT * FROM usuarios WHERE id=4 \G \\con este "\G" No nos mostrara los datos en una tabla
 si no uno justo debajo del otro como si fuera un objeto

 INSERT INTO nombre_tabla VALUES(2, "nombre", "lugar") ON DUPLICATE KEY UPDATE active = "activo";
//lo del ON DUPLICATE KEY UPDATE nos permite actualiar un registro ya hecho usando inserts
reescribira lo demas y hasta cambiara las UNIQUE, btw nunca usar el ON DUPLICATE KEY IGNORE ALL
ya que ignoras los errores y warnings, por ejemplo.

INSERT INTO books (title, autor_id, year)
VALUES (“Vuelta al Laberinto de la Soledad”,
(SELECT autor_id FROM authors
WHERE name = “Octavio Paz”
LIMIT 1
), 1960
)//se pueden insertar datos traidos de otros query SELECT

SELECT NOW();//Trae la fecha y hora del dia.
SELECT YEAR(NOW()); //trae el año del dia de hoy;

SELECT name, YEAR(NOW()) - YEAR(cumpleaños) FROM clients LIMIT 10;//Traera el nombre y la 
edad,la primera funcion YEAR con la NOW traen el año del presente menos el año 
 del cumpleaños de un cliente igual a su edad.

 SELECT c.name, b.title, a.name, t.type
FROM transactions AS t
JOIN books AS b
On t.book_id = b.book_id
JOIN clients AS c
On t.client_id = c.client_id
JOIN authors AS a
ON b.author_id = a.author_id
WHERE c.gender = “M”
AND t.type IN (“sell”, “lend”);//el IN es para decir que posibles valores puede tener el type
que tu quieras


SELECT a.author_id, a.name, a.nationality, COUNT (b.book_id) FROM authors AS a
LEFT JOIN books AS b ON a.author_id = b.author_id WHERE a.author_id BETWEEN 1 AND 5
 GROUP BY a.author_id ORDER BY a.author_id;//aqui si entendi el GROUP BY, siempre se usa junto
 al metodo COUNT, la idea es que por ejemplo si el autor tiene 3 libros, no muestre autor libro1,
 autor libro2, autor libro3, si no que mas bien los agrupe autor libro1 libro2 libro3.


 1. que nacionalidades hay?

 SELECT DISTINCT nationality FROM authors WHERE nationality IS NOT NULL;// el DISTINCT es
 como un GROUP BY pero sin hace uso del COUNT, es para filtrar directamente lo que se mostrara.
 Aunque yo filtre los NULL, es valido que hayan autores sin nacionalidad, que tengan NULL.

 2. cuantos escritores hay de cada nacionalidades

 SELECT nationality, COUNT(author_id) AS num_autores FROM authors 
 GROUP BY nationality ORDER BY num_autores DESC, nationality;//aqui los ordena primero por numero
 de autores monstrandolos de mayor a menor, y despues si hay por ejemplo 3 paises con 2 
 autores, estos los ordenara alfabeticamente y de forma ascedente que es por defecto ya que no
 le especifique.

SELECT nationality, COUNT(author_id) AS num_autores FROM authors WHERE nationality IS NOT NULL
AND nationality <> 'RUS'
 GROUP BY nationality ORDER BY num_autores DESC, nationality;//que no traiga el null, y tampoco
 a rusia. Tambien se puede usar este comando NOT IN ('RUS').

 SELECT nationality, COUNT (book_id) AS libros, AVG(prices) AS promedio_precio, STDDEV(price) AS 
 desviacion_standard FROM books AS b JOIN authors AS a ON a.author_id = b.author_id GROUP BY
 nationality ORDER BY libros DESC;// dame el promedio del precio de los libros y desviacion
 estandar de los mismos, el numero de ellos y agrupamelos por la nacionalidad.

 SELECT nationality, MAX(price), MIN(price) FROM books AS b JOIN authors AS a
 ON a.author_id = b.author_id GROUP BY
 nationality; //el precio mas alto y mas bajo de libros por pais


 SELECT c.name, t.type, b.title, CONCAT( a.name, "(", a.nationality), ")") AS autor FROM 
transactions AS t LEFT JOIN clients AS c ON c.client_id = t.client_id LEFT JOIN books AS b
ON b.book_id = t.book_id LEFT JOIN authors AS a ON a.author_id = b.author_id;// trae el nombre
del cliente, titulo y autor del libro, de las transacciones registradas.

SELECT TO_DAYS(NOW()); //trae todos los dias transcurridos desde el año 0 gregoriano hasta 
el que especifiquemos , en este caso NOW es el dia actual.


 SELECT c.name, t.type, b.title, CONCAT( a.name, "(", a.nationality), ")") AS autor,
 TO_DAYS(NOW) - TO_DAYS(t.created_at) AS ago FROM 
transactions AS t LEFT JOIN clients AS c ON c.client_id = t.client_id LEFT JOIN books AS b
ON b.book_id = t.book_id LEFT JOIN authors AS a ON a.author_id = b.author_id;//
lo mismo que la anterior, pero ahora nos trae cuantos dias pasaron desde hoy, hasta el dia
que se registro la transaccion de los libros

SELECT * FROM authors ORDER BY RAND() LIMIT 10; // con RAND nos ordenara de manera aleatoria
los autores que traera.

DELETE FROM authors WHERE author_id = 161 LIMIT 1; //es buena practica limitar la eliminacion
a uno, no se que hallan valores repetidos.

SELECT client_id, name FROM clients WHERE client_id IN (3,5,7);//nos traera los clientes 
con los ids de los valores en los parentesis del IN es como una lista.

UPDATE clients SET active = 0 WHERE client_id = 181 LIMIT 1;// actualiza el valor active
del usuario 181. Btw siempre colocar el WHERE en las sentencias UPDATE y DELETE.

SELECT sum(price) FROM books WHERE sellable = 1;//suma todos los precios de los libros con 
valor true en sellable.

SELECT COUNT(*) FROM books; = SELECT * COUNT(book_id), SUM(1) FROM books;//aqui el SUM suma 1
por cada registro, es como un for, ah y es recomendable indicar la primary key de una tabla
para usarla con el COUNT y asi sumar los registros en vez de usar el *

SELECT sum(price*copies) FROM books WHERE sellable = 1;

SELECT COUNT (book_id), SUM(IF(b.year < 1950,1,0)) AS 'menor a 1950' FROM books AS b;//aqui
usamos una condicion para si la columna año de la tabla books su valor es menor a 1950, si
es asi entonces le dara un valor de 1 al metodo SUM asi el contara ese registro, de lo
contrario no lo sumara, es decir, el query es traeme el numero de libros que su año
sea antes de 1950.

SELECT COUNT(book_id) FROM books WHERE year < 1950; -- es lo mismo que el query de arriba, btw
	-- con los -- hacemos comentarios por linea
SELECT COUNT (book_id), SUM(IF(b.year < 1950,1,0)) AS 'menor a 1950',
SUM(IF(b.year > 1950,1,0)) AS 'mayor a 1950' FROM books AS b;//la suma de las columnas
de menor y mayor que deberian dar igual que la suma del COUNT.

SELECT COUNT (book_id), SUM(IF(b.year < 1950,1,0)) AS 'menor a 1950',
SUM(IF(b.year >= 1950 AND b.year < 1990,1,0)) AS 'menor a 1990',
SUM(IF(b.year >= 1990 AND b.year < 2000,1,0)) AS 'menor a 2000',
SUM(IF(b.year >= 2000,1,0)) AS 'menor a hoy'
 FROM books AS b;--todos los libros que su año de salida es menora 1950, 1990 , 2000 y 
 hasta hoy.

 SELECT nationality, COUNT (book_id), SUM(IF(b.year < 1950,1,0)) AS 'menor a 1950',
SUM(IF(b.year >= 1950 AND b.year < 1990,1,0)) AS 'menor a 1990',
SUM(IF(b.year >= 1990 AND b.year < 2000,1,0)) AS 'menor a 2000',
SUM(IF(b.year >= 2000,1,0)) AS 'menor a hoy'
 FROM books AS b JOIN authors AS a ON b.author_id = a.author_id WHERE nationality IS NOT NULL
 GROUP BY nationality;-- lo mismo que el anterior query pero dividido/agrupado por paises
 -- ah y que no sean null

 mysqldump--herramienta fuera de sql para crear y importar archivo sql

 SHOW DATABASES --mostrar toda las bases datos