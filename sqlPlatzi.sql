------------------------------------------------------------------
curso sql/mysql
------------------------------------------------------------------
--abrir mysql desde cualquier carpeta: variables de entorno, variables del sistema, path, C:\xampp\mysql\bin;

mysql -u root -p

mysql -u root -h localhost -p

mysql -u root -h localhost -p <C:\xampp\htdocs\phpPildoras\all.sql --para copiar un archivo con comandos sql, en este caso crea una bases de datos llamada pruebaplatzi, por cierto, en mi caso hizo la operacion pero no abrio sql, tuve que ingresar de nuevo, y se ve que creo la bd

mysql -u root -h localhost -p -D otraBD <C:\insertarLibros.sql --si son comandos para registrar o otra cosa para una base de datos ya hecha, agregamos el -D nombre de la bd ya previamente creada, y la ruta del archivo con las operaciones

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
        created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
        update_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    );--TIMESTAMP 'yyyy-mm-dd hh:ss:ss' fecha epoca, va desde los 1970 a la fecha, es un numero entero en segundos usado en computadoras muy eficiente para calculos con CURRENT_TIMESTAMP tomara el valor dela computadora al momento que se registro, y el ON UPDATE del update_at hara que se actualize al momento de que se modifique algun registro de la tabla si es que no mandamos nada. created_at cuando se registro la primera vez el cliente, update_at cada que se modifique dicho registro
    
    --DATETIME es una fecha cualquiera incluso para fechas de siglos pasados por ejemplo, o la fecha de gente nacida antes de los 70, no se guarda en segundos. ENUM valores posibles, en el ejemplo puede ser Masculino, Femenino, no dice.

    --Se recomienda nunca borrar registros o tuplas, crea un campo 'active' y cuando se deba 'borrar' algun registro pasar del activo 1 al desactivo 0

CREATE TABLE IF NOT EXISTS operations(
    operation_id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    book_id INT UNSIGNED,
    client_id INT UNSIGNED,
    op_type ENUM('prestado','devuelto','vendido') NOT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    update_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    finished TINYINT(1) NOT NULL
);--finished indica si las operacion ha terminado, si se vendio ya termino, pero si se presto no, solo cuando es devuelto es que termina, terminado=1 noTerminado=0


INSERT INTO authors (author_id,`name`,nationality) VALUES('','Juan Rulfo','MEX');
INSERT INTO authors (`name`,nationality) VALUES('Gabriel García Márquez','COL');
INSERT INTO authors VALUES('','Juan Gabriel Vasquez','COL');

INSERT INTO authors (`name`,nationality) VALUES ('Julio Cortázar','ARG'),
('Isabel Allende','CHI'),
('Octavio Paz','MEX'),
('Juan Carlos Onetti','URY');

INSERT INTO authors (author_id,`name`) VALUE(16,'Pablo Neruda');--mandamos el ID, como no existia 16 la dejo entrar

INSERT INTO authors (`name`,nationality) VALUES ('Hajime Ysayama','JPN');--como el ultimo ID fue 16, ahora SQL continua desde allí, por tanto Hajime es el autor 17

INSERT INTO`clients`(client_id, `name`, email, birthday, gender, active) VALUES
	(1,'Maria Dolores Gomez','Maria Dolores.95983222J@random.names','1971-06-06','F',1),
	(2,'Adrian Fernandez','Adrian.55818851J@random.names','1970-04-09','M',1),
	(3,'Maria Luisa Marin','Maria Luisa.83726282A@random.names','1957-07-30','F',1),
	(4,'Pedro Sanchez','Pedro.78522059J@random.names','1992-01-31','M',1);


SELECT * FROM authors;

 SELECT * FROM usuarios WHERE id=4 \G \\con este "\G" No nos mostrara los datos en una tabla si no uno justo debajo del otro como si fuera un objeto

 INSERT INTO nombre_tabla VALUES(2, "nombre", "lugar") ON DUPLICATE KEY UPDATE active = "activo";
//lo del ON DUPLICATE KEY UPDATE nos permite actualiar un registro ya hecho usando inserts
reescribira lo demas y hasta cambiara las UNIQUE, btw nunca usar el ON DUPLICATE KEY IGNORE ALL
ya que ignoras los errores y warnings, por ejemplo.

INSERT INTO`clients`(client_id, `name`, email, birthday, gender, active) VALUES (4,'Pedro Sanchez','Pedro.78522059J@random.names','1992-01-31','M',0) ON DUPLICATE KEY UPDATE active =  VALUES(active);--aqui cambia el valor de 1 que habia en active por el 0 de este insert, se lo indicamos con el active =  VALUES(active)

SELECT * FROM clients WHERE client_id = 4\G;


INSERT INTO books (title, author_id, `year`)
VALUES (“Vuelta al Laberinto de la Soledad”,
(SELECT author_id FROM authors
WHERE `name` = “Octavio Paz”
LIMIT 1
), 1960
);--se pueden insertar datos traidos de otros query SELECT

SELECT `name`, email FROM clients;

SELECT `name`, email FROM clients LIMIT 2;

SELECT `name`, email FROM clients WHERE gender= 'M';

SELECT birthday FROM clients;

SELECT YEAR(birthday) FROM clients;


SELECT NOW();//Trae la fecha y hora del dia.

SELECT YEAR(NOW()); //trae el año del dia de hoy;


SELECT `name`, YEAR(NOW()) - YEAR(birthday) FROM clients LIMIT 10;//Traera el nombre y la edad, la primera funcion YEAR con el NOW traen el año del presente menos el año del cumpleaños de un cliente dara igual a su edad.

SELECT * FROM clients WHERE `name` LIKE '%Dolo%';--hay una maria Dolores 

SELECT `name`, email, YEAR(NOW()) - YEAR(birthday) AS edad, gender FROM clients WHERE gender= 'F' AND `name` LIKE '%Luisa%';--AS para apodar columnas de busqueda, LIKE y el comodin % para buscar parecidos, aqui que antes o despues haya lo que sea, pero debe estar Luisa

SELECT COUNT(*) FROM books;

SELECT * FROM authors WHERE author_id >0 AND author_id <=5;

SELECT * FROM books WHERE author_id BETWEEN 1 AND 5;

SELECT book_id, author_id, title FROM books WHERE author_id BETWEEN 1 AND 5;

SELECT b.book_id, a.name, b.title, a.author_id
FROM books AS b INNER JOIN authors AS a ON a.author_id= b.author_id 
WHERE a.author_id BETWEEN 1 and 5;--selecciona el id del libro, nombre de su autor, titulo del libro, id del autor, de la relacion books y authors, de los id de autores que esten entre 1 y 5. INNER JOIN Y JOIN son lo mismo

SELECT c.name, b.title, t.type
FROM transactions AS t 
JOIN books AS b 
ON t.book_id = b.book_id
JOIN clients AS C
ON t.client_id = c.client_id;--todas las transacciones de la relacion los id del libro entre transactions y books, y luego el id del cliente entre transactions y clients

SELECT c.name, b.title, t.type
FROM transactions AS t 
JOIN books AS b 
ON t.book_id = b.book_id
JOIN clients AS C
ON t.client_id = c.client_id
WHERE c.gender= 'F' AND t.type= 'sell';-- nombre de la cliente, titulo del libro y tipo de transaccion de todos los libros vendidos a mujeres

SELECT c.name, b.title, t.type, a.name
FROM transactions AS t 
JOIN books AS b 
ON t.book_id = b.book_id
JOIN clients AS c
ON t.client_id = c.client_id
JOIN authors AS a
ON b.author_id = a.author_id
WHERE c.gender= 'F' AND t.type= 'sell'; -- nombre de la cliente, titulo del libro, tipo de transaccion y nombre del autor del libro de todos los libros vendidos a mujeres

SELECT c.name, b.title, t.type, a.name
FROM transactions AS t 
JOIN books AS b 
ON t.book_id = b.book_id
JOIN clients AS c
ON t.client_id = c.client_id
JOIN authors AS a
ON b.author_id = a.author_id
WHERE c.gender= 'M' AND t.type IN ('sell','lend');
-- nombre del cliente, titulo del libro, tipo de transaccion y nombre del autor del libro de todos los libros vendidos y prestados a hombres


SELECT b.title AS 'Titulo del libro', a.name AS 'Nombre del autor'
FROM books AS b, authors AS a 
WHERE b.author_id =  a.author_id LIMIT 5;--esto es parecio a un JOIN, usando 2 parametros despues del FROM

SELECT b.title AS 'Titulo del libro', a.name AS 'Nombre del autor'
FROM books AS b INNER JOIN authors AS a 
ON b.author_id =  a.author_id LIMIT 5;

SELECT a.author_id, a.name, a.nationality, b.title
FROM authors AS a 
JOIN books AS b 
ON a.author_id =  b.author_id
WHERE author_id BETWEEN 1 AND 5;--author_id valor ambiguo

SELECT a.author_id, a.name, a.nationality, b.title
FROM authors AS a 
JOIN books AS b 
ON a.author_id =  b.author_id
WHERE a.author_id BETWEEN 1 AND 5;--a.author_id valor explicito, requerido por mysql


SELECT a.author_id, a.name, a.nationality, b.title
FROM authors AS a 
JOIN books AS b 
ON a.author_id =  b.author_id
WHERE a.author_id BETWEEN 1 AND 5
ORDER BY a.author_id DESC;--ordena por el numero de id de mayor a menor, tambien se puede por valores alfanumerico

SELECT a.author_id, a.name, a.nationality, b.title
FROM authors AS a 
LEFT JOIN books AS b 
ON a.author_id =  b.author_id
WHERE a.author_id BETWEEN 1 AND 5
ORDER BY a.author_id;--Con el LEFT trae todos los valores de authors, y los de books que esten relacionados y no relacionados, es decir, traera todos los autores, pero en libros habran datos nulos, por que algunos autores no tienen libros en este BD particular

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

SELECT a.author_id, a.name, a.nationality, COUNT(b.book_id)
FROM authors AS a 
LEFT JOIN books AS b 
ON a.author_id =  b.author_id
WHERE a.author_id BETWEEN 1 AND 5
GROUP BY (a.author_id)
ORDER BY a.author_id;--el conteo de libros por autor 




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
 a rusia. Tambien se puede usar este comando NOT IN ('RUS').--tambien se puede buscar solamente IN ('RUS','AUT'), esto es como si fuera nationality=RUS OR natioality= AUT


 SELECT nationality, COUNT(book_id) AS libros, AVG(price) AS promedio_precio, STDDEV(price) AS 
 desviacion_standard FROM books AS b JOIN authors AS a ON a.author_id = b.author_id GROUP BY
 nationality ORDER BY libros DESC;// dame el promedio del precio de los libros y desviacion
 estandar de los mismos, el numero de ellos y agrupamelos por la nacionalidad.


 SELECT nationality, MAX(price), MIN(price) FROM books AS b JOIN authors AS a
 ON a.author_id = b.author_id GROUP BY
 nationality; //el precio mas alto y mas bajo de libros por pais


 SELECT c.name, t.type, b.title, CONCAT( a.name, "(", a.nationality, ")") AS autor FROM 
transactions AS t LEFT JOIN clients AS c ON c.client_id = t.client_id LEFT JOIN books AS b
ON b.book_id = t.book_id LEFT JOIN authors AS a ON a.author_id = b.author_id;// trae el nombre
del cliente, titulo y autor del libro, de las transacciones registradas.--EL CONCAT pondra los datos asi "Juan Rulfo(MEX)"




SELECT TO_DAYS(NOW()); //trae todos los dias transcurridos desde el año 0 gregoriano hasta 
el que especifiquemos , en este caso NOW es el dia actual.


 SELECT c.name, t.type, b.title, CONCAT( a.name, "(", a.nationality, ")") AS autor,
 TO_DAYS(NOW()) - TO_DAYS(t.created_at) AS ago FROM 
transactions AS t LEFT JOIN clients AS c ON c.client_id = t.client_id LEFT JOIN books AS b
ON b.book_id = t.book_id LEFT JOIN authors AS a ON a.author_id = b.author_id;//
lo mismo que la anterior, pero ahora nos trae cuantos dias pasaron desde hoy, hasta el dia
que se registro la transaccion de los libros--LA CUESTION ES, TO_DAYS(NOW) TRAE TODOS LOS DIAS DESDE HOY HASTA EL AÑO 0, Y EL TO_DAYS(t.created_at) TRAE LOS DIAS DESDE LA FECHA QUE SE HIZO LA TRANSACCION HASTA EL AÑO 0, ENTONCES RESTAMOS ESAS 2 CANTIDADES Y DA CUANTOS DIAS HAN PASADO DESDE QUE SE CREO AL TRANSACCION



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

SELECT COUNT(*) FROM books; --es igual a SELECT * COUNT(book_id), SUM(1) FROM books;//aqui el SUM suma 1
por cada registro, es como un for, ah y es recomendable indicar la primary key de una tabla
para usarla con el COUNT y asi sumar los registros en vez de usar el *

SELECT sum(price*copies) FROM books WHERE sellable = 1;

SELECT COUNT(book_id), SUM(IF(b.year < 1950,1,0)) AS 'menor a 1950' FROM books AS b;//aqui
usamos una condicion para si la columna año de la tabla books su valor es menor a 1950, si
es asi entonces le dara un valor de 1 al metodo SUM asi el contara ese registro, de lo
contrario no lo sumara, es decir, el query es traeme el numero de libros que su año
sea antes de 1950.

SELECT COUNT(book_id) FROM books WHERE year < 1950; -- es lo mismo que el query de arriba, btw
	-- con los -- hacemos comentarios por linea
SELECT COUNT(book_id), SUM(IF(b.year < 1950,1,0)) AS 'menor a 1950',
SUM(IF(b.year > 1950,1,0)) AS 'mayor a 1950' FROM books AS b;//la suma de las columnas
de menor y mayor que deberian dar igual que la suma del COUNT.

SELECT COUNT(book_id), SUM(IF(b.year < 1950,1,0)) AS 'menor a 1950',
SUM(IF(b.year >= 1950 AND b.year < 1990,1,0)) AS 'menor a 1990',
SUM(IF(b.year >= 1990 AND b.year < 2000,1,0)) AS 'menor a 2000',
SUM(IF(b.year >= 2000,1,0)) AS 'menor a hoy'
 FROM books AS b;--todos los libros que su año de salida es menora 1950, 1990 , 2000 y 
 hasta hoy.

 SELECT nationality, COUNT(book_id), SUM(IF(b.year < 1950,1,0)) AS 'menor a 1950',
SUM(IF(b.year >= 1950 AND b.year < 1990,1,0)) AS 'menor a 1990',
SUM(IF(b.year >= 1990 AND b.year < 2000,1,0)) AS 'menor a 2000',
SUM(IF(b.year >= 2000,1,0)) AS 'menor a hoy'
 FROM books AS b JOIN authors AS a ON b.author_id = a.author_id WHERE nationality IS NOT NULL
 GROUP BY nationality;-- lo mismo que el anterior query pero dividido/agrupado por paises
 -- ah y que no sean null

 ALTER TABLE authors ADD COLUMN birthyear INT DEFAULT 1930 AFTER `name`; -- agrega una columna nueva llamada birthyear entero, valor por defecto 1930, despues del campo name

ALTER TABLE authors MODIFY COLUMN birthyear YEAR DEFAULT 1920;--modifica el campo birthyear para cambiarlo de INT  a YEAR y tambien su valor por defecto

ALTER TABLE authors DROP COLUMN birthyear;--eliminar campo birthyear

ALTER TABLE userspass CHANGE `users` `user` VARCHAR(20);--cambiar nombre

ALTER TABLE userspass MODIFY COLUMN password VARCHAR(255);--cambiar longitud

 mysqldump--herramienta fuera de sql para crear y importar archivo sql

 mysqldump -u user -p database_name > esquema.sql - guarda el esquema de una base de datos con todo y datos en un
archivo sql.
mysqldump -u user -p -d database_name es parecido al comando anterior solo que aquí no se guardan los datos.

 SHOW DATABASES --mostrar toda las bases datos

 --Es mejor hacer pruebas antes de ejecutar instrucciones que puedan afectar la integridad de nuestra data
Iniciamos una transacción

BEGIN
Ahora supongamos que elimino información de una tabla y se me olvida el WHERE

DELETE FROM authors;
Rayos ya perdí todo, haa pero como estoy dentro de una transacción debo confirmar las operaciones hechas a la base de datos, de lo contrario no se ejecutarán.

Si confirmo, entonces no hay vuelta atras. Se eliminarían todos los datos de dicha tabla

COMMIT
pero si hago un retroceso de dichos cambios. Entonces es como si nunca hubiese pasado nada.

ROLLBACK

ALTER TABLE userspass CHANGE `users` `user` VARCHAR(20);--cambiar nombre

ALTER TABLE userspass MODIFY COLUMN password VARCHAR(255);--cambiar longitud

UPDATE datos_usuarios SET apellido = 'german' WHERE id = 3 LIMIT 1;

UPDATE datos_usuarios SET nombre = 'laura' WHERE id = 3 LIMIT 1;

UPDATE datos_usuarios SET direccion = 'Venezuela' WHERE id = 3 LIMIT 1;

SELECT `nombre artículo`, sección, `país de origen`,precio FROM artículos WHERE sección= 'DEPORTE' LIMIT 0,3;

ALTER TABLE artículos ADD COLUMN foto VARCHAR(50) DEFAULT NULL AFTER precio;

ALTER TABLE artículos CHANGE foto FOTO VARCHAR(50) DEFAULT NULL;

UPDATE artículos SET FOTO= '$nombreImagen' WHERE `NOMBRE ARTÍCULO`= 'Tubos' LIMIT 1;