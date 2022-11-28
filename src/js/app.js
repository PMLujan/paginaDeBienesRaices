document.addEventListener('DOMContentLoaded', function (){
   iniciarApp();
   darkmode();
});

function darkmode(){
   const darkBoton= document.querySelector('.dark-mode-boton');
         darkBoton.addEventListener('click', function(){
         document.body.classList.toggle('dark-mode');
         });
}

function iniciarApp(){
    const menuHamburguesa=document.querySelector('.menu-hamburguesa');
          menuHamburguesa.addEventListener('click',menuResponsive);
}
 function menuResponsive(){
    const navegacion=document.querySelector('.navegacion');
          navegacion.classList.toggle('mostrar');
 }
