document.addEventListener('DOMContentLoaded', function (){
   iniciarApp();
});

function iniciarApp(){
    const menuHamburguesa=document.querySelector('.menu-hamburguesa');
          menuHamburguesa.addEventListener('click',menuResponsive);
}
 function menuResponsive(){
    const navegacion=document.querySelector('.navegacion');
          navegacion.classList.toggle('mostrar');
 }