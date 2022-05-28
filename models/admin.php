<?php 
	class ADMIN
	{
		public static function getApplications(){
			$mysqli = DATABASE::Connect();
			$sql = "SELECT * FROM `application` ORDER BY `application`.`App_Checked` ASC, `application`.`App_DateTime` DESC";
			$stmt = $mysqli->prepare($sql);
			$stmt->execute();
			return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
		}
		public static function CheckApplicationById($id){
			$mysqli = DATABASE::Connect();
			$sql = "UPDATE `application` SET `application`.`App_Checked` = 1 WHERE `application`.`App_ID` = ?";
			$stmt = $mysqli->prepare($sql);
			$stmt->bind_param("i",$id);
			$stmt->execute();
		}
		public static function GetSettings(){
			$mysqli = DATABASE::Connect();
			$sql = "SELECT * FROM `config`";
			$stmt = $mysqli->prepare($sql);
			$stmt->execute();
			return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
		}
		public static function SetSettings($POST){
			$mysqli = DATABASE::Connect();

			$sql = "UPDATE `config` SET `config_value` = ? WHERE `config`.`config_id` = 1 ";
			$stmt = $mysqli->prepare($sql);
			$stmt->bind_param("s",$POST["phone1"]);
			$stmt->execute();
			
			$sql = "UPDATE `config` SET `config_value` = ? WHERE `config`.`config_id` = 2 ";
			$stmt = $mysqli->prepare($sql);
			$stmt->bind_param("s",$POST["phone2"]);
			$stmt->execute();

			$sql = "UPDATE `config` SET `config_value` = ? WHERE `config`.`config_id` = 3 ";
			$stmt = $mysqli->prepare($sql);
			$stmt->bind_param("s",$POST["fax"]);
			$stmt->execute();

			$sql = "UPDATE `config` SET `config_value` = ? WHERE `config`.`config_id` = 4 ";
			$stmt = $mysqli->prepare($sql);
			$stmt->bind_param("s",$POST["location"]);
			$stmt->execute();
			
			$sql = "UPDATE `config` SET `config_value` = ? WHERE `config`.`config_id` = 5 ";
			$stmt = $mysqli->prepare($sql);
			$stmt->bind_param("s",$POST["mail"]);
			$stmt->execute();

			$sql = "UPDATE `config` SET `config_value` = ? WHERE `config`.`config_id` = 6 ";
			$stmt = $mysqli->prepare($sql);
			$stmt->bind_param("s",$POST["facebook"]);
			$stmt->execute();

			$sql = "UPDATE `config` SET `config_value` = ? WHERE `config`.`config_id` = 7 ";
			$stmt = $mysqli->prepare($sql);
			$stmt->bind_param("s",$POST["instagram"]);
			$stmt->execute();

			$sql = "UPDATE `config` SET `config_value` = ? WHERE `config`.`config_id` = 8 ";
			$stmt = $mysqli->prepare($sql);
			$stmt->bind_param("s",$POST["siteDescription"]);
			$stmt->execute();
		}
		public static function SetUsername($POST){
			$mysqli = DATABASE::Connect();
			$sql = "UPDATE `users` SET `username` = ? WHERE `users`.`id` = 5";
			$stmt = $mysqli->prepare($sql);
			$stmt->bind_param("s",$POST["login"]);
			$stmt->execute();
			
			// $sql = "UPDATE `users` SET `password` = '?' WHERE `users`.`id` = 5";
			// $stmt = $mysqli->prepare($sql);
			// $password = password_hash($POST["password"], PASSWORD_BCRYPT, ['cost' => 12]);
			// $stmt->bind_param("s",$password);
			// $stmt->execute();
		}
		public static function GetUsername(){
			$mysqli = DATABASE::Connect();
			$sql = "SELECT `users`.`username` FROM `users` WHERE `users`.`id` = 5";
			$stmt = $mysqli->prepare($sql);
			$stmt->execute();
			return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
		}
		public static function GetPassword(){
			$mysqli = DATABASE::Connect();
			$sql = "SELECT `users`.`password` FROM `users` WHERE `users`.`id` = 5";
			$stmt = $mysqli->prepare($sql);
			$stmt->execute();
			return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
		}
		public static function returnToAdminHome(){
			?>
				<script>window.location.href = "index.php?action=admin"</script> 
			<?php 
		}
	}	
?>