<?php session_start();
 ini_set('display_errors',0); // hide warning
 include("connectDB.php");

 if(isset($_SESSION['userName'])) $username = $_SESSION['userName'];
 $cart_id = $_GET['cart_id'];
 $cnt_amount = 0;
 $sql2 = "select * from cart WHERE username = '$username'" or die("Error:" . mysqli_error($conn));
 $result2 = mysqli_query($conn, $sql2);

 while($rs2 = mysqli_fetch_array($result2)){
 $cnt_amount = $cnt_amount + $rs2['amount'];
 }
 $cnt_amount = $cnt_amount-1;

 $sql = "Delete from cart WHERE cart_id = $cart_id";
 $rs = mysqli_query($conn, $sql);
 //echo "Delete Successful";
 echo"<script>alert('ลบรายการสำเร็จ');
window.location='cart.php?amount=$cnt_amount';</script>";
 exit();
?>