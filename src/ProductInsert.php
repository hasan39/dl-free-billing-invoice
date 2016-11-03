<?php
	include_once('Model.php');
	
	class ProductInsert extends Database
	{
		public function __construct()
		{
			parent:: __construct();
		}
		
		public $item_name = "";
		public $item_details = "";
		public $price = "";
		public $unit = "";
		
		public function prepare($data = "")
		{
			if(array_key_exists('item_name', $data))
				$this->item_name = $data['item_name'];
			
			if(array_key_exists('item_details', $data))
				$this->item_details = $data['item_details'];
			
			if(array_key_exists('price', $data))
				$this->price = $data['price'];
			
			if(array_key_exists('unit', $data))
				$this->unit = $data['unit'];
		}
		
		public function productInsert()
		{
			$maxItemIdQuery = mysqli_query($this->conn, "SELECT max(id)+1 AS maxItemId FROM item");
			$maxItemId = mysqli_fetch_assoc($maxItemIdQuery);
			
			if($maxItemId['maxItemId'] == 0)
				$id = 1;
			else
				$id = $maxItemId['maxItemId'];
			
			mysqli_query($this->conn,"INSERT INTO item SET id='".$id."', item_name='".$this->item_name."'");
			mysqli_query($this->conn,"INSERT INTO details SET id='".$id."', 
															item_details='".$this->item_details."',
															price='".$this->price."',
															unit='".$this->unit."'
													");
		}
		
	}
?>




