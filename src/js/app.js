document.addEventListener('DOMContentLoaded', function (){
   iniciarApp();
   darkmode();
});

function darkmode(){
   const prefiereModeDark=window.matchMedia('(prefers-color-scheme: dark)');//si tiene activado modo oscuro en el sistema operativo 
          if(prefiereModeDark.matches){
            document.body.classList.add('dark-mode');
          }else{
            document.body.classList.remove('dark-mode');
         }
   prefiereModeDark.addEventListener('change',function(){// cambia automaticamente sgun sistema operativo sin actualizar pagina
         if(prefiereModeDark.matches){
            document.body.classList.add('dark-mode');
          }else{
            document.body.classList.remove('dark-mode');
         }
   })
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
