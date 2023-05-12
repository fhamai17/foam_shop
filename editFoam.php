<?php
 ini_set('display_errors',0); // hide warning
 include("connectDB.php");

 $f_id = $_POST['f_id'];
 $f_name = $_POST['f_name'];
 $mash = $_POST['mash'];
 $texture = $_POST['texture'];
 $size = $_POST['size'];
 $price = $_POST['price'];
 $stock = $_POST['stock'];
$category=$_POST['category'];
if($_FILES['pic']['name']!=""){
    $file = $_FILES['pic']['name'];
  }
  else{
    $file = $_POST['pic'];
  
  }
  
 if($_FILES["pic"]["error"]>0) {
 /* echo "Error:" . $_FILES["pic"]["error"] . "<br/>"; */
 } else {

 move_uploaded_file($_FILES["pic"]["tmp_name"], "images/" . $_FILES["pic"]["name"]);

 }

 $sql = "Update foam SET fname= '$f_name', mash='$mash', texture = '$texture', size = '$size'
 ,picture = '$file', price = $price, stock = $stock , ft_id =$category
 WHERE f_id = $f_id";
 $rs = mysqli_query($conn, $sql);
 if($rs){
 
 echo"<script>alert('อัปเดตสำเร็จ'); window.location='adminFoam.php';</script>";
 exit();
 }else{ echo"<script>alert('ไม่สามารถอัปเดตสินค้า'); window.location='adminFoam.php';</script>";
 exit(); }

?>
