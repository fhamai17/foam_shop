<!DOCTYPE html>
<html lang="en">
<link href='https://fonts.googleapis.com/css?family=Athiti' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type='text/css' href="table.css">
<head>
  <title>Admin-User Information</title>
  <link rel="stylesheet" type='text/css' href="style.css">
  <link rel="stylesheet" type="text/css" href="main.css" />
  <link rel="icon" type="image/png" href="glasses.ico" sizes="96x96">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="main.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

  <?PHP
  session_start();
  if ($_SESSION['userName'] == '') {
    echo "<script>alert('Please Login before Enter This Shop');
  window.location='index.html'</script>";
    exit();
  }
  include("menu.php");
  include("include_banner.html");
  ?>
  <br>
  <div class="container">
    <div class="row">
      <hr />
      <div class="col-sm-4">
      
      </div>
      <div class="col-sm-4" align="center">
        <p id="h1"><b>ข้อมูลผู้ใช้งาน</b></p>
      </div>

      <div class="col-sm-4">
        <h3 align="right" id="back"><a id="back" href="adminFoam.php?username=<?PHP echo$username; ?>">ย้อนกลับ</a></h3>
      </div>
    </div>
    <hr />
  </div>
  <?PHP
  $sql = "select * from user" or die("Error:" . mysqli_error($conn));
  $result = mysqli_query($conn, $sql);
  ?>
  <div  style="margin-right: 50px; margin-left: 50px;">
  <table width="100%" align="center" border="0" class="styled-table">
    <tr bgcolor="#d6f4fc" height="80">
      <th id="th">USER ID</th>
      <th id="th">ชื่อ</th>
      <th id="th">ที่อยู่</th>
      <th id="th">บัญชีผู้ใช้</th>
      <th id="th">รหัสผ่าน</th>
      <th id="th">อีเมลล์</th>
      <th id="th">สถานะ</th>
      <th colspan="2"></th>
    </tr>
    <?PHP
    while ($rs = mysqli_fetch_array($result)) {
    ?>
      <tr bgcolor="whitesmoke" height="50">
        <td>
          <font id="p3"><?PHP echo $rs['user_id']; ?> </font>
        </td>
        <td>
          <font id="p3"> <?PHP echo $rs['name']; ?> </font>
        </td>
        <td>
          <font id="p3"> <?PHP echo $rs['address']; ?> </font>
        </td>
        <td>
          <font id="p3"> <?PHP echo $rs['username']; ?> </font>
        </td>
        <td>
          <font id="p3"> <?PHP echo $rs['password']; ?> </font>
        </td>
        <td>
          <font id="p3"> <?PHP echo $rs['email']; ?> </font>
        </td>
        <td>
          <font id="p3"> <?PHP echo $rs['status']; ?> </font>
        </td>
        <td><a href="editFormUser.php?user_id=<?PHP echo $rs['user_id']; ?> "><button button style="width:75px" type="submit" class="btn btn-primary" /><span class="glyphicon glyphicon-pencil"></span> แก้ไข</button></td>
        <td><a href="delUser.php?user_id=<?PHP echo $rs['user_id']; ?> "><button style="width:75px" type="submit" class="btn btn-danger" /><span class="glyphicon glyphicon-trash"></span> ลบ</button></td>
      </tr>
    <?PHP
    }
    mysqli_close($conn);
    ?>
    </tr>
  </table>
  </div>
  <br><br>
  <?php include("include_footer.html") ?>
</body>

</html>