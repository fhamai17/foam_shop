<?php session_start();
 ini_set('display_errors',0); // hide warning
 include("connectDB.php");

 $o_id = $_GET['o_id'];
 $username = $_GET['username'];

 $sql = "Delete from orders WHERE o_id = $o_id And username = '$username' ";
 $rs = mysqli_query($conn, $sql);
 //echo "Delete Successful";
 echo"<script>alert('ลบรายการสั่งซื้อสินค้าสำเร็จ');window.location='ordersManagement.php'</script>";
 exit();
?>