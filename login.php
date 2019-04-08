<?php
	include 'db_connect.php';
	include_once 'libs/php-jwt-master/src/BeforeValidException.php';
	include_once 'libs/php-jwt-master/src/ExpiredException.php';
	include_once 'libs/php-jwt-master/src/SignatureInvalidException.php';
	include_once 'libs/php-jwt-master/src/JWT.php';
	use \Firebase\JWT\JWT;

	$postdata = file_get_contents("php://input", true);
	
	if (isset($postdata)) {
		$request = json_decode($postdata);

		$name = $request->name; //anggap username
		$age = $request->age; //anggap password

		$query = mysqli_query($connect,"SELECT * FROM user WHERE name = '$name' AND age = '$age'");

		$result=mysqli_fetch_assoc($query);

		//JWT
		$object=array(
			'id' => $result["id"],
			'name' => $result["name"], 
			'age' => $result["age"]
		);

		$key = "inikeybuatjwtnya";
		header('Content-type: application/json');
		$token = JWT::encode($object, $key);

		//setheader
		header("token: '$token'");

		$data=array(
			'message'=>'Get Data Success',
			'token'=>$token,
			'status'=>'200'
		);


		echo json_encode($data);
	}
?>