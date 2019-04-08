<?php

  include 'db_connect.php';

    $postdata = file_get_contents("php://input");
    $name = "";
    $age ="";
    $address = "";
    $id = "";

    if (isset($postdata)) {
        $request = json_decode($postdata);
        $id = $request->id;
        $name = $request->name;
        $age = $request->age;
        $address = $request->address;

        if($request){
            $query_register = mysqli_query($connect,"UPDATE user SET name = '$name', age = '$age', address = '$address' WHERE id = '$id'");

            if($query_register){
         
                 $data =array(
                     'message' => "Update Data Success!",
                     'status' => "200"
                 );
             }
             else {
                 $data =array(
                     'message' => "Update Data Failed!",
                     'status' => "404",
                 ); 
             }
        }
        else{
            $data =array(
                'message' => "No Data!",
                'status' => "503"
            ); 
        }
        
            

        echo json_encode($data);
    }
?>