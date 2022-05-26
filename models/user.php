<?php 
	class USER
	{
		public static function Validator($login,$name,$password1,$password2,$mail,$phone){
			$error = array();
			$value = USER::userExists($login);
			$checkPassword = similar_text($password1, $password2, $perc);
			if ($value==false) {
				array_push($error, "Логін вже існує");
			} else if (strlen($login)<4) {
				array_push($error, "Не правильно введений логін");
			};
			if (strlen($name)<4||strlen($name)>255||(preg_match("/[a-z]/i",$name)&&preg_match("/[а-яієїґ]/i", $name))||preg_match("/[0-9]/i",$name)) {
				array_push($error, "Не правильно введене ім'я");
			};
			if (strlen($password1)<8||intval($perc)!=100||!(preg_match("/[0-9]/", $password1)&&preg_match("/[a-z]/", $password1)&&preg_match("/[A-Z]/", $password1))) {
				array_push($error, "Не правильні паролі");
			};
			if (!preg_match("/[@]/", $mail)||strlen($mail)<6) {
				array_push($error, "Не правильно введена електронна пошта");
			};
			if (strlen($phone)<10) {
				array_push($error, "Не правильно введений номер телефону");
			};
			return $error;
		}
		public static function updateUserInfo($post,$id){
			$mysqli = DATABASE::Connect();
			$sql = "UPDATE `users` SET `Username` = ?,`User_Name` = ?,`ADMIN` = ?,`Mail` = ?,`Phone` = ?,`LoginAttempts` = ? WHERE `User_ID` = ?";
			$stmt = $mysqli->prepare($sql); 
			$stmt->bind_param("ssissii",$_POST['username'],$_POST['name'],intval($_POST['isAdmin']),$_POST['mail'],$_POST['phone'],intval($_POST['loginAttempts']),intval($id));
			$stmt->execute();
		}
		public static function validatorUsersChange($post){
			$errors = [];
			if (strlen($_POST['username'])<4) {
				array_push($errors, "Не правильно введений логін");
			};
			if (strlen($_POST['name'])<4||strlen($_POST['name'])>255||(preg_match("/[a-z]/i",$_POST['name'])&&preg_match("/[а-яієїґ]/i",$_POST['name']))||preg_match("/[0-9]/i",$_POST['name'])) {
				array_push($errors, "Не правильно введене ім'я");
			};
			if (!preg_match("/[@]/", $_POST['mail'])||strlen($_POST['mail'])<6) {
				array_push($errors, "Не правильно введена електронна пошта");
			};
			if (strlen($_POST['phone'])<10) {
				array_push($errors, "Не правильно введений номер телефону");
			};
			
			return $errors;
		}
		public static function addUser($login,$name,$hashPassword,$mail,$phone,$loginAttempts){
			$mysqli = DATABASE::Connect();
			$sql = "INSERT INTO Users(Username,User_Name,Password,Phone,Mail,LoginAttempts) VALUES (?, ?, ?, ?, ?, ?)";
			$query = $mysqli->prepare($sql);
			$query->bind_param("sssssi", $login,$name,$hashPassword,$phone,$mail,$loginAttempts); 
			$query->execute();

			$_SESSION["reg"] = true;
			$_SESSION["auth"] = false;
			$mysqli->close( );

			header( 'Location: index.php?action=regSuccess' );
		}
		public static function userExists($login){
			$mysqli = DATABASE::Connect();
			$sql = "SELECT * FROM users WHERE Username = ?"; // SQL with parameters
			$stmt = $mysqli->prepare($sql); 
			$stmt->bind_param("s", $login);
			$stmt->execute();
			$result = $stmt->get_result(); // get the mysqli result
			$user = $result->fetch_assoc();
			if (mysqli_num_rows($result)>=1) {
				return false;
			} else {
				return true;
			}
		}
		public static function getUserByLogin($mysqli,$login){
			$sql = "SELECT * FROM users WHERE username = ?"; // SQL with parameters
			$stmt = $mysqli->prepare($sql); 
			$stmt->bind_param("s", $login);
			$stmt->execute();
			$result = $stmt->get_result();
			$user = $result->fetch_assoc();
			return $user;
		}
		public static function setLoginAttempts($canIAdd1ToAttempts,$username,$user){
			$_SESSION["login5Min"] = false;
			if ($canIAdd1ToAttempts==true) {
				$_SESSION["loginAttempts"]+=1;
			}
			$mysqli = DATABASE::Connect();
			$sql = "UPDATE users SET LoginAttempts = ? WHERE Username = ?"; // SQL with parameters
			$stmt = $mysqli->prepare($sql); 
			$stmt->bind_param("is", $_SESSION["loginAttempts"],$username);
			$stmt->execute();
			// $time = date_create($user["LastLoginAttempt"]);
			// var_dump($user["LastLoginAttempt"]);
			$timeOver5Min = date_create($user["LastLoginAttempt"]);
			date_add($timeOver5Min,date_interval_create_from_date_string("300 seconds"));
			date_default_timezone_set('Europe/Kiev');
			$nowDate = strtotime(date("Y-m-d H:i:s"));
			$timeOver5Min = strtotime(date_format($timeOver5Min,"Y-m-d H:i:s"));

			//  19 января 2038 03:14:07 UTC.

			if (round(($nowDate - $timeOver5Min) / 60,2) >= 5){
		       	$_SESSION["login5Min"] = true;
				$_SESSION["loginAttempts"] = 0;
				$sql = "UPDATE users SET LoginAttempts = ? WHERE username = ?"; // SQL with parameters
				$stmt = $mysqli->prepare($sql); 
				$stmt->bind_param("is", $_SESSION["loginAttempts"],$username);
				$stmt->execute();
		    } elseif (round(($nowDate - $timeOver5Min) / 60,2) < 5){
		       	$_SESSION["login5Min"] = false;
		    }
		}
		public static function updateLastLoginDate(){
			$_SESSION["lastLoginDate"] = date("Y-m-d H:i:s"); 
		}
		public static function loginError(){
			?>
			<div class="loginError">Невірний логін або пароль</div>
			<script>
				document.querySelector(".loginError").style.opacity = "1";
				setTimeout(()=>{
					window.location.href = "index.php?action=addUser";
				},2000)
			</script>
			<?php

		}
		public static function LOGIN($mysqli,$user){
			$_SESSION["ID"] = $user["User_ID"];
			$_SESSION["USERNAME"] = $user["Username"];
			if (intval($user["ADMIN"]) == 1) {
				$_SESSION["isAdmin"] = true;
			} else {
				$_SESSION["isAdmin"] = false;
			}
			$_SESSION["reg"] = true;
			$_SESSION["auth"] = true;
			$_SESSION["loginAttempts"] = 0;
			$_SESSION["login5Min"] = true;
			$sql = "UPDATE users SET LoginAttempts = ? WHERE username = ?"; // SQL with parameters
			$stmt = $mysqli->prepare($sql); 
			$stmt->bind_param("is", $_SESSION["loginAttempts"],$username);
			$stmt->execute();
			USER::updateLastLoginDate();
			header( 'Location: index.php?action=logSuccess' );
   			exit();
		}
	}	
?>