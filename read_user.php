<?php
	include 'db_connect.php';
	include_once 'libs/php-jwt-master/src/BeforeValidException.php';
	include_once 'libs/php-jwt-master/src/ExpiredException.php';
	include_once 'libs/php-jwt-master/src/SignatureInvalidException.php';
	include_once 'libs/php-jwt-master/src/JWT.php';
	use \Firebase\JWT\JWT;

	// if jwt is not empty
	// get posted data
$data = json_decode(file_get_contents("php://input"));
$key = "inikeybuatjwtnya";
 
// get jwt
$jwt=isset($data->jwt) ? $data->jwt : "";

if($jwt){
 
    // if decode succeed, show user details
    try {
        // decode jwt
        $decoded = JWT::decode($jwt, $key, array('HS256'));
 
 		$id = $decoded->id;
        // set response code
        http_response_code(200);
 
        $query = mysqli_query($connect,"SELECT * FROM user WHERE id = '$id'");

		$result=mysqli_fetch_assoc($query);

		$data=array(
			'message'=>'Get Data Success',
			'data'=>$result,
			'status'=>'200'
		);
		echo json_encode($data); 
    }
    catch (Exception $e){
    	$data=array(
			'message'=>'Invalid token',
			'status'=>false
		);
		echo json_encode($data); 
    }
 	
}
 
?>