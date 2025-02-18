   //Validación de usuario
      // Obtener el modal 
      var modal = document.getElementById("sesionUsuario"); // Obtener el botón que abre el modal 
    //  var btn = document.getElementById("miModal"); // Obtener el <span> que cierra el modal 
      var m_error=document.getElementById("msg");
      var mensaje1=document.querySelectorAll(".msm1");
     // var span = document.getElementById("close")[0]; // Cuando el usuario hace clic en el botón, abre el modal 
   /*   btn.onclick = function() {
        modal.style.display = "block"; 

      } // Cuando el usuario hace clic en <span> (x), cierra el modal 
      /*span.onclick = function() {
         modal.style.display = "none"; 
        } */// Cuando el usuario hace clic en cualquier lugar fuera del modal, lo cierra 
      window.onclick = function(event) { 
        if (event.target == modal) { 
            modal.style.display = "none"; 
        } 
      } // Manejo del formulario de inicio de sesión 
      document.getElementById("loginForm").onsubmit = function(event) { 
        event.preventDefault(); 
        var username = document.getElementById("usuario").value; 
        var password = document.getElementById("clave").value; // Enviar datos al servidor usando fetch 
        
        var tiempoEspera = 5000; // Mostrar mensaje de error después del tiempo especificado 
        fetch('./../sesion/procesar_login.php', { 
            method: 'POST', 
            headers: { 'Content-Type': 'application/json' }, 
            body: JSON.stringify({ username: username, password: password }) 
        }) .then(response => response.json()) .then(data => { 
                if (data.success) { 
                    //alert('Inicio de sesión exitoso'); 
                    window.location.href="./../Administrador/adminPrincipal.php";
                } 
                else { 
                   // alert('Usuario o contraseña incorrectos'); 
                   m_error.innerHTML="Usuario o contraseña incorrectos *INTENTALO DE NUEVO*";
                   m_error.textAlign="center";
                   m_error.style.display="block";
                   m_error.style.background="white";
                   m_error.style.color="red";
                   m_error.style.borderRadius="10px";
                   
                   //m_error.color="red";
                     // Oculta el mensaje después de 3 segundos
                     setTimeout(() => {
                        m_error.style.display = "none";
                        }, tiempoEspera);
                //modal.style.display = "none"; // Cierra el modal después del envío 
                  }
                }) .catch(error => console.error('Error:', error)); 
        }