<?php
	include_once 'src/ItemList.php';
	include_once 'src/OrderInsert.php';
	include_once 'src/DateCheck.php';
	$controller = new ItemList();
	$itemList = $controller->itemList();
	$maxInvoiceId = $controller->maxInvoiceId();
	$vat = $controller->vat();
	
	$dateCheck = new DateCheck();
	
	$date = date("Y/m/d");
	$_POST['sales_date'] = $date;
	$dateCheck->prepare($_POST);
	$dateCheck->dateInsert();
?>

<!DOCTYPE html>
<html lang="en">

	<head>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="Resources/bootstrap-3.3.5/css/bootstrap.min.css">
		<!-- Optional theme -->
		<link rel="stylesheet" href="Resources/bootstrap-3.3.5/css/bootstrap-theme.min.css">
		<style>#extras,#order{display:none;}</style>
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="Resources/bootstrap-3.3.5/js/html5shiv.min.js"></script>
			<script src="Resources/bootstrap-3.3.5/js/respond.min.js"></script>
		<![endif]-->
		<script src="Resources/bootstrap-3.3.5/jquery/jquery-2.1.4.min.js"></script>
		<script src="Resources/bootstrap-3.3.5/js/custom.js"></script>
		<link rel="stylesheet" href="Resources/bootstrap-select/bootstrap-select.min.css" />
		<script src="Resources/bootstrap-select/bootstrap-select.min.js"></script>
		<script>$('selectpicker').selectpicker();</script>
		<script>
		  
	   </script>

	</head>

	<body >
	
		<div class="container">
			<div class="well">
				<div class="row">
					<div class="col-xs-6">
						<img src="Resources/DigitalLab-Logo-2014.png" class="img" />
					</div>
					<div class="col-xs-6 text-right">
						<h2><?php echo date("Y/m/d");?></h2>
					</div>
				</div>
				
			</div>
			<br />
			<div class="row">
			
				<div class="col-xs-6">
					<button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#addProduct">Add Product</button>
					<button type="button" class="btn btn-warning btn-md" data-toggle="modal" data-target="#updateVat">Update Vat</button>
					
					<div class="modal fade" id="updateVat">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-body">
									<form action="" method="">
										<div class="form-group">
											<label for="element-1">Update Vat</label>
											<input type="hidden" id="vatId" value="<?php echo $vat['id'];?>" class="form-control" />
											<input type="text"  onkeypress="return isNumberKey(event)" id="vat" value="<?php echo $vat['vat'];?>" class="form-control" />
										</div>
										
										<hr />
										<button type="button" id="updateVatBtn" class="btn btn-success pull-left">Done</button>
										<button type="button" class="btn btn-danger pull-right" data-dismiss="modal">Cancel</button>
									</form>
									<script>
										$("#updateVatBtn").click(function() 
										{
											var vat = $("#vat").val();
											var vatId = $("#vatId").val();
											
											if(updateVat != "")
											{
												var dataString = 'id='+ vatId + '&vat='+ vat;
												// alert(dataString);
												$.ajax({
														type: "POST",
														url: "views/updateVat.php",
														data: dataString,
														cache: true,
														success: function(html)
														{
															alert('Successfully Update');
															window.location.reload();
														}
												});
											}
											else
												alert('Field is required');
										});
									</script>
									<br /><br />
								</div>
							</div>
						</div>
					</div>
					
					<div class="modal fade" id="addProduct">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-body">
									<form action="" method="">
										<div class="form-group">
											<label for="element-1">Product Name</label>
											<input type="text" id="product_name" class="form-control" />
										</div>
										
										<div class="row">
											<div class="col-xs-6">
												<label for="element-1">Price</label>
												<input type="text" onkeypress="return isNumberKey(event)" id="product_price" class="form-control" placeholder="Enter Price" />
											</div>
											
											<div class="col-xs-6">
												<label for="element-1">Select</label>
												<select id="product_unit" class="form-control">
													<option value=0></option>
													<option>Kg</option>
													<option>Pices</option>
													<option>gm</option>
												</select>
											</div>
										</div>
										<br /><br />
										<label for="element-1">Item Details</label>
										<br />
										<textarea id="product_details" class="form-control" style="resize:vertical;"></textarea>
										
										<hr />
										<button type="button" id="addNewProduct" class="btn btn-success pull-left">Done</button>
										<button type="button" class="btn btn-danger pull-right" data-dismiss="modal">Cancel</button>
									</form>
									<script>
										$("#addNewProduct").click(function() 
										{
											var product_name = $("#product_name").val();
											var product_price = $("#product_price").val();
											var product_unit = $("#product_unit").val();
											var product_details = $("#product_details").val();
											
											if(product_name != "" && product_price != "" && product_unit != 0 && product_details != "")
											{
												var dataString = 'item_name='+ product_name + '&price='+ product_price + '&unit='+ product_unit + '&item_details=' + product_details;
												
												$.ajax({
														type: "POST",
														url: "views/addNewProduct.php",
														data: dataString,
														cache: true,
														success: function(html)
														{
															alert('Successfully Added');
															window.location.reload();
														}
												});
											}
											else
												alert('All fields are required');
										});
									</script>
									
									<br /><br />
								</div>
							</div>
						</div>
					</div>

				</div>
			
				<div class="col-xs-4">
					<select id="select" class="selectpicker form-control" data-live-search="true" />
						<option value="0">Search Product</option>
						<?php
							foreach($itemList as $item)
							{
						?>
								<option value="<?php echo $item['id'].','.$item['price'].','.$item['unit'];?>">
									<?php echo $item['item_name'];?> - <?php echo $item['item_details'];?> - <?php echo $item['price'];?> Tk.
								</option>
						<?php
							}
						?>
					</select>
				</div>
				
				<div class="col-xs-2">
					<button type="button" id="addrow" class="btn btn-info">
						<span class="glyphicon glyphicon-plus"></span>
					</button>
				</div>
				
				
				
			</div>
		
			<br />
			
			<form action="views/printBill.php" method="POST" target="_blank">
				<input type="hidden" name="date" value="<?php echo $date;?>" />
				<input type="hidden" value="<?php echo $maxInvoiceId['maxInvoiceId'];?>" name="id" />
				<table class="order-list table table-responsive table-striped table-hover table-bordered" id="order">
					<thead>
						<tr class="well">
							<th class="text-center">Item Name</th>
							<th class="text-center">Price</th>
							<th class="text-center">Quantity</th>
							<th class="text-center">Unit</th>
							<th class="text-center">Total</th>
							<th ></th>
						</tr>
					</thead>
					
					<tbody>
						<!--
						<tr>
							<td><input type="text" name="product" class="form-control" /></td>
							<td><input type="text" name="price" class="form-control" /> </td>
							<td><input type="text" name="qty" class="form-control" /></td>
							<td><input type="text" name="linetotal" class="form-control" readonly="readonly" /></td>
							<td><a class="deleteRow"> x </a></td>
						</tr>
						-->
					</tbody>
				</table>
				<div class="row" id="extras">
					<div class="col-md-offset-8 col-md-4 text-right">
						<div class="input-group">
							<span class="input-group-addon">Total (without tax) :</span>
							<input type="text" class="form-control text-center" name="grandtotal" id="grandtotal" readonly>
							<span class="input-group-addon">Tk.</span>
						</div>
						<br />
						<div class="input-group">
							<span class="input-group-addon">Tax</span>
							<input type="text" class="form-control text-center" name="tax_percent" value="<?php echo $vat['vat'];?>" readonly id="tax">
							<span class="input-group-addon">% </span>
						</div>
						<div class="input-group">
							<span class="input-group-addon">Total Tax</span>
							<input type="text" class="form-control text-center" name="tax" id="totalTax" readonly>
							<span class="input-group-addon">Tk. </span>
						</div>
						<div class="input-group">
							<span class="input-group-addon">Total</span>
							<input type="text" class="form-control text-center" name="total" id="total" readonly>
							<span class="input-group-addon">Tk. </span>
						</div>
						<button type="submit" name="submit" class="btn btn-danger btn-md btn-block">Save and Print</button>
					</div>
				</div>
			</form>
		</div>
		
		
		
		<!-- Latest compiled and minified JavaScript -->
		<script src="Resources/bootstrap-3.3.5/js/bootstrap.min.js"></script>

	</body>

</html>
