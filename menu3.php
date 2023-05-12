<!DOCTYPE html>
<html lang="en">
 <head>
 <title>Foam</title>
 <link rel="stylesheet" type='text/css' href="style.css">
 <link rel="icon" type="image/png" href="glasses.ico" sizes="96x96">
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet"
href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
 </head>
 <style type ="text/css">


 .navbar {
  z-index:100;
  background-color: white;
  position: fixed;
  top: 0;
  width: 100%;
  box-shadow: 10px 10px grey;
}

.navbar a {
  float: left;
  display: block;
  color: #252fff;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}


.navbar a:hover {
  background: #ddd;
  color: black;
}

.main {
  padding: 16px;
  margin-top: 30px;
}


</style>

 <body onload="defaultElements()">
 <div class="container">
 <p align ="right" id="p_1">
 <?PHP session_start();
 ini_set('display_errors',0); // hide warning
 include("connectDB.php");
 $cnt_amount = 0;
 if(isset($_SESSION['userName'])) $username = $_SESSION['userName'];
 $sql2 = "select * from cart WHERE username = '$username'" or die("Error:" .
mysqli_error($conn));
 $result2 = mysqli_query($conn, $sql2);
 while($rs2 = mysqli_fetch_array($result2)){
 }
 //echo " ". $cnt_amount;
 if(!$result2) {echo "Can not Show Data"; }
 ?>
 </p>
</div>
 
 <div class="navbar">
  <img src ="pic/LogoWipWapShop.png" width="125px" valign="middle" align="left">
  <a href="foam.php"><b>หน้าแรก</b></a>
  <a href="order.php?username=<?PHP echo $username; ?>"><b>ประวัติการสั่งซื้อ</b></a>
 <a href="cart.php?username=<?PHP echo $username ?>&amount=<?PHP echo
$cnt_amount; ?> " ><b>( <?PHP
echo $cnt_amount; ?> ) ดูสินค้าในตะกร้า</b></a>
 <a href="article.php"><b>สาระน่ารู้</b></a>
<a style ="float: right;">
 <form name ="logout_form" method="get" action = "logout.php" align ="right">
 <button type="submit" class = "btn btn-danger">Logout</button>
 </form>
 <a style ="float: right;"><b>
 <?php  if(isset($_SESSION['userName'])) echo "สวัสดี : " . $_SESSION['userName'];
 ini_set('display_errors',0); // hide warning
 include("connectDB.php");
 ?></b></a>
</div>
 </body>
</html>