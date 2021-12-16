<?php
  session_start();
  if(isset($_SESSION['a1'])){
    header('location:home.php');
	// echo "a1";
  } elseif(isset($_SESSION['a2'])) {
	echo "a2";
  } elseif(isset($_SESSION['a3'])) {
	echo "a3";
  } elseif(isset($_SESSION['b1'])) {
	echo "b1";
  } elseif(isset($_SESSION['b2'])) {
	echo "b2";
  }
?>
<?php include 'header.php'; ?>
<body class="hold-transition login-page">
<div class="login-box">
  	<div class="login-logo">
  		<b>Admin Login</b>
  	</div>
  
  	<div class="login-box-body">
    	<p class="login-box-msg">Sign in to start your session</p>

    	<form action="login.php" method="POST">
      		<div class="form-group has-feedback">
        		<input type="text" class="form-control" name="username" placeholder="input Username" required autofocus>
        		<span class="glyphicon glyphicon-user form-control-feedback"></span>
      		</div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="password" placeholder="input Password" required>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
      		<div class="row">
    			<div class="col-xs-4">
          			<button type="submit" class="btn btn-primary btn-block btn-flat" name="login"><i class="fa fa-sign-in"></i> Sign In</button>
        		</div>
      		</div>
    	</form>
  	</div>
  	<?php
  		if(isset($_SESSION['error'])){
  			echo "
  				<div class='callout callout-danger text-center mt20'>
			  		<p>".$_SESSION['error']."</p> 
			  	</div>
  			";
  			unset($_SESSION['error']);
  		}
  	?>
</div>
	
<?php include 'scripts.php' ?>
</body>
</html>