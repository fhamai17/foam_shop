<!DOCTYPE html>
<html lang="en">
<head>
    <title>Place Order</title>
    <link rel="stylesheet" type='text/css' href="style.css">>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <?PHP session_start();
       if ($_SESSION['userName'] == '') {
        echo "<script>alert('กรุณาเข้าสู่ระบบก่อนใช้งาน');
        window.location='index.html'</script>";
        exit();
    }
    include("include_banner.html");
    ini_set('display_errors', 0); // hide warning
    include("connectDB.php");
    include("menu3.php");
    ?>
    <div class="container">
            <?PHP session_start();
            $_SESSION['refresh'] = 0;
            if (isset($_SESSION['userName'])) $username = $_SESSION['userName'];
            ?>
            <hr/>
        <div class="row">
            <div class="col-sm-4">
            </div>
            <div class="col-sm-4">
            <p id="h1" align="center"><b>สรุปข้อมูลการสั่งซื้อสินค้า</b></p>
            </div>
            <div class="col-sm-4">
                <h3 align="right" id="back"><a id="back" href="foam.php?username=<?PHP echo
                                                                                    $username; ?>">ย้อนกลับ</a></h3>
            </div>
        </div><hr/>
    </div>
    <?php
    $c_id = $_REQUEST['f_id'];
    $date_order = $_REQUEST['date_order'];
    $amount = $_REQUEST['amount'];
    $total = $_REQUEST['total'];
    $order_status = $_REQUEST['order_status'];
    $card_number = $_REQUEST['card_number'];

    $i = 0;
    $j = 0;
    $array_c_name = array();
    $array_amount = array();
    $array_total = array();
    $array_price = array();

    $sql = "select * from cart inner join foam on cart.f_id = foam.f_id and cart.username =
'$username'" or die("Error:" . mysqli_error($conn));
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        echo "Can not Show Data";
    }
    $total = 0;
    ?>
    <br>
    <div style="margin-right: 50px; margin-left: 50px;">
    <table width="100%" align="center">
        <tr bgcolor="#d6f4fc" height="50">
            <th></th>
            <th id="th">ชื่อสินค้า</th>
            <th id="th">ส่วนผสม</th>
            <th id="th">เหมาะสำหรับ</th>
            <th id="th">
                จำนวน</th>
            <th id="th">ราคา</th>
            <th id="th">ราคารวม</th>
        </tr>
        <?PHP
        while ($rs = mysqli_fetch_array($result)) {
        ?>
            <tr bgcolor="whitesmoke" height="200">
                <td>
                    <font id="p3"> <img src="<?PHP echo "images/" . $rs['picture']; ?>" height="150" width="150"> </font>
                </td>
                <td>
                    <font id="p3"> <?PHP echo $rs['fname']; ?> </font>
                </td>
                <td>
                    <font id="p3"> <?PHP echo $rs['mash']; ?> </font>
                </td>
                <td>
                    <font id="p3"> <?PHP echo $rs['texture']; ?> </font>
                </td>
                <td>
                    <font id="p3"> <?PHP echo $rs['amount']; ?> </font>
                </td>
                <td>
                    <font id="p3"> <?PHP echo $rs['price']; ?> </font>
                </td>
                <td>
                    <font id="p3"> <?PHP echo $rs['total']; ?> </font>
                </td>
            </tr>
        <?PHP
            $array_c_id[$i] = $rs['f_id'];
            $array_c_name[$i] = $rs['fname'];
            $array_amount[$i] = $rs['amount'];
            $array_total[$i] = $rs['total'];
            $array_price[$i] = $rs['price'];
            $array_stock[$i] = $rs['stock'];
            $total = $total + $rs['total'];
            $i++;
        }
        ?>
        <tr style="font-size:1.4em;font-weight: bold;" >
            <td colspan="6" style="text-align:right;">
                <p id="b1"><?PHP echo "ราคาทั้งหมด : "; ?></p>
            </td>
            <td>
            <p id="b1"><?PHP echo number_format($total) . " บาท"; ?></p>
            </td>
        </tr>
    </table>
    </div>
    <br><br>
    <?PHP
    // select the last order id from orders
    $sql_statement = "SELECT * FROM orders where username='$username' order by o_id desc LIMIT
1";
    $result2 = mysqli_query($conn, $sql_statement);
    if ($result2) echo $o_id;
    while ($r2 = mysqli_fetch_array($result2)) {
        $o_id = $r2['o_id'];
        echo $r2['o_id'];
    }
    // insert to orders
    if ($i > 0) {
        for ($j = 0; $j < $i; $j++) {
            $sql_insert = "Insert into orders (o_id, f_id, fname, username, date_order, price,
amount, total, card_number, order_status)
Values($o_id+1, $array_c_id[$j], '$array_c_name[$j]', '$username', '$date_order',
$array_price[$j], $array_amount[$j], $array_total[$j], '$card_number', 'จ่ายเงินแล้ว')";
            $rs2 = mysqli_query($conn, $sql_insert);
            if (!$rs2) echo "ไม่สามารถเพิ่มลง: $o_id";

            // update clothing cal amount of stock
            $sql_Update = "Update foam SET stock=$array_stock[$j]-$array_amount[$j] WHERE f_id
= $array_c_id[$j]";
            $rs_Update = mysqli_query($conn, $sql_Update);
            //if($rs_Update){
            // echo "<script>alert('Update Successful'); </script>";
            //}
        }
        echo "<script>alert('อัปเดตสำเร็จ'); </script>";
        // delete on cart where username = $username after placed orders
        $sql_delete = "Delete from cart WHERE username = '$username'";
        if ($j > 0) {
            $rs3 = mysqli_query($conn, $sql_delete);
            if (!$rs3) echo "ไม่สามารถลบได้";
        }
    }
    ?>
    <br><br>
    <?PHP
    include("include_footer.html");
    ?>
</body>

</html>