<?php session_start();
 ini_set('display_errors',0); // hide warning
 include("connectDB.php");

 $f_id = $_GET['f_id'];

 $sql1 = "Delete from foam WHERE f_id = $f_id";
 $rs1 = mysqli_query($conn, $sql1);
 if(!$rs1){ echo "ไม่สามารถลบสินค้าได้ เนื่องจากสินค้าอยู่ในรายการสั่งซื้อ"; }
 //echo "Delete Successful";
 else{echo"<script>alert('ลบสำเร็จ'); window.location='adminFoam.php';</script>";
 exit();}
?>