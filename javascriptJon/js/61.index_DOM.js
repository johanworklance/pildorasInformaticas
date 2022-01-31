import hamburguerMenu from "./DOM/menu_hamburguersa.js";

import { digitalClock,alarm } from "./DOM/reloj.js";

import { moveBall,shortcuts } from "./DOM/teclado.js";

import countdown from "./DOM/cuenta_regresiva.js";

import scrollTopButton from "./DOM/boton_scroll.js";

import darkTheme from "./DOM/tema_oscuro.js";

//hamburguerMenu cuando escribi este metodo vscode me da un atajo para que el escriba directamente la linea de arriba, es como un autocompletar, con los demas como no son funciones por default se usa la deestructuracion, en este caso en objetos 

const d= document;

d.addEventListener('DOMContentLoaded', e=>{
    hamburguerMenu(".panel-btn",".panel",".menu a");//el boton, el aside y los links dentro del anterior

    digitalClock('#reloj','#activar-reloj','#desactivar-reloj');

    alarm('assets/alarma.mp3','#activar-alarma','#desactivar-alarma');

    countdown('countdown','January 24, 2022 19:30:00','Feliz cumpleaños Johan');

    scrollTopButton('.scroll-top-btn');

    darkTheme('.dark-theme-btn','dark-mode');//aqui usaremos punto en el primero por que usaremos queryselector, pero en el segundo parametro no, por que usaremos classlist
});



d.addEventListener('keydown',e=>{
    shortcuts(e);//enviamos el evento que seria un objeto en si

    moveBall(e,'.ball','.stage');
});





