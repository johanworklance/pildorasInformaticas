const d= document;

export function digitalClock(clock,botonPlay,botonStop){

    let clockTempo;

    d.addEventListener('click',e=>{


        if(e.target.matches(botonPlay)){


            clockTempo= setInterval(()=>{

                let clockHour= new Date().toLocaleTimeString();//aqui devuelve la hora es un formato digital

                d.querySelector(clock).innerHTML= `<h3>${clockHour}</h3>`;

            },1000);//cada segundo imprimira la hora cuando le demos al boton play

            e.target.disabled= true;//cuando se clickee una vez el boton, lo deshabilitamos, para que no se pueda dar play varias veces
        }

        if(e.target.matches(botonStop)){
            
            clearInterval(clockTempo);//quitamos el setinterval del play

            d.querySelector(clock).innerHTML= null;//borramos todo en el div clock

            d.querySelector(botonPlay).disabled= false;//habilitamos de nuevo el boton play

        }
    })




    
}

export function alarm(sound,botonPlay,botonStop){

    let alarmaTempo;

    const $alarm= d.createElement('audio');//crearemos un elemento audio html, para poder hacer uso de su API, recordar que como sera un elemento html, se le antepone un $
    $alarm.src= sound;//esta es la ruta, en el html, seria el atributo src

    d.addEventListener('click',e=>{


        if(e.target.matches(botonPlay)){

            alarmaTempo= setTimeout(()=>{

                $alarm.play();//este metodo vendria a ser uno de los controles del reproductor, en atributo html se encuentran como controls
            },2000);//en 2 segundos empezara a sonar la alarma

            e.target.disabled= true;
            
        }

        if(e.target.matches(botonStop)){
            
            clearTimeout(alarmaTempo);//detenemos el settime
            
            $alarm.pause();//no existe un metodo stop para los sonidos, entonces pausamos 

            $alarm.currentTime=0;//y establecemos a cero su reproducion, de otra manera al darle a play sigue en donde se quedo cuando se pauso

            d.querySelector(botonPlay).disabled= false;
            
        }
    })
}