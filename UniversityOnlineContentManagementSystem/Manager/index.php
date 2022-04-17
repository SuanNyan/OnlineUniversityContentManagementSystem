<!DOCTYPE html>

<html>
	<?php include('tags/header.php'); ?>
<header>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link href="assets/style.css" rel="stylesheet">
</header>
<body>


<div class="wrapper fadeInDown">
  <div class="p-5 mb-3 display-2 fadeIn second font-weight-bold text-center text-muted">Manager</div>
  <div id="formContent">
    <!-- Tabs Titles -->

    
    <div class="fadeIn first">
     <!--  <img src="assets/images/avatars/.." id="icon" alt="User Icon" /> -->
    </div>

    <form action="login.php" method="post">
      <h1 class="font-weight-bold text-center text-muted">Login</h1>
      <input type="text" id="login" class="fadeIn second" name="name" placeholder="Username">
      <input type="text" id="password" class="fadeIn third" name="password" placeholder="password">
      <input type="submit" class="fadeIn fourth" value="Log In">
    </form>

    
    <!-- <div id="formFoo
    ter">
      <a class="underlineHover" href="#">Forgot Password?</a>
    </div> -->

  </div>
</div>	

</body>
</html>