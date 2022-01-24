const d= document;

export default function countdown(id,limitDate,finalMessage){


    const $countdown= d.getElementById(id);

    const countdownDate= new Date(limitDate).getTime();//esa fecha en milisegundos




    let countdownTempo= setInterval(()=>{

        let now= new Date().getTime();//la fecha actual

        let limitTime= countdownDate-now;//cuanto falta entre mi cumple y la hora actual, siendo que estamos en 2022


        let days= Math.floor(limitTime/(1000 *60 *60 *24)), //(1000milisegunos,60segunso,60minutos,24horas)el tiempo restante entre hoy y mi cumple en milisegundos entre los milisegundos en un dia, cuando hice esto di mas o menos 169 dias, pero estos son los dias, hay un resto de segundos que conformarian las horas que faltan, y al parecer segun el profe corresponderian al residuo de la operacion de abajo

        hours= ("0"+ Math.floor(limitTime%(1000 *60 *60 *24) / (1000*60*60))).slice(-2),//aqui seria el resto del calculo de arriba, digamos que dan 30 dias ,7 horas, entonces aqui el resto es 7horas en milisegundos entre los milisegundos de una hora, dando las 7 horas cerradas, y lo del slice es para que cuando tenga mas de 2 cifras digamos 10 entonces no quede como 010, poniendo en -2 el cursor desde donde empieza a eliminar estaria en el 1 hacia adelante, eliminando al cero, recordar que como el 0 se concatena con la operacion, entonces se convierte en un string y asi poder usar ese metodo(convierte el tiempo limite en dias y el resto transformalo a horas)

        minutes= ("0"+ Math.floor(limitTime%(1000 *60 *60) / (1000*60))).slice(-2),
        //aqui seria el tiempo limite entre los milisegundos de una hora, esto debido a que ahora seria el tiempo total en horas, el resto de eso serian los minutos faltantes, de ahi que dividamos al final por los milisegundos de estos. es decir el resto de los dias son las horas, como en las 2 operaciones de arriba, y el resto del tiempo total en horas serian los minutos, en otras palabras el resto de dividir los milisegundos del tiempo restante con los de una hora, son los milisegundos que convertiriamos a minutos dividiendolos por 1000*60(convierte el tiempo limite en horas y el resto transformalo a minutos)

        seconds= ("0"+ Math.floor(limitTime%(1000 *60) / (1000))).slice(-2);//entonces finalmente entendi que para los minutos, seria el resto de los milisegundos que quedan de dividir el tiempo limite por los milisegundos de una hora, eso dividido entre los milisegundos de un minuto, y para los segundos seria lo mismo pero seria el resto de la division por minutos, para terminar dividiendo entre 1000 que es el factor de conversion a 1 segundo(convierte el tiempo limite en minutos y el resto transformalo a segundos)

        $countdown.innerHTML= `<h3> Faltan: ${days} días ${hours} horas ${minutes} minutos ${seconds} segundos</h3>`;

        console.log(countdownDate,now,limitTime);

        if(limitTime<0){//si la fecha ya hubiera pasado entonces este seria ahora un valor negativo, asi que la cuenta regresiva terminaria, es mas lo deje con una fecha anterior para ver este mensaje
            clearInterval(countdownTempo);
            $countdown.innerHTML= `<h3>${finalMessage}</h3>`;
        }
    }
    ,1000);

    

    
}


