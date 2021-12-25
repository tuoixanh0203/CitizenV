<?php
	session_start();
	// require_once ('dbhelp.php');
	include 'conn.php';
	function password_verify_custom($pwInput, $pwDB) {
  		return strcmp($pwInput, $pwDB)==0;
    } 

	if(!empty($_POST)){
		$username = $_POST['username'];
		$password = md5($_POST['password']);
		

		$sql = "SELECT * FROM users WHERE username = '$username'";
		// $query = executeResult($sql);
		$query = $conn->query($sql);

		if($query->num_rows < 1){
			$_SESSION['error'] = 'Cannot find account with the username';
		}
		else{
			$row = $query->fetch_assoc();
			if(password_verify_custom($password, $row['password'])){
				$_SESSION['username'] = $row['username'];
				if($row['role'] == 1) {
					$_SESSION['a1'] = $row['username'];
				} else if($row['role'] == 2) {
					$_SESSION['a2'] = $row['username'];
				} elseif($row['role'] == 3) {
					$_SESSION['a3'] = $row['username'];
				} elseif($row['role'] == 4) {
					$_SESSION['b1'] = $row['username'];
				} elseif($row['role'] == 5) {
					$_SESSION['b2'] = $row['username'];
				}
			}
			else{
				$_SESSION['error'] = 'Incorrect password';
			}
		}
		
	}
	else{
		$_SESSION['error'] = 'Input admin credentials first';
	}

	header('location: index.php');

	// var_dump(isset($_POST['login']));
	// var_dump(!empty($_POST));
?>