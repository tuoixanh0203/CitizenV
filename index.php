<?php
session_start();
if (isset($_SESSION['a1'])) {
	header('location: home.php');
	// echo "a1";
} elseif (isset($_SESSION['a2'])) {
	header('location:home.php');
} elseif (isset($_SESSION['a3'])) {
	echo "a3";
} elseif (isset($_SESSION['b1'])) {
	echo "b1";
} elseif (isset($_SESSION['b2'])) {
	echo "b2";
}
?>
<?php
include_once 'head.php';
?>
<!-- abc -->
<body class="body-login">
	<div class="container ">
		<div class="card">
			<div class="p-3 m-3 login-form  ">
				<div class="login-logo card-header fw-bold text-center">
					<h2>Login</h2>
				</div>
				<form action="login.php" method="POST" class="login-body card-body ">
					<div class="form-group m-2">
						<label for="username">Username:</label>
						<input type="text" class="form-control" id="username" placeholder="Enter username" name="username" required autofocus>
					</div>
					<div class="form-group m-2">
						<label for="password">Password:</label>
						<input type="password" class="form-control" id="password" placeholder="Enter password" required name="password">
					</div>
					<div class="checkbox m-2">
						<label><input type="checkbox" name="remember"> Remember me</label>
					</div>
					<div class="d-grid m-2">
						<button type="submit" class="btn btn-success btn-block">Sign in</button>
					</div>
					<div class="forgot-password px-3">
						<a href="#" class="text-decoration-none">Forgot password?</a>
					</div>
					<!-- <button type="submit" class="btn btn-primary "><i class="fa fa-sign-in"></i>Sign In</button> -->
				</form>
			</div>
		</div>
		<?php
		if (isset($_SESSION['error'])) {
			echo "
  				<div class='callout callout-danger text-center mt20'>
			  		<p>" . $_SESSION['error'] . "</p> 
			  	</div>
  			";
			unset($_SESSION['error']);
		}
		?>
	</div>
</body>

</html>