<?php
 $hostName = "it2.sut.ac.th";
 $userName = "php63_g7";
 $passWord = "6724400";
 $dbName = "php63_g7";
 $conn = mysqli_connect($hostName, $userName, $passWord, $dbName);
 mysqli_set_charset($conn, "utf8");
 if(mysqli_connect_error()){
 echo "Connect falied : " .mysqli_connect_error();
 }else{
 //echo "Connect Successfully." ;
 }
?>