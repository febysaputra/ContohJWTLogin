##Catatan
-jwt disni bisa diganti dengan id user
-sehingga di read_user.php lakukan pengecekan id di table user setiap melakukan request
untuk memastikan user tersebut telah melakukan login.
####


1. untuk login ada di file login.php
2. untuk contoh pengambilan data dari login di read_user.php

##pada file read_user.php

//sederhananya
//ini bisa ditaro di params
$data = json_decode(file_get_contents("php://input")); //ini buat ambil data token yang disimpan di frontend

