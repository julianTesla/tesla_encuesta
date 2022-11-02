//Apenas comienza la pagina
jQuery(document).ready(function($){

    document.getElementById("descripcion1").style.visibility="visible";
    document.getElementById("descripcion1").style.position="relative";
    document.getElementById("descripcion2").style.visibility="visible";
    document.getElementById("descripcion2").style.position="relative";
   
    
    document.getElementById("texto").style.visibility="hidden";
    document.getElementById("texto").style.position="absolute";
    document.getElementById("opcion3").style.visibility="hidden";
    document.getElementById("opcion3").style.position="absolute";
    document.getElementById("opcion4").style.visibility="hidden";
    document.getElementById("opcion4").style.position="absolute";
    document.getElementById("opcion5").style.visibility="hidden";
    document.getElementById("opcion5").style.position="absolute";
    

});

function mostrar_checkbox(){

    document.getElementById("checkbox").style.visibility="visible";
    document.getElementById("checkbox").style.position="relative";
    document.getElementById("texto").style.visibility="hidden";
    document.getElementById("texto").style.position="absolute";

}
function mostrar_texto(){
document.getElementById("checkbox").style.visibility="hidden";
document.getElementById("checkbox").style.position="absolute";
document.getElementById("texto").style.visibility="visible";
document.getElementById("texto").style.position="relative";

    

}

function agregar_opcion3(){

    document.getElementById("opcion3").style.visibility="visible";
    document.getElementById("opcion3").style.position="relative";
    document.getElementById("boton3").style.visibility="hidden";
    document.getElementById("boton3").style.position="absolute";
}

function agregar_opcion4(){

document.getElementById("opcion4").style.visibility="visible";
document.getElementById("opcion4").style.position="relative";
document.getElementById("boton4").style.visibility="hidden";
document.getElementById("boton4").style.position="absolute";
}

function agregar_opcion5(){

document.getElementById("opcion5").style.visibility="visible";
document.getElementById("opcion5").style.position="relative";
document.getElementById("boton5").style.visibility="hidden";
document.getElementById("boton5").style.position="absolute";
}