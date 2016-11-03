<?php
	include_once('Model.php');
	
	Class ItemList  extends Database
	{
		public function __construct()
		{
			parent:: __construct();
		}
		
		public function itemList()
		{
			$itemList = array();
			$itemListQuery = mysqli_query($this->conn,"SELECT * FROM 
																	item
																LEFT OUTER JOIN details
																ON item.id = details.id
														");
			while($itemListQueryFetch = mysqli_fetch_assoc($itemListQuery))
			{
				$itemList[] = $itemListQueryFetch;
			}
			return $itemList;
		}
		
		public function maxInvoiceId()
		{
			$maxInvoiceIdQuery = mysqli_query($this->conn, "SELECT max(id)+1 AS maxInvoiceId FROM invoice_details");
			$maxInvoiceId = mysqli_fetch_assoc($maxInvoiceIdQuery);
			return $maxInvoiceId;
		}
		
		public function vat()
		{
			$vatQ = mysqli_query($this->conn, "SELECT* FROM vat");
			$vat = mysqli_fetch_assoc($vatQ);
			return $vat;
		}
	}
		
?>