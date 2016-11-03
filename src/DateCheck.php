<?php
	include_once('Model.php');
	
	Class DateCheck  extends Database
	{
		public function __construct()
		{
			parent:: __construct();
		}
		
		public $id = "";
		public $sales_date = "";
		
		public function prepare($data = "")
		{
			if(array_key_exists('id', $data))
				$this->id = $data['id'];
			
			if(array_key_exists('sales_date', $data))
				$this->sales_date = $data['sales_date'];
			
		}
		
		public function dateInsert()
		{
			$dateFetchQuery = mysqli_query($this->conn,"SELECT COUNT(*) AS dateExist FROM invoice_sales WHERE sales_date = '".$this->sales_date."'");
			$dateFetch = mysqli_fetch_assoc($dateFetchQuery);
			if($dateFetch['dateExist'] == 0)
			{
				mysqli_query($this->conn,"INSERT INTO invoice_sales SET sales_date = '".$this->sales_date."'");
			}
		}
	}
?>

