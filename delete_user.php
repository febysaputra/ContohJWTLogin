<?php
include('db_connect.php');
 $postdata = file_get_contents("php://input");
 $id="";
 if (isset($postdata)) {
     $request = json_decode($postdata);
     $id = $request->id;
 }

 $data = mysqli_query($connect, "DELETE FROM user WHERE id = $id");
 if($data){
 echo "User successfully removed!";
}else{
 echo "Upss Something wrong..";
}

?>