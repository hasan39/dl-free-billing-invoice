<?php
	include_once '../src/OrderShow.php';
	include_once '../src/OrderInsert.php';
	include_once '../src/ItemList.php';
	
	$controller = new ItemList();
	$itemList = $controller->itemList();
	
	$insert = new OrderInsert();
	$insert->prepare($_POST);
	$insert->orderInsert();
	
	$orderShow = new OrderShow();
	$orderShow->prepare($_POST);
	$order = $orderShow->orderShow();
	
	$items = explode(',',$order['ref_item']);
	$quantities = explode(',',$order['qty']);
	$units = explode(',',$order['unit']);
	$prices = explode(',',$order['unit_price']);
	$totals = explode(',',$order['unit_total']);
	
?>
<html>
	<head>
		<style>
			.table_footer{border:none;text-align:right;}
		</style>
	</head>
	
	<body onload="window.print()" onclick="window.close()">
		<table border=1 width="700px" align="center">
			<tr>
				<th colspan=5>
					<h2>Digital Lab</h2>
					<h3>Bill No# <?php echo $order['id'];?></h3>
					<b>Date : </b> <?php echo $order['sales_date'];?>
				</th>
			</tr>
			<tr style="text-align:center;">
				<td><b>Item Name</b></td>
				<td><b>Price</b></td>
				<td><b>Quantity</b></td>
				<td><b>Unit</b></td>
				<td><b>Total</b></td>
			</tr>
			<tr>
				<td>
					<table style="width:100%;">
						<?php
							foreach($itemList as $item)
							{
								if(strpos($order['ref_item'], $item['id']) !== FALSE)
								{
									echo '<tr><td style="border:1px solid black; text-align:center;">';
									echo $item['item_name'];
									echo '</td></tr>';
								}
							}
						?>
						
						<?php
							// foreach($items as $item)
							// {
								// echo '<tr><td style="border:1px solid black; text-align:center;">';
								// echo $item;
								// echo '</td></tr>';
							// }
						?>
					</table>
				</td>
				<td>
					<table width=100%>
						<?php
							foreach($prices as $price)
							{
								echo '<tr><td style="border:1px solid black; text-align:center;">';
								echo $price;
								echo '</td></tr>';
							}
						?>
					</table>
				</td>
				<td>
					<table width=100%>
						<?php
							foreach($quantities as $quantity)
							{
								echo '<tr><td style="border:1px solid black; text-align:center;">';
								echo $quantity;
								echo '</td></tr>';
							}
						?>
					</table>
				</td>
				
				<td>
					<table width=100%>
						<?php
							foreach($units as $unit)
							{
								echo '<tr><td style="border:1px solid black; text-align:center;">';
								echo $unit;
								echo '</td></tr>';
							}
						?>
					</table>
				</td>
				
				<td>
					<table width=100%>
						<?php
							foreach($totals as $total)
							{
								echo '<tr><td style="border:1px solid black; text-align:center;">';
								echo $total;
								echo '</td></tr>';
							}
						?>
					</table>
				</td>
			</tr>
			
			<tr><td class="table_footer" colspan=5><b>Total : </b><?php echo $order['grandtotal'];?></td></tr>
			<tr><td class="table_footer" colspan=5><b>Tax : </b><?php echo $order['tax_percent'];?>% = <?php echo $order['tax'];?></td></tr>
			<tr><td class="table_footer" colspan=5><b>Total(include tax) : </b><?php echo $order['total'];?>%</td></tr>
		</table>
	</body>
</html>