  
      //Obtener la fecha actual
      function obtenerFechaActual() { 
         var fechaActual = new Date(); 
         var opciones = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' }; 
         var fechaLarga = fechaActual.toLocaleDateString('es-ES', opciones); 
         return fechaLarga;
      }
      //Formateando la fecha actual
      window.onload = function() { 
        var fechaHoy = obtenerFechaActual(); 
        let fecha1=document.getElementById('fechita');
        fecha1.innerHTML ='San Francisco de Campeche, Campeche,'+' '+ fechaHoy;
        fecha1.style.color='white';
        fecha1.style.textAlign='center';
       // fecha1.style.padding='5px';
        //fecha1.style.textTransform='uppercase';

        let socialM=document.getElementsByClassName('social-media');
          for (var i = 0; i < socialM.length; i++) { 
          socialM[i].style.backgroundColor='lightgrey';
          socialM[i].style.borderRadius='25px';
          socialM[i].style.padding = '10px'; // Añadir relleno 
          socialM[i].style.justifyContent='center';
          }
 

      }
   
