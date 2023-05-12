<!DOCTYPE html>
<html lang="en">
<link href='https://fonts.googleapis.com/css?family=Athiti' rel='stylesheet' type='text/css'>

<head>
  <title>Admin-Orders Information</title>
  <link rel="stylesheet" type='text/css' href="style.css">
  <link rel="icon" type="image/png" href="glasses.ico" sizes="96x96">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="main.css" />
  <link rel="stylesheet" type='text/css' href="table.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<style type="text/css">
  a {
    color: #C8BEA1;
    font-family: Athiti, serif;
    font-size: 1.7em;
  }

  a:hover {
    text-decoration: underline;
    color: #EF9121;
    font-style: italic;
  }

  .footer {
    bottom: 0;
    width: 100%;
  }
</style>

<body>

  <?PHP session_start();
     if ($_SESSION['userName'] == '') {
      echo "<script>alert('กรุณาเข้าสู่ระบบก่อนใช้งาน');
      window.location='index.html'</script>";
      exit();
  }
  include("menu.php");
  include("include_banner.html");
  ?><br>

  
<div class="container">
       <hr/>
        <div class="row">
            <div class="col-sm-4">
                
            </div>
            <div class="col-sm-4">
                <p id="h1" align="center"><b>รายการสั่งซื้อสินค้า</b></p>
            </div>
            <div class="col-sm-4">
                <h3 align="right" id="back" ><a id="back" href="adminFoam.php">ย้อนกลับ</a></h3>
            </div>
        </div>   <hr/>
    </div>
   
  <?PHP
  include("connectDB.php");
  $sql = "select o_id, username, date_order, sum(amount), sum(total), order_status
 from orders Group by o_id, date_order,username order by date_order " or die("Error:" . mysqli_error($conn));
  $result = mysqli_query($conn, $sql);
  ?>
  <div  style="margin-right: 50px; margin-left: 50px;">
  <table width="100%" align="center" border="0"  class="styled-table">
    <tr bgcolor="#d6f4fc" height="80">
      <th id="th">ลำดับ</th>
      <th id="th">ลำดับคำสั่งซื้อ</th>
      <th id="th">บัญชีผู้ใช้</th>
      <th id="th">วันที่ทำการสั่งซื้อ</th>
      <th id="th">จำนวน</th>
      <th id="th">ยอดรวม</th>
      <th id="th">สถานะการสั่งซื้อ</th>
      <th id="th">เปลี่ยนการตั้งค่า</th>
      <th colspan="4"></th>
    </tr>
    <?PHP $num=1;
    while ($rs = mysqli_fetch_array($result)) {
     
    ?>
    
      <tr bgcolor="" height="50">
      <td>
          <font id="p3"><?PHP echo $num ?> </font>
        </td>
        <td> 
          <font id="p3"><?PHP echo $rs['o_id']; ?> </font>
        </td>
        <td>
          <font id="p3"> <?PHP echo $rs['username']; ?> </font>
        </td>
        <td>
          <font id="p3"> <?PHP echo $rs['date_order']; ?> </font>
        </td>
        <td>
          <font id="p3"> <?PHP echo $rs['sum(amount)']; ?> </font>
        </td>
        <td>
          <font id="p3"> <?PHP echo $rs['sum(total)']; ?> </font>
        </td>
        <td>
          <font id="p3"> <?PHP echo $rs['order_status']; ?> </font>
        </td>
        
        <form name="editOrder_form" method="get" action="editOrder.php">
        <input type="hidden" name="username" value=<?PHP echo $rs['username']; ?> />
          <input type="hidden" name="o_id" value=<?PHP echo $rs['o_id']; ?> />
          <td>
            <font id="t1"> <select name="order_status" id="order_status">
                <option value="จ่ายเงินแล้ว"<?PHP if($rs['order_status']=='จ่ายเงินแล้ว'){echo "selected";}else{ echo "";}  ?>>จ่ายเงินแล้ว</option>
                <option value="จัดเตรียมสินค้า"<?PHP if($rs['order_status']=='จัดเตรียมสินค้า'){echo "selected";}else{ echo "";}  ?>>จัดเตรียมสินค้า</option>
                <option value="อยู่ระหว่างการส่ง"<?PHP if($rs['order_status']=='อยู่ระหว่างการส่ง'){echo "selected";}else{ echo "";}  ?>>อยู่ระหว่างการส่ง</option>
                <option value="ส่งแล้ว"<?PHP if($rs['order_status']=='ส่งแล้ว'){echo "selected";}else{ echo "";}  ?>>ส่งแล้ว</option>
              </select> </font>
          </td>
          <td><button button style="width:75px" type="submit" class="btn btn-success" /><span class="glyphicon glyphicon-check"></span> อัปเดต</button></td>
        </form>
        <form name="del_form" method="get" action="delOrder.php">
          <input type="hidden" name="o_id" value=<?PHP echo $rs['o_id']; ?> />
          <input type="hidden" name="username" value=<?PHP echo $rs['username']; ?> />
          <td><button style="width:75px" type="submit" class="btn btn-danger"/><span class="glyphicon glyphicon-trash"></span> ลบ</button></td>
        </form>
        <td><a class="btn btn-info" href="adminViewOrder.php?o_id=<?PHP echo $rs['o_id']; ?> " id="w_normal2">ดูรายละเอียด</a></td>
      </tr>
    <?PHP
   $num+=1; 
    }
    mysqli_close($conn);
    ?>
  </table>
  </div>
  <br><br>
  <?php include("include_footer.html") ?>
</body>

</html>