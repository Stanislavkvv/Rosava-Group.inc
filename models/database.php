<?php
	class DATABASE
	{
		public static function Connect(){
			$mysqli = new mysqli('localhost','root','','rosavagroup');
			$mysqli->set_charset("utf8mb4");
			if ($mysqli->connect_errno == 0) {
			  	return $mysqli;
			}
		}
	}
?>