//keyup cuando soltamos, keydown cuando presionamos una vez, keypress mientras se mantenga presionado la tecla


const d= document;

export function shortcuts(e){
    console.log(e);//imprimimos el evento
    console.log(e.type);//y el tipo que es un atributo del objeto del evento
    console.log(e.key);//nombre de la tecla
    console.log(e.keyCode);//codigo que le da el navegador
    console.log(e.ctrlKey);//con cualquier otra tecla mostrara false 
    console.log(e.altKey);//con cualquier otra tecla mostrara false
    console.log(e.shiftKey);//como las otras 2 dara true si por ejemplo presiono shift, aunque estas teclas solo aparecen si el evento es keydown, con las demas no funcionan
}