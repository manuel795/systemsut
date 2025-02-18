<?php
error_reporting(0);
echo <<<HTML
    <div class="enlaces">
        <nav class="navbar" aria-label="Navegación principal">
            <!-- Botón para móvil -->
            <button class="navbar__toggle" aria-expanded="false" aria-controls="navbar-menu" aria-label="Abrir menú">
                <span class="navbar__hamburger"></span>
            </button>
            
            <!-- Lista de navegación -->
            <ul class="navbar__menu" id="navbar-menu" role="menubar">
            <li class="navbar__item" role="none">
                    <a href="../index.php" class="navbar__link" 
                       role="menuitem" 
                       aria-current="<?= ($paginaActual === 'quienesSomos') ? 'page' : 'false' ?>">
                        inicio
                    </a>
                </li>
                <li class="navbar__item" role="none">
                    <a href="../page/quienesSomos.php" class="navbar__link" 
                       role="menuitem" 
                       aria-current="<?= ($paginaActual === 'quienesSomos') ? 'page' : 'false' ?>">
                        Quiénes Somos
                    </a>
                </li>
                <li class="navbar__item" role="none">
                    <a href="../page/directorio.php" class="navbar__link" 
                       role="menuitem"
                       aria-current="<?= ($paginaActual === 'directorio') ? 'page' : 'false' ?>">
                        Directorio
                    </a>
                </li>
                <li class="navbar__item" role="none">
                    <a href="../page/descargas.php" class="navbar__link" 
                       role="menuitem"
                       aria-current="<?= ($paginaActual === 'descargas') ? 'page' : 'false' ?>">
                        Descargas
                    </a>
                </li>
                <li class="navbar__item" role="none">
                    <a href="../page/galeria.php" class="navbar__link" 
                       role="menuitem"
                       aria-current="<?= ($paginaActual === 'galeria') ? 'page' : 'false' ?>">
                        Galería
                    </a>
                </li>
                <li class="navbar__item" role="none">
                    <a href="../page/contacto.php" class="navbar__link" 
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
HTML;

?>