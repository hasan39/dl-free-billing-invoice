<?php
	include_once('Model.php');
	
	Class OrderShow  extends Database
	{
		public function __construct()
		{
			parent:: __construct();
		}
		
		public $id = "";
		public function prepare($data = "")
		{
			if(array_key_exists('id', $data))
				$this->id = $data['id'];
		}
		
		public function orderShow()
		{
			$orderShowQuery = mysqli_query($this->conn,"SELECT * FROM 
																	invoice_details AS a,
																	invoice_sales AS b
																WHERE
																	a.ref_id_invoice = b.id
																	AND a.id='".$this->id."'
														");
			$orderShow = mysqli_fetch_assoc($orderShowQuery);
			return $orderShow;
		}
	}
		
?>



