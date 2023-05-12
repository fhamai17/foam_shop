<!DOCTYPE html>
<html lang="en">

<head>
    <title>Orders Information</title>
    <link rel="stylesheet" type='text/css' href="style.css">
    <link rel="stylesheet" type='text/css' href="table.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <?PHP 
    include("include_banner.html");
    include("menu2.php")
    ?>
  
    <div class="container">
       <hr/>
        <div class="row">
            <div class="col-sm-4">
                
            </div>
            <div class="col-sm-4">
                <p id="h1" align="center"><b>ประวัติการสั่งซื้อสินค้า</b></p>
            </div>
            <div class="col-sm-4">
                <h3 align="right" id="back"><a id="back" href="foam.php?username=<?PHP echo
                                                                                $username; ?>">ย้อนกลับ</a></h3>
            </div>
        </div>   <hr/>
    </div>
    <?PHP
    include("connectDB.php");
    $sql = "select o_id, date_order, sum(amount), sum(total), order_status
 from orders WHERE username = '$username' Group by o_id, date_order" or die("Error:"
        . mysqli_error($conn));
    $result = mysqli_query($conn, $sql);
    ?>
    <div style="margin-right: 50px; margin-left: 50px;">
    <table width="100%" align="center" border="0" class="styled-table">
        <tr bgcolor="#d6f4fc" height="50">
            <th id="th">ลำดับการสั่งซื้อ</th>
            <th id="th">วันที่ทำการสั่งซื้อ</th>
            <th id="th">จำนวน</th>
            <th id="th">ยอดรวม</th>
            <th id="th">สถานะการสั่งซื้อ</th>
            <th colspan="2"></th>
        </tr>
        <?PHP
        while ($rs = mysqli_fetch_array($result)) {
        ?>
            <tr bgcolor="whitesmoke" height="50">
                <td>
                    <font id="p3"><?PHP echo $rs['o_id']; ?> </font>
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
                <td><button class="btn btn-info"><a href="viewOrder.php?o_id=<?PHP echo $rs['o_id']; ?>&username=<?PHP echo
                                                                                    $username; ?>" id="w_normal">ดูรายละเอียด</td></button>
            </tr>
        <?PHP
        }
        mysqli_close($conn);
        ?>
    </table>
    </div>
    <br><br>
    <?PHP
    include("include_footer.html");
    ?>
</body>

</html>