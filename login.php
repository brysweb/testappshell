<?php
require("config.php");

//print_r($_POST); exit();
if(empty($_POST['username'])) die("Username required");
if(empty($_POST['password'])) die("Password required");	
//if(empty($_POST['name'])) die("First name required");	
//if(empty($_POST['email'])) die("email required");	
    
	$username = $_POST['username'];
	$password = $_POST['password'];
	//$name = $_POST['name'];
	//$email = $_POST['email'];
	$hash = md5($password);
	
  
	

	$query = "SELECT ID, username, name, email FROM users WHERE username = :username AND password = :password";
		$query_params = array(':username' => $username, ':password' => $hash);
	//	print_r($_POST); exit();
		

    try { 
        $stmt = $db->prepare($query); 
        $result = $stmt->execute($query_params); 
		
			$outData = array();
			while($row = $stmt->fetch()) {
				$outData[] = $row;
		} 
		//echo json_encode($outData);
			echo '{"user":' . json_encode($outData) . '}'; 
			exit();
    } catch(PDOException $ex){ 
			http_response_code(500);
			echo json_encode(array(
				'error' => array(	
				'msg' => 'Error on select user: ' . $ex->getMessage(),
				'code' => $ex->getCode(),
				),
			));
			exit();
		}
//  require("config.php");

 
//  if(empty($_POST['username'])) die("Username required");
//  if(empty($_POST['password'])) die("Password required");	
 
		 
// 	 $username = $_POST['username'];
// 	 $password = $_POST['password'];
// 	 //$email = $_POST['email'];
// 	 $hash = md5($password);

 
// 	 $query = "SELECT 1 FROM users WHERE username = :username AND password = :password";
// 		 $query_params = array(':userName' => $username,':password' => $hash);
// 		 //print_r($query_params + $query_paramses ); exit();

// 		 $row = $stmt->fetch(); 
// 		 if($row) { 

// 			$query = "SELECT ID, username, name, email FROM users WHERE username = :userName AND password = :password";
// 			$query_params = array(':userName' => $username,':password' => $hash);

// 					try { 
// 						$stmt = $db->prepare($query); 
// 						$result = $stmt->execute($query_params); 
				
// 				$outData = array();
// 				while($row = $stmt->fetch()) {
// 					$outData[] = $row;
// 				} 
// 				//echo json_encode($outData);
// 				echo '{"user":' . json_encode($outData) . '}'; 
// 				exit();
// 				} catch(PDOException $ex){ 
// 				http_response_code(500);
// 				echo json_encode(array(
// 					'error' => array(	
// 					'msg' => 'Error on select user: ' . $ex->getMessage(),
// 					'code' => $ex->getCode(),
// 					),
// 				));
// 				exit();
// 				} 

// 			} 	else	{
// 					//die("This username address is already registered"); 
// 					// setup reset password button and sent password via email
// 					//echo "0 .This username is already registered"; // for failure
// 					http_response_code(500);
// 					echo json_encode(array(
// 								'error' => array(
// 								'msg' => 'Invalid Login;',
// 								),
// 						)); /*. $ex->getMessage(),*/
// 						exit();

// 			}


?>



