<?php
if (isset($_POST['id'])) {
	$s_id = $_POST['id'];

	require_once ('dbhelp.php');
	$sql = 'update tinh set ma_tinh = null where id = '.$s_id;
	execute($sql);
}

?>
