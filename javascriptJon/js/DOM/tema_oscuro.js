const d= document;

export default function darkTheme(boton,classDark){//usaremos un data-attribute para los elementos que cambiaremos de color


    const $themeBtn= d.querySelector(boton),

        $selectors= d.querySelectorAll("[data-dark]");

        console.log($selectors)

}