<?php
	
	class Database
	{
		public $conn;
		
		public function __construct()
		{
			$this->conn= mysqli_connect("localhost","root","","digital_lab_pos") or die("Database connection failed");
		}
	}

?>