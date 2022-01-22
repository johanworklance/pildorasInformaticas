import hamburguerMenu from "./DOM/menu_hamburguersa.js";

import { digitalClock,alarm } from "./DOM/reloj.js";

import { moveBall,shortcuts } from "./DOM/teclado.js";

//hamburguerMenu cuando escribi este metodo vscode me da un atajo para que el escriba directamente la linea de arriba, es como un autocompletar, con los demas como no son funciones por default se usa la deestructuracion, en este caso en objetos 

const d= document;

d.addEventListener('DOMContentLoaded', e=>{
    hamburguerMenu(".panel-btn",".panel",".menu a");//el boton, el aside y los links dentro del anterior
})

digitalClock('#reloj','#activar-reloj','#desactivar-reloj');

alarm('assets/alarma.mp3','#activar-alarma','#desactivar-alarma');

d.addEventListener('keydown',e=>{
    shortcuts(e);//enviamos el evento que seria un objeto en si

    moveBall(e,'.ball','.stage');
})





