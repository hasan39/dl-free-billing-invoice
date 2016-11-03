<?php
	include_once('Model.php');
	
	class UpdateVat extends Database
	{
		public function __construct()
		{
			parent:: __construct();
		}
		
		public $id = "";
		public $vat = "";
		
		public function prepare($data = "")
		{
			if(array_key_exists('id', $data))
				$this->id = $data['id'];
			
			if(array_key_exists('vat', $data))
				$this->vat = $data['vat'];
		}
		
		public function updateVat()
		{
			mysqli_query($this->conn,"UPDATE vat SET vat='".$this->vat."' WHERE id='".$this->id."'");
		}
		
	}
?>




