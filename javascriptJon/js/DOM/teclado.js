//keyup cuando soltamos, keydown cuando presionamos una vez, keypress mientras se mantenga presionado la tecla


const d= document;

let x=0, y=0;//deacuerdo a si damos up, bottom, left o right, entonces estas variables valdran +1 o -1

export function moveBall(e,ball,stage){

    const $ball= d.querySelector(ball),//seleccionamos la esfera

    $stage= d.querySelector(stage);//y el escenario


    const limitsBall= $ball.getBoundingClientRect(),
    limitsStage= $stage.getBoundingClientRect();//El método Element.getBoundingClientRect() devuelve el tamaño de un elemento y su posición relativa respecto a la ventana de visualización (viewport).

    console.log(limitsBall);//codigo de la tecla
    console.log(limitsStage)//nombre 

    

        
    

    switch (e.keyCode) {
        case 37://left

            e.preventDefault();//para prevenir que se mueva el scroll

            if(limitsBall.left>limitsStage.left)//la explicacion es: la posicion en left del stage es digamos 50, y la esfera esta a 250, a medida que se mueva el left de la esfera sera menor, y cuando ya sea 49, entonces la esfera no ira  mas a la izquierda del stage
            x--;
            break;
        case 38://up
            
            if(limitsBall.top>limitsStage.top){
                e.preventDefault();//en los arriba y abajo, ponemos el preventdefault, para que cuando la esfera este en los extremos, ya el keydown de las flechitas haga su comportamiento por defecto, es decir como ya no entra aqui, ya podra mover la barra de desplazamiento, tambien puedo ponerlos en los right y left
                y--;
            }
            
            break;
        case 39://right
            
            e.preventDefault();
            if(limitsBall.right<limitsStage.right)
            x++;
         break;
        case 40://down
            
            if(limitsBall.bottom<limitsStage.bottom){
                e.preventDefault();
                y++;
            }
            
            break;
    
        default:
            break;
            
    }

    $ball.style.transform= `translate(${x*10}px,${y*10}px)`;//modificamos el css de la esfera para que se mueva de a 10 pixeles

    
}

export function shortcuts(e){
    /* console.log(e);//imprimimos el evento
    console.log(e.type);//y el tipo que es un atributo del objeto del evento
    console.log(e.key);//nombre de la tecla
    console.log(e.keyCode);//codigo que le da el navegador
    console.log(`control: `,e.ctrlKey);//con cualquier otra tecla mostrara false 
    console.log(`alt: `,e.altKey);//con cualquier otra tecla mostrara false
    console.log(`shift: `,e.shiftKey);//como las otras 2 dara true si por ejemplo presiono shift, aunque estas teclas solo aparecen si el evento es keydown, con las demas no funcionan */

    if(e.key==='a' && e.altKey){//atajo de presionar a y alt a la vez
        alert(`has lanzado una alerta con el teclado`);
        
    }

    if(e.key==='c' && e.altKey){//atajo de presionar c y alt a la vez
        confirm(`has lanzado un confirm con el teclado`);
        
    }

    if(e.key==='p' && e.altKey){//atajo de presionar p y alt a la vez
        prompt(`has lanzado un prompt con el teclado`);
        
    }
}