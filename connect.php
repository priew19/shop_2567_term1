<?php
    $host= "localhost";
    $user = "root";
    $pw = "";
    $db = "shop";
    $conn = new mysqli($host,$user,$pw,$db);
    //$conn = new mysqli("localhost","root","","shop")
    
    if ($conn->connect_error){
        die("connect fail: " . $conn->connect_error );
    }
    echo"Connect Successfully";
    mysqli_set_charset($conn, "utf8");
?>