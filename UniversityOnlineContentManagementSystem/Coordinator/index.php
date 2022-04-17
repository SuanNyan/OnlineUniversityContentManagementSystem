<!DOCTYPE html>

<html>
	<?php include('header2.php'); ?>
<header>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link href="assets/style.css" rel="stylesheet">
  <link href="./main.css" rel="stylesheet"></head>

</header>
<body>


<div class="wrapper fadeInDown">
  <div class="p-5 mb-3 display-2 fadeIn second font-weight-bold text-center text-muted">Coordinator</div>
  <div id="formContent">
    <!-- Tabs Titles -->

    
    <div class="fadeIn first container card p-5" style="width: 50%">
     <!--  <img src="assets/images/avatars/.." id="icon" alt="User Icon" /> -->

    <form action="login.php"  class="form-group"  method="post">
      <h1 class="font-weight-bold text-center  text-muted">Login</h1>
      <input type="text" id="login" class="fadeIn mb-4 form-control second" name="name" placeholder="Username">
      <input type="password" id="password" class="fadeIn mb-4  form-control third" name="password" placeholder="password">
      <input type="submit" class="fadeIn fourth btn btn-primary" value="Log In">
    </form>
    </div>


    
    <!-- <div id="formFoo
    ter">
      <a class="underlineHover" href="#">Forgot Password?</a>
    </div> -->

  </div>
</div>	

</body>
</html>