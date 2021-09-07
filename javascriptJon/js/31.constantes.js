export const PI= Math.PI;//para exportar usamos import

export let usuario= 'Johan';

export let dia= 'miercoles';//este se exporta pero no lo uso en donde lo importe

let password= '123';//como esta variable no tienen el export, no podran ser usadas en el archivo que importa, asi establecemos que se exporta y que no

//export default password; cuando se usa default, los export de variables o de funciones expresadas, es decir las que se guardan en una variable, se debe hacer justo despues de la declaracion de la variable, de otra manera marca error

export default function saludar(){//solamente se puede usar una export default por archivo, una funcion declarada como esta si que puede llevar el default de una vez, las clases tambien
    console.log('hola modulos +ES6')
}

export class Perro{
    constructor(){
        console.log("guau guau!")
    }
}