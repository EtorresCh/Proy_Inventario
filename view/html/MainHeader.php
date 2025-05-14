<header class="navbar navbar-expand-md navbar-overlap d-print-none" data-bs-theme="dark">
    <div class="container-xl">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <img src="../../static/illustrations/logomuni3.png" width="110" height="32" alt="Tabler" class="navbar-brand-image">
        <div class="dropdown-menu-arrow">
            <div class=" dropdown-item nd-lg-inline-block ms-2">Municipalidad</div>
            <div class=" dropdown-item d-lg-inline-block ms-2">Provincial de Chiclayo</div>
        </div>
        <div class="navbar-nav flex-row order-md-last">
            <div class="nav-item dropdown">
                <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
                    <span class="avatar avatar-sm" style="background-image: url(../../static/illustrations/foto_perfil.png)"></span>
                    <div class="d-none d-xl-block ps-2">
                        <div><?php echo $_SESSION['usu_nom'];?></div>
                        <div class="mt-1 small text-secondary"><?php echo $_SESSION['usu_apep'];?></div>
                    </div>
                </a>
                <input type="hidden" id="usu_idx" value="<?php echo $_SESSION["usu_id"]; ?>">
                <input type="hidden" id="rol_idx" value="<?php echo $_SESSION["rol_id"]; ?>">
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow" >
                    <a href="../Usu_Perfil/" class="dropdown-item d-lg-inline-block">
                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-user-circle"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" /><path d="M12 10m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" /><path d="M6.168 18.849a4 4 0 0 1 3.832 -2.849h4a4 4 0 0 1 3.834 2.855" /></svg>
                        Perfil
                    </a>
                    <a href="../../index.php" class="dropdown-item d-lg-inline-block">
                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-logout"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" /><path d="M9 12h12l-3 -3" /><path d="M18 15l3 -3" /></svg>
                        Cerrar Sesion
                    </a>
                </div>
            </div>
        </div>
        <div class="collapse navbar-collapse justify-content-end" id="navbar-menu">
            <ul class="navbar-nav mb-1">
                <li class="nav-item">
                    <a class="nav-link" href="../Usu_Home/" >
                        <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l-2 0l9 -9l9 9l-2 0" /><path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" /><path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" /></svg>
                        </span>
                        <span class="nav-link-title">
                        Inicio
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../Usu_Escanear/" >
                        <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-camera-x"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M13.5 20h-8.5a2 2 0 0 1 -2 -2v-9a2 2 0 0 1 2 -2h1a2 2 0 0 0 2 -2a1 1 0 0 1 1 -1h6a1 1 0 0 1 1 1a2 2 0 0 0 2 2h1a2 2 0 0 1 2 2v4" /><path d="M9 13a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" /><path d="M22 22l-5 -5" /><path d="M17 22l5 -5" /></svg>
                        </span>
                        <span class="nav-link-title">
                              Escanear
                        </span>
                    </a>
                </li>
                <?php
                if($_SESSION["rol_id"]== 1){
                ?>
                <?php
                } else{
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="../Admin_Usuario/" >
                        <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-users"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" /><path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /><path d="M16 3.13a4 4 0 0 1 0 7.75" /><path d="M21 21v-2a4 4 0 0 0 -3 -3.85" /></svg>
                        </span>
                        <span class="nav-link-title">
                            Usuarios
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../Admin_Equipo/" >
                        <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-augmented-reality-2"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 21h-2a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h8a2 2 0 0 1 2 2v3.5" /><path d="M17 17l-4 -2.5l4 -2.5l4 2.5v4.5l-4 2.5z" /><path d="M13 14.5v4.5l4 2.5" /><path d="M17 17l4 -2.5" /><path d="M11 4h2" /></svg>
                        </span>
                        <span class="nav-link-title">
                        Equipos
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../Admin_Categoria/" >
                        <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-folder-star"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 19h-5a2 2 0 0 1 -2 -2v-11a2 2 0 0 1 2 -2h4l3 3h7a2 2 0 0 1 2 2v2.5" /><path d="M17.8 20.817l-2.172 1.138a.392 .392 0 0 1 -.568 -.41l.415 -2.411l-1.757 -1.707a.389 .389 0 0 1 .217 -.665l2.428 -.352l1.086 -2.193a.392 .392 0 0 1 .702 0l1.086 2.193l2.428 .352a.39 .39 0 0 1 .217 .665l-1.757 1.707l.414 2.41a.39 .39 0 0 1 -.567 .411l-2.172 -1.138z" /></svg>
                        </span>
                        <span class="nav-link-title">
                        Categorias
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../Admin_Area/" >
                        <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-pin-invoke"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M21 13v5a1 1 0 0 1 -1 1h-16a1 1 0 0 1 -1 -1v-12a1 1 0 0 1 1 -1h9" /><path d="M19 7m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M10 11h4v4" /><path d="M10 15l4 -4" /></svg>
                        </span>
                        <span class="nav-link-title">
                            Areas
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../Admin_Proveedor/" >
                        <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-building-factory-2"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 21h18" /><path d="M5 21v-12l5 4v-4l5 4h4" /><path d="M19 21v-8l-1.436 -9.574a.5 .5 0 0 0 -.495 -.426h-1.145a.5 .5 0 0 0 -.494 .418l-1.43 8.582" /><path d="M9 17h1" /><path d="M14 17h1" /></svg>
                        </span>
                        <span class="nav-link-title">
                            Proveedor
                        </span>
                    </a>
                </li>
                  <?php  
                  }
                ?>
            </ul>
        </div>
    </div>
</header>
