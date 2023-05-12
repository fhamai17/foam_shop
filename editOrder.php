<?php 
 ini_set('display_errors',0); // hide warning
 include("connectDB.php");

 $o_id = $_GET['o_id'];
 $order_status = $_GET['order_status'];
 $username = $_GET['username'];

 $sql = "Update orders SET order_status = '$order_status' WHERE o_id = $o_id and username ='$username'";
 $rs = mysqli_query($conn, $sql);
 if($rs){
 echo"<script>alert('อัปเดตสำเร็จ'); window.location='ordersManagement.php';</script>";
 exit();
 }else{ echo"<script>alert('ไม่สามารถอัปเดต'); window.location='ordersManagement.php';</script>";
 exit(); }
?>