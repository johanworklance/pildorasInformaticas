import saludar, {Perro, PI,usuario}from "./31.constantes.js";//para importar, este formato, en el objeto las variables que queremos usar, las que son por default, se colocan antes del objeto

import run, {dividir as divide,aritmetica}from "./31.aritmetica.js";//se pueden dar alias a los variables importadas, lo intente con la default pero me marco error, para darle alias a una default, se puede directamente cambiar el nombre aqui, y como es la exportacion por defecto de ese archivo, se entiende que como es uno solo, poder cambiarle el nombre al llegar aqui


console.log('archivo modulo js');

console.log(PI,usuario);

console.log(aritmetica.sumar(1,2));//3

console.log(aritmetica.restar(4,1));//3

console.log(aritmetica.multiplicar(4,1));//4

console.log(divide(4,1));//4

saludar();//visual studio code cuando detecta que se esta usando algo importado de forma default, automaticamente lo escribe en el import del archivo, es decir, el saludar en el import no lo escribi yo, lo escribio vs code justo despues de que la invoque aqui

let lulina= new Perro();//con Perro paso lo mismo, esta automatizada la importacion

console.log(run());//funcion expresada exportada por defecto desde 31.aritmetica.js