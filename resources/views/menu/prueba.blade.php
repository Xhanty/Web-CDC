<!DOCTYPE html>
<html lang="es" >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Menú Principal</title>
  <link rel="stylesheet" href="assets/css/stylemenu.css">

</head>
<body>
<!-- partial:index.partial.html -->
<!-- / My brand -->
<div class='brand'>
  <a href='https://www.jamiecoulter.co.uk' target='_blank'>
    <img src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/217233/logo.png'>
  </a>
</div>
<!-- / Begin Body -->
<div class='swanky'>
  <!-- / Introduction Block -->
  <div class='swanky_title'>
    <h1>Bienvendio</h1>
    <div class='swanky_title__social'>
      <a href='https://www.twitter.com/jamiecoulter89' target='_blank'>
        <div class='slide'>
          <div class='arrow'>
            <div class='stem'></div>
            <div class='point'></div>
          </div>
        </div>
        <img src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/217233/tw.png'>
        Twitter
      </a>
    </div>
    <div class='swanky_title__social'>
      <a href='https://www.codepen.io/jcoulterdesign/' target='_blank'>
        <div class='slide'>
          <div class='arrow'>
            <div class='stem'></div>
            <div class='point'></div>
          </div>
        </div>
        <img src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/217233/cp.png'>
        Codepen
      </a>
    </div>
  </div>
  <!-- /////////// Begin Dropdown //////////// -->
  <div class='swanky_wrapper'>
    <input id='Dashboard' name='radio' type='radio'>
    <label for='Dashboard'>
      <img src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/217233/dash.png'>
      <span>Flora</span>
      <div class='lil_arrow'></div>
      <div class='bar'></div>
      <div class='swanky_wrapper__content'>
        <ul>
          <li>Administrar</li>
          <li>Inventario</li>
          <li>Reportes</li>
        </ul>
      </div>
    </label>
    <input id='Sales' name='radio' type='radio'>
    <label for='Sales'>
      <img src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/217233/del.png'>
      <span>Fauna</span>
      <div class='lil_arrow'></div>
      <div class='bar'></div>
      <div class='swanky_wrapper__content'>
        <ul>
          <li>Administrar</li>
          <li>Inventario</li>
          <li>Reportes</li>
        </ul>
      </div>
    </label>
    <input id='Messages' name='radio' type='radio'>
    <label for='Messages'>
      <img src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/217233/mess.png'>
      <span>Suelo</span>
      <div class='lil_arrow'></div>
      <div class='bar'></div>
      <div class='swanky_wrapper__content'>
        <ul>
          <li>Administrar</li>
          <li>Inventario</li>
          <li>Reportes</li>
        </ul>
      </div>
    </label>
    <input id='Settings' radio='radio' type='radio'>
    <label for='Settings'>
      <img src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/217233/set.png'>
      <span>Ajustes</span>
      <div class='lil_arrow'></div>
      <div class='swanky_wrapper__content'>
        <ul>
          <li>Usuarios</li>
          <li>Ver perfil</li>
          <li>Cerrar sesión</li>
        </ul>
      </div>
    </label>
  </div>
  <!-- /////////// End Dropdown //////////// -->
</div>
<!-- / My Footer -->
<div class='love'>
  <p>Realizado <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/217233/love_copy.png" /> 
    por <a href='#' target='_blank'> CDC </a></p>
</div>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script src="https://www.gstatic.com/firebasejs/4.7.0/firebase.js"></script>
  <script src="assets/Firebasejs/connect.js"></script>

  <!--Hacer las validaciones en este archivo-->
  <script  src="assets/js/scriptmenu.js"></script>

</body>
  <script src="assets/Firebasejs/logout.js"></script>

</html>
