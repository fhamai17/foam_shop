<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add to Cart</title>
    <link rel="stylesheet" type='text/css' href="style.css">
    <link rel="stylesheet" type='text/css' href="table.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<script>
    function defaultElements() {
        document.getElementById('CD_Number').style.display = "none";
    }

    function selectPaymentMethod() {
        var p = document.getElementById('Payment_Method').value;
        if (p == "Credit/Debit") {
            document.getElementById('CD_Number').style.display = "inline";
        } else {
            document.getElementById('CD_Number').style.display = "none";
        }
    }
</script>

<body onload="defaultElements()">
    <?PHP
    include("menu2.php");
    include("include_banner.html");
    
    ?>
    <div class="container">
        <hr/>
        <div class="row">
            <div class="col-sm-4">
            </div>
            <div class="col-sm-4">
                <p id="h1" align="center"><b>สินค้าในตะกร้า</b></p>
            </div>
            <div class="col-sm-4">
                <h3 align="right" id="back"><a id="back" href="foam.php?username=<?PHP echo
                                                                                $username; ?>">ย้อนกลับ</a></h3>
            </div>
        </div><hr/>
    </div>
    <?PHP
    $c_id = $_REQUEST['f_id'];
    if (isset($_SESSION['userName'])) $username = $_SESSION['userName'];
    if (isset($_SESSION['guest'])) $username = $_SESSION['guest'];
    $cnt = $_REQUEST['cnt'];
    $mash = $_REQUEST['mash'];
    $texture = $_REQUEST['texture'];
    $price = $_REQUEST['price'];
    $total = $cnt * $price;
    $refresh = $_REQUEST['cart'];
    $amount = $_REQUEST['amount'];

    if ($amount == 0) {
        echo "<p align='center' id='b1'>ไม่มีสินค้าในตะกร้า !</p>";
    } else {
        $sql = "select * from cart inner join foam on cart.f_id = foam.f_id and cart.username
= '$username'" or die("Error:" . mysqli_error($conn));
        $result = mysqli_query($conn, $sql);
        if (!$result) {
            echo "Can not Show Data";
        }
        $total = 0;
    ?><div style="margin-right: 50px; margin-left: 50px;">
        <table width="100%" align="center" class="styled-table">
            <tr bgcolor="#d6f4fc" height="50">
                <th id="th"></th>
                <th id="th">ชื่อสินค้า</th>
                <th id="th">ส่วนผสม</th>
                <th id="th">เหมาะสำหรับ</th>
                <th id="th">จำนวน</th>
                <th id="th">ราคา</th>
                <th id="th">ราคารวม</th>
                <th colspan="2"></th>
            </tr>
            <?PHP
            while ($rs = mysqli_fetch_array($result)) {
            ?>
                <tr bgcolor="whitesmoke" height="200" width="100%">
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
                    <td><a class="btn btn-danger" href="delUserOrder.php?cart_id=<?PHP echo $rs['cart_id']; ?>&amount=<?PHP
                                                                                                echo $rs['amount']; ?> " ><span class="glyphicon glyphicon-trash"></span></td>
                </tr>
            <?PHP
                $total = $total + $rs['total'];
            }
            ?>
        </table>
        </div>
        <div class="container"><p align="center" id="p1"><?PHP echo "<b>กรุณาชำระเงิน<br>ราคารวมทั้งหมด: </b>"; ?><?PHP echo "<b>".number_format($total) . " บาท</b>"; ?></p></div>
        <table align="center">
            <tr height="70">
                <td>
                    <p id="p1"><b>Credit/Debit Number :&nbsp;&nbsp;&nbsp;&nbsp;</b></p>
                </td>
                <form name="placeOrder" action="placeOrder.php" method="GET">
                    <td><input type="text" name="card_number" class="form-control" required>
                    </td>                
                    <td align="right">
                    <form name="placeOrder" action="placeOrder.php" method="GET">
                        <input type="hidden" name="username" value="<?PHP echo $username;
                                                                    ?>" />
                        <input type="hidden" name="date_order" value="<?PHP echo date("Y-m-d H:i:s"); ?>" />
                        <input type="hidden" name="total" value="<?PHP echo $total; ?>" />
                        <input type="hidden" name="order_status" value="placed" />&nbsp;&nbsp;&nbsp;
                        <button type="submit" class="btn btn-info" ><b>ยืนยันการสั่งซื้อ</b></button>
                    </form>
                </td>
            </tr>
        </table>
        <br><br>
    <?PHP }
    mysqli_close($conn);
    include("include_footer.html");
    ?>
</body>

</html>