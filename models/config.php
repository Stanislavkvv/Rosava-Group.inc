<?php
	class CONFIG
	{
		public static function getPhone(){
			$mysqli = DATABASE::Connect();
			$sql = "SELECT * FROM `config` WHERE `config_key`='phone'";
			$stmt = $mysqli->prepare($sql);
			$stmt->execute();
			return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
		}
		public static function getFormatPhone($phone){
			if(  preg_match( '/^\+\d(\d{3})(\d{3})(\d{4})$/', $phone,  $matches ) )
			{
				$result = $matches[1] . '-' .$matches[2] . '-' . $matches[3];
			}
			return "+1-".$result;
		}
		public static function getFax(){
			$mysqli = DATABASE::Connect();
			$sql = "SELECT * FROM `config` WHERE `config_key`='fax'";
			$stmt = $mysqli->prepare($sql);
			$stmt->execute();
			return $stmt->get_result()->fetch_all(MYSQLI_ASSOC)[0]["config_value"];
		}
		public static function getDescription(){
			$mysqli = DATABASE::Connect();
			$sql = "SELECT * FROM `config` WHERE `config_key`='siteDescription'";
			$stmt = $mysqli->prepare($sql);
			$stmt->execute();
			return $stmt->get_result()->fetch_all(MYSQLI_ASSOC)[0]["config_value"];
		}
		public static function getFormatFax($phone){
			$result = CONFIG::getFax();
			return substr($result,1);
		}
		public static function getMail(){
			$mysqli = DATABASE::Connect();
			$sql = "SELECT * FROM `config` WHERE `config_key`='mail'";
			$stmt = $mysqli->prepare($sql);
			$stmt->execute();
			return $stmt->get_result()->fetch_all(MYSQLI_ASSOC)[0]["config_value"];
		}
		public static function getLocation(){
			$mysqli = DATABASE::Connect();
			$sql = "SELECT * FROM `config` WHERE `config_key`='location'";
			$stmt = $mysqli->prepare($sql);
			$stmt->execute();
			return $stmt->get_result()->fetch_all(MYSQLI_ASSOC)[0]["config_value"];
		}
		public static function getFacebook(){
			$mysqli = DATABASE::Connect();
			$sql = "SELECT * FROM `config` WHERE `config_key`='facebook'";
			$stmt = $mysqli->prepare($sql);
			$stmt->execute();
			return $stmt->get_result()->fetch_all(MYSQLI_ASSOC)[0]["config_value"];
		}
		public static function getInstagram(){
			$mysqli = DATABASE::Connect();
			$sql = "SELECT * FROM `config` WHERE `config_key`='instagram'";
			$stmt = $mysqli->prepare($sql);
			$stmt->execute();
			return $stmt->get_result()->fetch_all(MYSQLI_ASSOC)[0]["config_value"];
		}
		public static function sendApplication($POST){
			$mysqli = DATABASE::Connect();
			$sql = "INSERT INTO `application` (`App_name`,`App_Mail`,`App_Phone`,`App_Code`,`App_Services`,`App_Driving_Experience`,`App_HowKnow`) VALUES (?,?,?,?,?,?,?);"; // SQL with parameters
			$stmt = $mysqli->prepare($sql);
			$stmt->bind_param("sssssss",$POST["name"],$POST["mail"],$POST["tel"],$POST["code"],$POST["services"],$POST["driving_experience"],$POST["contact_about_us"]); 
			$stmt->execute();
		}
	}
?>