<?php session_start();
 ini_set('display_errors',0); // hide warning
 include("connectDB.php");

 if(isset($_SESSION['userName'])) $username = $_SESSION['userName'];
 if(isset($_SESSION['guest'])) $username = $_SESSION['guest'];

 $f_id = $_REQUEST['f_id'];
 $price = $_REQUEST['price'];
 $size = $_REQUEST['size'];
 $amount = $_REQUEST['amount'];
 $total = $price*$amount;


 $sql = "INSERT INTO cart (f_id, username, price, size, amount, total)
 Values($f_id,'$username', $price,'$size', $amount, $total)";
 $rs = mysqli_query($conn, $sql);

 //echo "Add to Cart Successful";
 echo"<script>alert('หยิบลงตะกร้าสำเร็จ'); window.location='foam.php'</script>";
 exit();
?>
