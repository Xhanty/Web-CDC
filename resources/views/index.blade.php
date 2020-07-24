<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Software CDC</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Roboto:100,300,400,500,700|Philosopher:400,400i,700,700i" rel="stylesheet">

  <!-- Bootstrap css -->
  <!-- <link rel="stylesheet" href="css/bootstrap.css"> -->
  <link href="assets/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/lib/owlcarousel/assets/owl.theme.default.min.css" rel="stylesheet">
  <link href="assets/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="assets/css/animate.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" 
  integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

  <!-- Main Stylesheet File -->
  <link href="assets/css/styleindex.css" rel="stylesheet">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.css"/>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.js"></script>
</head>

<body>
<style>
  #submit {
    font-weight: bold;
    cursor: pointer;
    padding: 5px;
    margin: 0 10px 20px 0;
    border: 1px solid #ccc;
    background: #eee;
    border-radius: 8px 8px 8px 8px;
  }

  #submit:hover {
    background: #ddd;
  }
</style>

  <header id="header" class="header header-hide">
    <div class="container">

      <div id="logo" class="pull-left">
        <h1><a href="#body" class="scrollto"><span>Software</span> CDC</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="#body"><img src="img/logo.png" alt="" title="" /></a>-->
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="#hero">Inicio</a></li>
          <li><a href="#about-us">Sobre nosotros</a></li>
          <li><a href="#features">Procesos</a></li>
          <li><a href="#contact">Contáctanos</a></li>
          <li><div class="dropdown"><a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Iniciar sesión</a>

        <div class="dropdown-menu" style="width: 240px;">
          <form class="px-2 py-2" onsubmit="login()">
            <div class="form-group">
              <label for="email">E-mail</label>
              <input type="email" title="Ingresa un E-mail válido"
               pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" 
               required class="form-control" id="email" placeholder=" email@example.com">
            </div>
            <div class="form-group">
              <label for="password">Clave</label>
              <input type="password" required
              pattern="[A-Za-z0-9]{5,15}"
              title="La clave debe ser mínimo 5 y máximo 15 caracteres"
              class="form-control" id="password" placeholder=" ******">
            </div><br>
            <center>
            <button type="submit" id="submit" class="btn_login">Ingresar</button>
            </center>
          </form>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" style="color: black;" href="#">Olvidaste tú clave?</a>
        </div>
      </div>
        </li>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->

  <!--==========================
    Hero Section
  ============================-->
  <section id="hero" class="wow fadeIn">
    <div class="hero-container"><br><br><br><br>
      <h1>Bienvenidos a CDC</h1>
      <h2>Corporación Desarolla Colombia - CDC</h2>
      <img src="assets/img/hero-img.png" alt="img">
      <a href="#get-started" class="btn-get-started scrollto">Leer más</a>
      <div class="btns">
        <a href="#"><i class="fa fa-play fa-3x"></i> Google Play</a>
      </div>
    </div>
  </section><!-- #hero -->

  <!--==========================
    Get Started Section
  ============================-->
  <section id="get-started" class="padd-section text-center wow fadeInUp">

    <div class="container">
      <div class="section-title text-center">

        <h2>Software para administrar CDC</h2>
        <p class="separator">Software web y móvil para satisfacer todos los procesos</p>

      </div>
    </div>

    <div class="container">
      <div class="row">

        <div class="col-md-6 col-lg-4">
          <div class="feature-block">

            <img src="assets/img/svg/cloud.svg" alt="img" class="img-fluid">
            <h4>Proceso de flora</h4>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
          </div>
        </div>

        <div class="col-md-6 col-lg-4">
          <div class="feature-block">

            <img src="assets/img/svg/planet.svg" alt="img" class="img-fluid">
            <h4>Proceso de fauna</h4>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
          </div>
        </div>

        <div class="col-md-6 col-lg-4">
          <div class="feature-block">

            <img src="assets/img/svg/asteroid.svg" alt="img" class="img-fluid">
            <h4>Proceso social</h4>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
          </div>
        </div>

      </div>
    </div>

  </section>

  <!--==========================
    About Us Section
  ============================-->
  <section id="about-us" class="about-us padd-section wow fadeInUp">
    <div class="container">
      <div class="row justify-content-center">

        <div class="col-md-5 col-lg-3">
          <img src="assets/img/about-img.png" alt="About">
        </div>

        <div class="col-md-7 col-lg-5">
          <div class="about-content">

            <h2><span>CDC</span>Diseño de la aplicación móvil</h2>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Esse harum iusto ipsum at accusamus excepturi ad eaque ex 
              neque quasi nulla modi beatae ab dicta, repellat hic! Odio, incidunt magni.
            </p>

            <ul class="list-unstyled">
              <li><i class="fa fa-angle-right"></i>Interfaz agradable</li>
              <li><i class="fa fa-angle-right"></i>Adaptable</li>
              <li><i class="fa fa-angle-right"></i>Fácil De Usar</li>
              <li><i class="fa fa-angle-right"></i>Funciones limitadas</li>
            </ul>

          </div>
        </div>

      </div>
    </div>
  </section>

  <!--==========================
    Features Section
  ============================-->

  <section id="features" class="padd-section text-center wow fadeInUp">

    <div class="container">
      <div class="section-title text-center">
        <h2>Nuestros procesos.</h2>
        <p class="separator">Cada uno de estos procesos serán administrados por el software</p>
      </div>
    </div>

    <div class="container">
      <div class="row">

        <div class="col-md-6 col-lg-3">
          <div class="feature-block">
            <img src="assets/img/svg/paint-palette.svg" alt="img" class="img-fluid">
            <h4>Arboles</h4>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
          </div>
        </div>

        <div class="col-md-6 col-lg-3">
          <div class="feature-block">
            <img src="assets/img/svg/vector.svg" alt="img" class="img-fluid">
            <h4>Fuentes hídricas</h4>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
          </div>
        </div>

        <div class="col-md-6 col-lg-3">
          <div class="feature-block">
            <img src="assets/img/svg/design-tool.svg" alt="img" class="img-fluid">
            <h4>Fuentes naturales</h4>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
          </div>
        </div>

        <div class="col-md-6 col-lg-3">
          <div class="feature-block">
            <img src="assets/img/svg/asteroid.svg" alt="img" class="img-fluid">
            <h4>Vías</h4>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
          </div>
        </div>

        <div class="col-md-6 col-lg-3">
          <div class="feature-block">
            <img src="assets/img/svg/asteroid.svg" alt="img" class="img-fluid">
            <h4>Aire</h4>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
          </div>
        </div>

        <div class="col-md-6 col-lg-3">
          <div class="feature-block">
            <img src="assets/img/svg/cloud-computing.svg" alt="img" class="img-fluid">
            <h4>Social</h4>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
          </div>
        </div>

        <div class="col-md-6 col-lg-3">
          <div class="feature-block">
            <img src="assets/img/svg/pixel.svg" alt="img" class="img-fluid">
            <h4>Deforestación</h4>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
          </div>
        </div>

        <div class="col-md-6 col-lg-3">
          <div class="feature-block">
            <img src="assets/img/svg/code.svg" alt="img" class="img-fluid">
            <h4>Contaminación</h4>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
          </div>
        </div>

      </div>
    </div>
  </section>
  <!--==========================
    Contact Section
  ============================-->
  <section id="contact" class="padd-section wow fadeInUp">

    <div class="container">
      <div class="section-title text-center">
        <h2>Contáctanos</h2>
        <p class="separator">Cuéntanos si tienes algún problema o pregunta acerca nosotros</p>
      </div>
    </div>

    <div class="container">
      <div class="row justify-content-center">

        <div class="col-lg-3 col-md-4">

          <div class="info">
            <div>
              <i class="fa fa-map-marker"></i>
              <p>Carrera 1 # 3-19, Oficina 201<br>Tabio - Cundinamarca</p>
            </div>

            <div class="email">
              <i class="fa fa-envelope"></i>
              <p>gerencia@grupo-cdc.com</p>
            </div>

            <div>
              <i class="fa fa-phone"></i>
              <p>+57 300 4176404</p>
            </div>
          </div>
        </div>

        <div class="col-lg-5 col-md-8">
          <div class="form">
            <div id="errormessage"></div>
            <form action="#" method="post" role="form" class="contactForm">
              @csrf
              <div class="form-group">
                <input type="text" name="name" class="form-control" id="name" placeholder="Nombres" data-rule="minlen:4" data-msg="Por favor ingrese al menos 4 caracteres" />
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <input type="email" class="form-control" placeholder="E-mail" data-rule="email" data-msg="Por favor introduzca una dirección de correo electrónico válida" />
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Asunto" data-rule="minlen:4" data-msg="Por favor ingrese al menos 8 caracteres de tema" />
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Por favor escribe algo para nosotros" placeholder="Mensaje"></textarea>
                <div class="validation"></div>
              </div>
              <div class="text-center"><button type="submit">Enviar mensaje</button></div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section><!-- #contact -->

  <!--==========================
    Footer
  ============================-->
  <footer class="footer">
    <div class="container">
      <div class="row">

        <div class="col-md-12 col-lg-4">
          <div class="footer-logo">

            <a class="navbar-brand" href="#">Software CDC</a>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the.</p>

          </div>
        </div>
      </div>
    </div>

    <div class="copyrights">
      <div class="container">
        <p>&copy; Copyrights Software CDC.</p>
      </div>
    </div>

  </footer>



  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

      <script src="https://www.gstatic.com/firebasejs/4.7.0/firebase.js"></script>
      <script src="assets/Firebasejs/connect.js"></script>

</body>

  <!-- JavaScript Libraries -->
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/jquery-migrate.min.js"></script>
  <script src="assets/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/hoverIntent.js"></script>
  <script src="assets/js/superfish.min.js"></script>
  <script src="assets/js/easing.min.js"></script>
  <script src="assets/lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="assets/js/wow.min.js"></script>

  <!-- Contact Form JavaScript File -->
  <script src="assets/js/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="assets/js/main.js"></script>

  <!--FIREBASE-->
  <script src="assets/Firebasejs/login.js"></script>

</html>
