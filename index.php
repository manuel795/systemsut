<!DOCTYPE html>
<html lang="es-MX">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenid@ SUTGESE</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/luces-animacion.css">
    <link rel="stylesheet" href="css/plantillaG.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>
<body>
<header>
<div class="encabezado">
    <div class="titulog">
        <div class="logito">
            <!-- <img src="imagenes/logo1.jpg" alt="Logo"> -->
        </div>
        <div class="titulo1">
            <h2>Sindicato Único de Trabajadores del Gobierno del Estado al Servicio de la Educación</h2>
        </div>
    </div>
    <div id="fechita">
        <!-- Aquí puedes agregar la fecha dinámica si lo deseas -->
    </div>
    <div class="enlaces">
        <nav class="navbar" aria-label="Navegación principal">
            <!-- Botón para móvil -->
            <button class="navbar__toggle" aria-expanded="false" aria-controls="navbar-menu" aria-label="Abrir menú">
                <span class="navbar__hamburger"></span>
            </button>
            
            <!-- Lista de navegación -->
            <ul class="navbar__menu" id="navbar-menu" role="menubar">
                <li class="navbar__item" role="none">
                    <a href="page/quienesSomos.php" class="navbar__link" 
                       role="menuitem" 
                       aria-current="<?= ($paginaActual === 'quienesSomos') ? 'page' : 'false' ?>">
                        Quiénes Somos
                    </a>
                </li>
                <li class="navbar__item" role="none">
                    <a href="page/directorio.php" class="navbar__link" 
                       role="menuitem"
                       aria-current="<?= ($paginaActual === 'directorio') ? 'page' : 'false' ?>">
                        Directorio
                    </a>
                </li>
                <li class="navbar__item" role="none">
                    <a href="page/descargas.php" class="navbar__link" 
                       role="menuitem"
                       aria-current="<?= ($paginaActual === 'descargas') ? 'page' : 'false' ?>">
                        Descargas
                    </a>
                </li>
                <li class="navbar__item" role="none">
                    <a href="page/galeria.php" class="navbar__link" 
                       role="menuitem"
                       aria-current="<?= ($paginaActual === 'galeria') ? 'page' : 'false' ?>">
                        Galería
                    </a>
                </li>
                <li class="navbar__item" role="none">
                    <a href="page/contacto.php" class="navbar__link" 
                       role="menuitem"
                       aria-current="<?= ($paginaActual === 'contacto') ? 'page' : 'false' ?>">
                        Contacto
                    </a>
                </li>
                <li class="navbar__item" role="none">
                    <a href="#sesion-usuario" 
                       class="navbar__link navbar__link--modal" 
                       role="menuitem"
                       data-bs-toggle="modal" 
                       data-bs-target="#sesionUsuario"
                       aria-haspopup="dialog">
                        Iniciar Sesión
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>
    </header>
    <div class="container">   
            <div class="titulo2">
                <div class="mensaje">
                        <h1>B  i  e  n  v  e  n  i  d  @</h1>
                 </div> 
            </div>
            <div class="mensaje2">
                <div class="card">
                    <p><strong>Estimado compañero: S.U.T.G.E.S.E.</strong>Te da la cordial bienvenida al portal del Sindicato Único de Trabajadores del Gobierno
                        del Estado al Servicio de la Educación (S.U.T.G.E.S.E.).
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas iusto sequi quos dolores magni facere illo, architecto 
                        exercitationem.
                         Aut ex ipsa distinctio commodi minus quos aliquid laboriosam corrupti recusandae fugiat?
                         Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi mollitia magnam minima esse non, obcaecati, consectetur iusto officiis 
                         ipsum eum reprehenderit dolores aut eligendi delectus, nemo veritatis tempora aperiam unde?
                    </p>
                </div>
            </div>
            <div class="imagen">
                    <img src="imagenes/logo2.jpg" alt="Logo de sutgese" class="img-max">
             </div>
             <div class="mensaje3">
                <div class="card">
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veniam, quae quia maxime consequatur quidem aliquid magnam perferendis, 
                        repellat id velit voluptatibus voluptates tempora ex et unde? Mollitia odit quos eum?
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit asperiores culpa, recusandae odit perspiciatis iure sapiente id
                        illo eius rem sunt quae minima, sequi velit repellat? Cum dolorum voluptate nobis?
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore, totam, ut quam architecto pariatur eveniet error sunt dolorem nisi optio cumque corrupti,
                        fuga dolores quia quo ab. Facilis, quod aspernatur?
                    </p>
                </div>
            </div>
              <div >
                    
              </div>



            <div>
                <div >
                    
                </div>
            </div>
       
                <!--Animación personalizada de fondo-->
                <div class="hero__title"></div>
                <div class="cube"></div>
                <div class="cube"></div>
                <div class="cube"></div>
                <div class="cube"></div>
                <div class="cube"></div>
                <div class="cube"></div>

                

<!--Animación personalizada de LUCES-->
   <?php
  //Impresión DIV para la animación de fondo
    for ($i = 0; $i < 50; $i++) { 
        echo <<<HTML
          <div class="circle-container">
            <div class="circle"></div>
          </div>  
      HTML;   
   
   } 

       include("./page/login.php");
   ?>

    </div>  

    <footer id="pieGral">
                <div class="pie_pagina">
                    <p><?php  $ano=Date('Y'); echo $ano; ?>. Derechos Reservados</p>

                </div>
        <?php
        require ('enlaces/redSocial.php');
        ?>

    </footer>
 


    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/sesionModal.js"></script>
    <script src="./js/fecha_actual.js"></script>
    <script>
    // Toggle del menú móvil
    document.querySelector('.navbar__toggle').addEventListener('click', function() {
        const menu = document.getElementById('navbar-menu');
        const isExpanded = this.getAttribute('aria-expanded') === 'true';
        
        this.setAttribute('aria-expanded', !isExpanded);
        menu.setAttribute('aria-expanded', !isExpanded);
        
        // Animación del hamburguesa
        this.classList.toggle('navbar__toggle--active');
    });
</script>
</body>
</html>