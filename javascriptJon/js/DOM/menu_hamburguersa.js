export default function hamburguerMenu(panelButton,panel,menuLink){

    const d= document;

    d.addEventListener('click', e=>{

        //console.log(e.target);//esto era para comprobar a que le estaba haciendo click
        if(e.target.matches(panelButton) || e.target.matches(`${panelButton} *`)){//matches tambien recibe un selector css, en este caso seria todo los elementos hijos dentro del panel-btn
            d.querySelector(panel).classList.toggle('isActive');
            d.querySelector(panelButton).classList.toggle('is-active');//este is-active es una clase del proyecto hamburguers con el activamos la animacion que acompaña deacuerdo a cual escogimos en su pagina
        }

        if(e.target.matches(menuLink)){//si se da click a los links de las secciones
            d.querySelector(panel).classList.remove('isActive');//que elimine las clases que hace aparecer el menu
            d.querySelector(panelButton).classList.remove('is-active');//y vuelva a verse como una hamburguesa este boton
        }
    })
}