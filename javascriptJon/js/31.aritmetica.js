function sumar(a,b){
    return a+b;
}

function restar(a,b){
    return a-b;
}

export function dividir(a,b){
    return a/b;
}

export const aritmetica= {
    sumar,
    restar,
    multiplicar(a,b){
        return a*b;
    }

}

const correr= ()=> 'correr';

export default correr;//solo asi se pueden exportar variables o funciones expresadas, es por lo de los hoisting