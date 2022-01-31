const d = document,
    w= window;




export default function scrollTopButton(boton){

    const $scrollBtn= d.querySelector(boton);

    

    w.addEventListener('scroll',(e)=>{

        let scrollTop= w.pageYOffset || d.documentElement.scrollTop;//por si el navegador usado no tiene la propiedad indicada del window osea pageYOffset, para que pille entonces la del html

        console.log(w.pageYOffset,d.documentElement.scrollTop);//ambas propiedades de window o la del document, dan el valor en pixeles de cuanto scroll desde el top se ha hecho, por cierto documentElement es la etiqueta html

        if(scrollTop>600){
            $scrollBtn.classList.remove('hidden');
        }else{
            $scrollBtn.classList.add('hidden');
        }

    });


    d.addEventListener('click',(e)=>{


        if(e.target.matches(boton)){//recordar que el target del evento pilla lo que clickeemos, con el if solo hacemos que se ejecute este codigo si es el boton
            w.scrollTo({
                behavior:"smooth",//esta propiedad tambien esta en css, hace que el scroll se mueva mas elegante
                top: 0
                //left: 0, si hubiera una barra de desplazamiento horizontal
            });//este metodo recibe un objeto al que indicamos el comportamiento/behavior, y a donde ira el scroll en este caso al principio
        }
    });
}