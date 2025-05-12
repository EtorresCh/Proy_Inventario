<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <link rel="icon" type="image/png" href="static/illustrations/logomuni3.png">
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <link href="./dist/css/tabler.min.css?1692870487" rel="stylesheet"/>
    <link href="./dist/css/tabler-flags.min.css?1692870487" rel="stylesheet"/>
    <link href="./dist/css/tabler-payments.min.css?1692870487" rel="stylesheet"/>
    <link href="./dist/css/tabler-vendors.min.css?1692870487" rel="stylesheet"/>
    <link href="./dist/css/demo.min.css?1692870487" rel="stylesheet"/>
    <title>Municipalidad Provincial de Chiclayo.</title>
    <style>
      @import url('https://rsms.me/inter/inter.css');
      :root {
      	--tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
      }
      body {
      	font-feature-settings: "cv03", "cv04", "cv11";
      }
    </style>
  </head>
  <body  class=" d-flex flex-column">
    <script src="./dist/js/demo-theme.min.js?1692870487"></script>
    <div class="page page-center">
      <div class="container container-normal py-4">
        <div class="row align-items-center g-0">
          <div class="col-lg">
            <div class="container-tight">
              <div class="card card-md">
                <div class="card-body">
                  <h2 class="text-center mb-2">MUNICIPALIDAD PROVINCIAL DE CHICLAYO</h2>
                  <div class="text-center mb-1">
                    <img src="./static/illustrations/Escudo_de_Chiclayo.PNG" height="120" alt="">
                  </div>
                  <h2 class="text-center mb-2">¡Bienvenido!</h2>
                  <p class="text-center mb-4">Ingresa tus datos para Iniciar sesión.</p>
                  <form action="./" method="POST" autocomplete="off" novalidate>
                    <div class="mb-3">
                      <label class="form-label">Correo Electronico</label>
                        <div class="input-icon mb-3">
                          <input type="text" value="" class="form-control" placeholder="Nombre Usuario">
                          <span class="input-icon-addon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-1">
                              <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"></path>
                              <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                            </svg>
                          </span>
                        </div>
                    </div>
                    <div class="mb-2">
                      <label class="form-label">Contraseña</label>
                      <div class="input-group input-group-flat">
                        <input type="password" class="form-control" placeholder="Tu contraseña..." autocomplete="off" id="usu_pass" name="usu_pass">
                        <span class="input-group-text">
                          <a href="#" class="link-secondary" title="Mostrar contraseña" data-bs-toggle="tooltip" id="togglePassword">
                            <!-- Icono ojo visible -->
                            <svg id="icon-show" xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                              <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                              <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                              <path d="M21 12c-2.4 4 -5.4 6 -9 6
                                      c-3.6 0 -6.6 -2 -9 -6
                                      c2.4 -4 5.4 -6 9 -6
                                      c3.6 0 6.6 2 9 6" />
                            </svg>
                            <!-- Icono ojo tachado -->
                            <svg id="icon-hide" xmlns="http://www.w3.org/2000/svg" class="icon d-none" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                              <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                              <path d="M3 3l18 18" />
                              <path d="M10.6 10.6a2 2 0 0 0 2.8 2.8" />
                              <path d="M9.9 5.1c.7 -.1 1.4 -.1 2.1 0
                                      c3.6 0 6.6 2 9 6
                                      c-.8 1.3 -1.6 2.4 -2.5 3.2" />
                              <path d="M6.6 6.6c-1.7 1.2 -3.2 3 -4.6 5.4
                                      c2.4 4 5.4 6 9 6
                                      c1.5 0 2.9 -.3 4.2 -.9" />
                            </svg>
                          </a>
                        </span>
                      </div>
                    </div>
                    <div class="form-footer">
                      <button type="submit" class="btn btn-info w-100">
                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-login-2"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 8v-2a2 2 0 0 1 2 -2h7a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-7a2 2 0 0 1 -2 -2v-2" /><path d="M3 12h13l-3 -3" /><path d="M13 15l3 -3" /></svg>
                        Ingresar
                      </button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="./dist/js/tabler.min.js?1692870487" defer></script>
    <script src="./dist/js/demo.min.js?1692870487" defer></script>
    <script>
      $(document).ready(function () {
        $('#togglePassword').on('click', function (e) {
          e.preventDefault();
          const input = $('#usu_pass');
          const iconShow = $('#icon-show');
          const iconHide = $('#icon-hide');
          const isVisible = input.attr('type') === 'text';
          input.attr('type', isVisible ? 'password' : 'text');
          if (isVisible) {
            iconShow.removeClass('d-none');
            iconHide.addClass('d-none');
          } else {
            iconShow.addClass('d-none');
            iconHide.removeClass('d-none');
          }
        });
      });
    </script>
  </body>
</html>