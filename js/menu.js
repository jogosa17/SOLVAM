var idioma = "es"

function openNav() {
    document.getElementById("myMenu").style.width = "250px";
    document.body.style.backgroundColor = "rgba(0,0,0,0)";
    document.body.style.marginRight = "250px";
}
  
function closeNav() {
    document.getElementById("myMenu").style.width = "0";
    document.body.style.backgroundColor = "white";
    document.body.style.marginRight = "0";
}

function changeLenguaje(idioma){
if("es" == idioma){
    document.querySelectorAll('.es').forEach(elem => elem.style.display = 'block');
    document.querySelectorAll('.en').forEach(elem => elem.style.display = 'none');
    document.querySelectorAll('.fr').forEach(elem => elem.style.display = 'none');
}
if("en" == idioma){ 
    document.querySelectorAll('.en').forEach(elem => elem.style.display = 'block');
    document.querySelectorAll('.es').forEach(elem => elem.style.display = 'none');
    document.querySelectorAll('.fr').forEach(elem => elem.style.display = 'none');
    
}
if("fr" == idioma){
    document.querySelectorAll('.fr').forEach(elem => elem.style.display = 'block');
    document.querySelectorAll('.en').forEach(elem => elem.style.display = 'none');
    document.querySelectorAll('.es').forEach(elem => elem.style.display = 'none');

}

}