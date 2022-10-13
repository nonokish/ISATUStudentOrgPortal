<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>ISAT-U Student's Organization Online Portal - Super Admin Login</title>
  <!-- MDB icon -->
  <link rel="icon" href="../../img/ISATULogo.png" type="image/x-icon">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="../../css/bootstrap.min.css">
  <!-- Material Design Bootstrap -->
  <link rel="stylesheet" href="../../css/mdb2.min.css">
  <!-- Your custom styles (optional) -->
  <link rel="stylesheet" type="text/css" href="../../css/style.css">
  <!-- Your custom styles media query (optional) -->

  <!-- Font Styles -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700;900&display=swap"/>
</head>

<body class="superadmin-login">

  <!-- Modals -->

  <!--Double navigation-->
  <header>
    

  <!--Main Layout-->
  <main class="superadmin-login-container" style="width: 100vw; height: 100vh;">
    <div class="superadmin-login-form-wrap">
      <!-- Default form login -->
      <form class="text-center border border-light px-5 py-5" method="POST" action="./php/login.php">
          <div>ISAT-U Student's Organization</div>
          <p class="h4 mb-5">Superadmin Login</p>

          <!-- Email -->
          <input type="email" id="loginEmail" name="loginEmail" class="form-control mb-4" placeholder="E-mail">

          <!-- Password -->
          <input type="password" id="loginPassword" name="loginPassword" class="form-control mb-4" placeholder="Password">

          <!-- Sign in button -->
          <button class="btn btn-sa-login btn-block mt-5" type="submit">Login</button>

      </form>
      <!-- Default form login -->
    </div>
  </main>
  <!--Main Layout-->


<!-- jQuery -->
  <script type="text/javascript" src="../../js/jquery2.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="../../js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="../../js/bootstrap2.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="../../js/mdb2.min.js"></script>

  <script type="text/javascript">
  	$(document).ready(function() {

  // SideNav Initialization
  $(".button-collapse").sideNav();
})
  </script>

  <script type="text/javascript">
  	$(document).ready(function() {
	// SideNav Button Initialization
	$(".button-collapse").sideNav({
		slim: true,
});
});
  </script>

  <script type="text/javascript">
    $('.datepicker').pickadate({
      weekdaysShort: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
      showMonthsShort: true,
      })
  </script>
  

</body>
</html>