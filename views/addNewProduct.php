<?php
	include_once '../src/ProductInsert.php';
	
	$productInsert = new ProductInsert();
	$productInsert->prepare($_POST);
	$productInsert->productInsert();
?>