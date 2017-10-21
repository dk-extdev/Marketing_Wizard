<?php
	$sel_menu = isset($_GET['menu']) ? $_GET['menu'] : 'dashboard';

?>
<?php require_once('header.php'); ?>
<?php require_once($sel_menu . '.php'); ?>
<?php require_once('footer.php');