<?php session_start();
if ($_SESSION['userName'] == '' or !$_SESSION['guest'] == '') {
    echo "<script>alert('กรุณาเข้าสู่ระบบก่อนเข้าใช้งาน');
    window.location='index.html'</script>";
    exit();
  }
 ?>