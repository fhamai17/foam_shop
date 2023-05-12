<?php
ini_set('display_errors', 0); // hide warning
include("connectDB.php");

$userName = $_POST['userName'];
$passWord = $_POST['passWord'];
$name = $_POST['name'];
$address = $_POST['address'];
$email = $_POST['email'];
// check username
$sql_select = "select * from user where username='$userName'" or die("Error:" . mysqli_error());
$result = mysqli_query($conn, $sql_select);
$cnt = 0;
while ($rs = mysqli_fetch_array($result)) {
    $cnt++;
}
if ($cnt == 0) {
    $sql = "Insert into user (username, password, name, address,email, status)
Values('$userName','$passWord','$name','$address','$email','Customer')";
    $rs = mysqli_query($conn, $sql);
    //echo "Register Successful";
    echo "<script>alert('สมัครสมาขิกสำเร็จ');window.location='index.html'</script>";
    exit();
} else {
    echo "<script>alert('ชื่อผู้ใช้นี้มีอยู่แล้ว โปรดใช้ชื่ออื่น');window.location='regis_new.php'</script>";
    exit();
}
?>