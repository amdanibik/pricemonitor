<?php
    $HOST = "localhost";
	$USER = "root";
	$PASS = "1234Abcd";
	$DTBS = "prices";

	$connect = new mysqli($HOST,$USER,$PASS,$DTBS);
    $connect2 = new mysqli($HOST,$USER,$PASS,$DTBS);
    $connect3 = new mysqli($HOST,$USER,$PASS,$DTBS);
    if(mysqli_connect_errno()){
        echo "Failed to connect MySQL : ". mysqli_connect_errno();
        exit();
    }

   // echo "Success connect";
?>