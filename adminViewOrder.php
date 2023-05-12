<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin-Order Details</title>
    <link rel="stylesheet" type='text/css' href="style.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <?PHP
    include("menu.php");
    include("include_banner.html");
    ?>
    <br>
    <div class="container">
        <?PHP
        $o_id = $_REQUEST['o_id'];
        ?>
        <div class="row">
            <hr/>
            <div class="col-sm-4">
                <p id="h1">ประวัติการสั่งซื้อสินค้า </p>
            </div>
            <div class="col-sm-4">
                <p id="h1">รายการสินค้า [ #<?PHP echo $o_id; ?> ]</p>
            </div>
            
            <div class="col-sm-4">
                <h3 align="right" id="back"><a id="back" href="ordersManagement.php
 ">ย้อนกลับ</a></h3>
            </div>
        </div><hr/>
    </div>
    <?PHP
    include("connectDB.php");
    $o_id = $_REQUEST['o_id'];
    $sql = "select * from orders Where o_id = $o_id" or die("Error:" . mysqli_error($conn));
    $result = mysqli_query($conn, $sql);
    ?>
    <div style="margin-right: 50px; margin-left: 50px;">
    <table width="100%" align="center" class="styled-table">
        <tr bgcolor="#d6f4fc" height="50">
            <th id="th">ชื่อสินค้า</th>
            <th id="th">วันที่สั่งสินค้า</th>
            <th id="th">ราคา</th>
            <th id="th">จำนวน</th>
            <th id="th">ยอดรวม</th>
        </tr>
        <?PHP
        while ($rs = mysqli_fetch_array($result)) {
        ?>
            <tr bgcolor="whitesmoke" height="80">
                <td>
                    <font id="p3"> <?PHP echo $rs['fname']; ?> </font>
                </td>
                <td>
                    <font id="p3"> <?PHP echo $rs['date_order']; ?> </font>
                </td>
                <td>
                    <font id="p3"> <?PHP echo $rs['price']; ?> </font>
                </td>
                <td>
                    <font id="p3"> <?PHP echo $rs['amount']; ?> </font>
                </td>
                <td>
                    <font id="p3"> <?PHP echo $rs['total']; ?> </font>
                </td>
            </tr>
        <?PHP
        }
        mysqli_close($conn);
        ?>
    </table>
    </div>
    <br><br><br>
    <?PHP
    include("include_footer.html");
    ?>
</body>

</html>