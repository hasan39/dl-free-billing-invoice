<?php
	include_once('Model.php');
	
	Class OrderInsert  extends Database
	{
		public function __construct()
		{
			parent:: __construct();
		}
		
		public $id = "";
		public $ref_id_invoice = "";
		public $ref_item = "";
		public $qty = "";
		public $unit_price = "";
		public $unit_total = "";
		public $unit = "";
		public $grandtotal = "";
		public $tax_percent = "";
		public $tax = "";
		public $total = "";
		public $date = "";
		
		public function prepare($data = "")
		{
			if(array_key_exists('id', $data))
				$this->id = $data['id'];
			
			if(array_key_exists('date', $data))
				$this->date = $data['date'];
			
			if(array_key_exists('ref_id_invoice', $data))
				$this->ref_id_invoice = $data['ref_id_invoice'];
			
			if(array_key_exists('ref_item', $data))
				$this->ref_item = implode(",",$data['ref_item']);
			
			if(array_key_exists('qty', $data))
				$this->qty = implode(",",$data['qty']);
			
			if(array_key_exists('unit_price', $data))
				$this->unit_price = implode(",",$data['unit_price']);
			
			if(array_key_exists('unit_total', $data))
				$this->unit_total = implode(",",$data['unit_total']);
			
			if(array_key_exists('unit', $data))
				$this->unit = implode(",",$data['unit']);
			
			if(array_key_exists('grandtotal', $data))
				$this->grandtotal = $data['grandtotal'];
			
			if(array_key_exists('tax_percent', $data))
				$this->tax_percent = $data['tax_percent'];
			
			if(array_key_exists('tax', $data))
				$this->tax = $data['tax'];
			
			if(array_key_exists('total', $data))
				$this->total = $data['total'];
		}
			
		
		public function orderInsert()
		{
			
			$dateFetchQuery = mysqli_query($this->conn,"SELECT * FROM invoice_sales WHERE sales_date = '".$this->date."'");
			$dateFetch = mysqli_fetch_assoc($dateFetchQuery);
			
			mysqli_query($this->conn,"INSERT INTO invoice_details 
													SET
														id = '".$this->id."',
														ref_id_invoice = '".$dateFetch['id']."',
														ref_item = '".$this->ref_item."',
														qty = '".$this->qty."',
														unit_price = '".$this->unit_price."',
														unit_total = '".$this->unit_total."',
														unit = '".$this->unit."',
														grandtotal = '".$this->grandtotal."',
														tax_percent = '".$this->tax_percent."',
														tax = '".$this->tax."',
														total = '".$this->total."'
										");
			
		}
	}
?>





