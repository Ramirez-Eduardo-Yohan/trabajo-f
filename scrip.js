window.addEventListener("load", function(){

    const bottonIcono =document.querySelector(".icono i");

    const navegacion =document.querySelector(".nav");
    const pie =document.querySelector("footer");
    //console.log(bottonIcono);
    //muesto la navegacion
    bottonIcono.addEventListener("click", function(){
        bottonIcono.classList.toggle("ver");
        navegacion.classList.remove("ver");
        //navegacion.classList.toggle("ver");
        
        pie.style.width="80vw";
    });

    const salir=document.querySelector(".salir");
    salir.addEventListener("click", function(){
        bottonIcono.classList.toggle("ver");
        navegacion.classList.add("ver");
        //navegacion.style.display="none";
        pie.style.width="100vw";

    });
});