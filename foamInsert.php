<?php
 ini_set('display_errors',0); // hide warning
 include("connectDB.php");

 $f_name = $_POST['f_name'];
 $size = $_POST['size'];
 $mash = $_POST['mash'];
 if(isset($_POST['texture'])) $texture = $_POST['texture'];
 $file = $_FILES['pic']['name'];

 if($_FILES['pic']['error']>0) echo "Error:" . $_FILES['pic']['error'] . "<br/>";

 move_uploaded_file($_FILES['pic']['tmp_name'], "images/" . $_FILES['pic']['name']);

 $category = $_POST['category'];
 $price = $_POST['price'];
 $stock = $_POST['stock'];

 $sql = "Insert into foam (fname, price, size, mash, texture, picture, stock,ft_id)
 Values('$f_name','$price','$size','$mash', '$texture','$file', $stock,$category)";
 $rs = mysqli_query($conn, $sql);
 //echo "Add Product Successful";
 echo"<script>alert('เพิ่มข้อมูลสำเร็จ'); window.location='adminFoam.php';</script>";
 exit();
?>
