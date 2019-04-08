<?php

  include 'db_connect.php';

    $postdata = file_get_contents("php://input");
    $name = "";
    $age ="";
    $address = "";
    $privilage = "";

    if (isset($postdata)) {
        $request = json_decode($postdata);
        $name = $request->name;
        $age = $request->age;
        $address = $request->address;
        $privilage = $request->privilage;

        //ini buat cek apakah JSON ada isisnya atau tidak
        if($request){
            $query_register = mysqli_query($connect,"INSERT INTO user (name, age, address, privilage) VALUES ('$name', '$age', '$address', '$privilage') ");

            if($query_register){
         
                 $data =array(
                     'message' => "Register Success!",
                     'status' => "200"
                 );
             }
             else {
                 $data =array(
                     'message' => "Register Failed!",
                     'status' => "404"
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