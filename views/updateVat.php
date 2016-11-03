<?php
	include_once '../src/UpdateVat.php';
	
	$updateVat = new UpdateVat();
	$updateVat->prepare($_POST);
	$updateVat->updateVat();
?>