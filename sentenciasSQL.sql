mysql -u root -p --logear, recordar guardar la ruta de mysql en el path

cls --limpiar pantalla en cmd

CREATE DATABASE prueba;

SHOW DATABASES;

DROP DATABASE prueba;--eliminar BD

USE usuarios;--escoge la BD que usaremos

CREATE TABLE datos_usuarios(nombre VARCHAR(30), clave VARCHAR(10));

DROP TABLE datos_usuarios;

DESCRIBE datos_usuarios;

CREATE TABLE datos_personales(NIF VARCHAR(10), nombre VARCHAR(15), apellido VARCHAR(20), edad INT(3));

ALTER TABLE datos_personales DROP edad;--eliminar el campo de un tabla

ALTER TABLE datos_personales ADD COLUMN edad INT(2);--agregar un nuevo campo

INSERT INTO datos_personales (NIF, nombre, apellido, edad) VALUES("515554W", "María", "Gomez", 29);
INSERT INTO datos_personales (NIF, nombre, apellido, edad) VALUES("515344W", "Jose", "Hernandez", 28);

SELECT nombre, apellido FROM datos_personales;

SELECT * FROM datos_personales;

SELECT * FROM `artículos` WHERE `PAÍS DE ORIGEN` = 'ESPAÑA';--si los campos tienen acentos o espacios en blanco usar los `` 

CREATE TABLE productos3 (seccion VARCHAR(10), nombre_articulo VARCHAR(20), fecha VARCHAR(10),`País de origen` VARCHAR(9),precio VARCHAR(11));

INSERT INTO productos3 VALUES("deporte","raqueta","22-10-2546", "colombia", "200"),
                             ("juguete","muñeco","23-10-2546", "venezuela", "250");

SELECT * FROM `artículos` WHERE `NOMBRE ARTÍCULO`LIKE '%CABALLERO';--%cualquier cadena
SELECT * FROM `artículos` WHERE `NOMBRE ARTÍCULO`LIKE 'BALON%';

SELECT * FROM `artículos` WHERE `NOMBRE ARTÍCULO` LIKE 'ceni_ero';-- el uso de '_' sirve para omitir ese caracter, podria encontrar con esta sentencia 'cenicero' o 'cenizero'

--estos caracteres comodin % _ se deben usar junto al comando LIKE

INSERT INTO `artículos`(`SECCIÓN`, `NOMBRE ARTÍCULO`, `PAÍS DE ORIGEN`) VALUES ('deporte','camisa Nike','Colombia');--podemos especificamente que campos registrar, y que los demas queden nulos, no importa el orden, si no especificamos y solo ponemos los values si que va en orden

INSERT INTO `artículos` VALUES ('deporte','camisa Nike','21-02-2002','Colombia','2000');

INSERT INTO `artículos`(`SECCIÓN`, `NOMBRE ARTÍCULO`, `FECHA`, `PAÍS DE ORIGEN`, `PRECIO`) VALUES ('pokemones', 'pikacha','21/02/2012','japon','corazon');

DELETE FROM `artículos` WHERE `nombre artículo` = 'balon prisionero';--no importa si el campo o nombre de la bd está en mayuscula o minuscula, pero los acentos si se respetan y si tiene espacios usar los ``

UPDATE `artículos`SET `nombre artículo`= 'El martillo' WHERE `nombre artículo`= 'Martillo';

UPDATE `artículos`SET `precio`= '30,33' WHERE `nombre artículo`= 'Llave Inglesa';

UPDATE `artículos`SET `nombre artículo`= 'Traje Caballero',`precio`= '350',`país de origen`='España' WHERE `nombre artículo`= 'Tarje Caballero';--separamos con ,los valores del registro a cambiar

--IMPORTANTE "cenicero' OR 1='1" SI COLOCO LO QUE ESTA ENTRE COMILLAS EN EL INPUT DEL ARCHIVO formularioBusquedad.php, REALIZARA UNA INYECCIÓN SQL, y buscara todos los registros con está técnica de hacking, por que la consulta quedaria como SELECT * FROM artículos WHERE `NOMBRE ARTÍCULO` = 'cenicero' OR 1='1'

CREATE TABLE usersPass (id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, users VARCHAR (20) NOT NULL,password VARCHAR (20) NOT NULL);


