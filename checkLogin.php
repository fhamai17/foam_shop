<?php session_start();
 ini_set('display_errors',0); // hide warning
 include("connectDB.php");

 $userName = $_POST['userName'];
 $passWord = $_POST['passWord'];
 $_SESSION['userName'] = $userName;
 $_SESSION['passWord'] = $passWord;

 $sql = "select * from user Where username ='$userName' and password = '$passWord'";
 $rs = mysqli_query($conn, $sql);
 $data = mysqli_fetch_array($rs);
 $_SESSION['user_type'] = $data['status'];
 if (isset($_SESSION['user_type'])) {
 echo "This var is set so I will print.";
 if($data['status'] == "Admin"){
 header("Location: adminFoam.php");
 }
 else if($data['status'] == "Customer"){
 header("Location: foam.php");
 }
 else{
 //echo "Incorrect UserName or Password. Please Try again or Enter with Guest.";
 echo"<script>alert('ชื่อผู้ใช้ หรือรหัสผ่านไม่ถูกต้อง กรุณาลองอีกครั้ง');
window.location='index.html'</script>";
 exit();
 }
 }else{
echo "ชื่อผู้ใช้ หรือรหัสผ่านไม่ถูกต้อง<br>กรุณาลองอีกครั้ง";
 echo"<script>alert('ชื่อผู้ใช้ หรือรหัสผ่านไม่ถูกต้อง กรุณาลองอีกครั้ง');
window.location='index.html'</script>";
 exit();
 }
?>
