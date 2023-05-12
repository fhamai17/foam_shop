<!DOCTYPE html>
<html lang="en">

 <head>
 <title>Admin Costume</title>
 <link rel="stylesheet" type='text/css' href="style.css">
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet"
href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
 </head>
 <style type ="text/css">
 a{
 color: #C8BEA1;
 font-size: 1.7em;
 }
 a:hover {
 text-decoration: underline;
 color: #EF9121;
 font-style: italic;
 }

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
 <p align ="right" id="p_1">
 <?PHP session_start();
 if($_SESSION['userName'] == '') {
 echo"<script>alert('กรุณาเข้าสู่ระบบก่อนใช้งาน');
window.location='index.html'</script>";
 exit();
 }
?>

 </p>

 <div class="navbar">
  <img src ="pic/LogoWipWapShop.png" width="125px" valign="middle" align="left">
  <b><a href="adminFoam.php">หน้าแรก</a>
  <a href="addFoam.php">เพิ่มข้อมูลโฟมล้างหน้า</a>
  <a href="ordersManagement.php">รายการสั่งซื้อ</a>
  <a href="userManagement.php">จัดการผู้ใช้งาน</a></b>
   <a style ="float: right;">
 <form name ="logout_form" method="get" action = "logout.php" align ="right">
 <button type="submit" class = "btn btn-danger">Logout</button>
 </form>
</a>
 <a style ="float: right;"><b><?php  if(isset($_SESSION['userName'])) echo "สวัสดี : " . $_SESSION['userName'];
 ini_set('display_errors',0); // hide warning
 include("connectDB.php");
 ?></b></a>
 <br>
</div>
 </body>
</html>