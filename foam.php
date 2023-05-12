<!DOCTYPE html>
<html lang="th">
<html lang="en">

<head>
  <title>Foam</title>
  <link rel="stylesheet" type='text/css' href="style.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<script>
  function defaultElements() {
    document.getElementById('ft_id').style.display = "none";
  }

  function selectCategory() {
    var c = document.getElementById('type_search').value;
    if (c == 'ft_id') {
      document.getElementById('ft_id').style.display = "inline";
      document.getElementById('searching').style.display = "none";
    } else {
      document.getElementById('ft_id').style.display = "none";
      document.getElementById('searching').style.display = "inline";
    }
  }

</script>
<style>
  .navbar {
    z-index: 100;
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
<body onload="defaultElements()" >
  <?PHP
  include("session.php");
  include("include_banner.html");
  ?>
  <div>
    <hr />
    <h2 id="h1" align="center"><b>โฟมล้างหน้า</b></h2>
    <hr />
  </div> <br>
  <form name='search' action="" method="get">
    <table align="center" width="1100" border="0">
      <tr>
        <td width="20">
          </p>
        </td>
        <td width="360">
          <p align="right" id="t1"><b>ค้นหาสินค้าจาก: &nbsp;&nbsp;</b></p>
        </td>
        <td width="80">
          <p id="t1">
            <select name="type_search" id="type_search" class="select-css" onchange="selectCategory()">
              <option value="fname">ชื่อสินค้า</option>
              <option value="ft_id">ประเภทสินค้า</option>
              <option value="mash">ส่วนผสม</option>
              <option value="texture">เนื้อผิว</option>
            </select>
          </p>
        </td>
        <td align="left" width="80">
          <p id="t1"><input type="text" id="searching" name="searching" value="" />
            <select name="category" id="ft_id" class="select-css">
              <option value="1">Cream Foam - ครีม</option>
              <option value="2">Gel Foam - เจล</option>
              <option value="3">Liquid Soap - สบู่เหลว</option>
            </select>
          </p>
        </td>
        <td width="80">
          <p id="t1">
            <select name="type_price" id="type_price" class="select-css">
              <option value="asc">ราคาน้อยไปมาก</option>
              <option value="desc">ราคามากไปน้อย</option>
            </select>
          </p>
        </td>
        <td align="left">
          <p align="left" id="t1"> <button type="submit" />ค้นหา
            </button></p>
        </td>
      </tr>
    </table>
  </form>

  <div class="container" >
    <p align="right" id="t1">
      <?PHP
      ini_set('display_errors', 0);
      include("connectDB.php");
      $cnt_amount = 0;
      if (isset($_SESSION['userName'])) $username = $_SESSION['userName'];
      $sql2 = "select * from cart WHERE username = '$username'" or die("Error:" .
        mysqli_error($conn));
      $result2 = mysqli_query($conn, $sql2);
      while ($rs2 = mysqli_fetch_array($result2)) {
        $cnt_amount = $cnt_amount + $rs2['amount'];
      }

      if (!$result2) {
        echo "ไม่สารถแสดงข้อมูล";
      }
      ?>
    </p>
  </div>
  <div class="navbar">
    <img src="pic/LogoWipWapShop.png" width="125px" valign="middle" align="left">
    <a href="foam.php"><b>หน้าแรก</b></a>
    <a href="order.php?username=<?PHP echo $username; ?>"><b>ประวัติการสั่งซื้อ</b></a>
    <a href="cart.php?username=<?PHP echo $username ?>&amount=<?PHP echo
                                                              $cnt_amount; ?> "><b>( <?PHP
                                                                                      echo $cnt_amount; ?> ) ดูสินค้าในตะกร้า</b></a>
    <a href="article.php"><b>สาระน่ารู้</b></a>

    <a style="float: right;">
      <form name="logout_form" method="get" action="logout.php" align="right">
        <button type="submit" class="btn btn-danger">Logout</button>
      </form>
      <a style="float: right;"><b>
          <?php if (isset($_SESSION['userName'])) echo "สวัสดี : " . $_SESSION['userName'];
          ini_set('display_errors', 0); // hide warning
          include("connectDB.php");
          ?></b></a>
  </div>

  </div>
  </div>
  </div>
  <?php
  if (isset($_GET['searching'])) {
    if ($_GET['searching'] != '') {
      if (isset($_GET['type_search'])) {
        $type_price = $_GET['type_price'];
        if ($_GET['type_search'] == 'fname') {
          $fname = $_GET['searching'];
          $sql = "SELECT f.f_id,f.fname,f.price,f.size,f.mash,f.texture,f.picture,f.picture,f.stock,id.ft_type
 FROM foam f , foam_type id Where f.ft_id=id.ft_id And f.fname like '%" . $fname . "%' And stock > 0 ORDER by price
$type_price";
        }
        if ($_GET['type_search'] == 'mash') {
          $mash = $_GET['searching'];
          $sql = "SELECT f.f_id,f.fname,f.price,f.size,f.mash,f.texture,f.picture,f.picture,f.stock,id.ft_type
 FROM foam f , foam_type id Where f.ft_id=id.ft_id And f.mash like '%" . $mash . "%' And f.stock > 0  ORDER by f.price
$type_price";
        }

        if ($_GET['type_search'] == 'texture') {
          $texture = $_GET['searching'];
          $sql = "SELECT f.f_id,f.fname,f.price,f.size,f.mash,f.texture,f.picture,f.picture,f.stock,id.ft_type
 FROM foam f , foam_type id Where f.ft_id=id.ft_id And f.texture like '%" . $texture . "%' And f.stock > 0  ORDER by price $type_price";
        }
      }
    } else if ($_GET['type_price'] != '' and $_GET['searching'] == '') {
      $type_price = $_GET['type_price'];
      if ($_GET['type_price'] == 'desc') {
        $sql = "SELECT f.f_id,f.fname,f.price,f.size,f.mash,f.texture,f.picture,f.picture,f.stock,id.ft_type
 FROM foam f , foam_type id Where f.ft_id=id.ft_id And  f.stock > 0 ORDER by f.price $type_price";
      } else {
        $sql = "SELECT f.f_id,f.fname,f.price,f.size,f.mash,f.texture,f.picture,f.picture,f.stock,id.ft_type
FROM foam f , foam_type id Where f.ft_id=id.ft_id And f.stock > 0  ORDER by f.price $type_price";
      }
    } else {
      $sql = "SELECT f.f_id,f.fname,f.price,f.size,f.mash,f.texture,f.picture,f.picture,f.stock,id.ft_type
 FROM foam f , foam_type id Where f.ft_id=id.ft_id And f.stock > 0 ";
    }
  }
  if ($_GET['type_search'] == 'ft_id' and $_GET['searching'] == '') {
    if ($_GET['category'] != '') {
      $ft_id = $_GET['category'];
      echo $ft_id;
      $sql = "SELECT f.f_id,f.fname,f.price,f.size,f.mash,f.texture,f.picture,f.picture,f.stock,id.ft_type
  FROM foam f , foam_type id Where f.ft_id=id.ft_id And f.ft_id like $ft_id and f.stock > 0 ORDER by f.price
 $type_price";
    }
  }
  if (!isset($_GET['searching']) and !isset($_GET['ft_id'])) {
    $sql = "SELECT f.f_id,f.fname,f.price,f.size,f.mash,f.texture,f.picture,f.picture,f.stock,id.ft_type
    FROM foam f , foam_type id Where f.ft_id=id.ft_id And f.stock > 0";
  }
  $result = mysqli_query($conn, $sql);
  ?>
  <div class="container">
    <?PHP
    $cnt = 0;
    while ($rs = mysqli_fetch_array($result)) {
    ?><div class="shadow-sm p-3 mb-5 bg-white rounded">
      <div class="col-sm-4" >
      
        <table width="100%" class="table ">
          <p>
            <tr>
              <td colspan="2"><img src="<?PHP echo "images/" . $rs['picture']; ?>" height="200" width="200"></td>
            </tr>
          </p>
          <tr>
                        <td bgcolor="#d6f4fc" width="60%" colspan="2">
                            <font id="p1"><b><?PHP echo $rs['fname']; ?></b></font>
                        </td>
          </tr>
          <tr bgcolor="whitesmoke">
            <td>
              <font id="b1"><b>ประเภทสินค้า :</b></font>
            </td>
            <td >
              <font id="p1"><?PHP echo $rs['ft_type']; ?></font>
            </td>
          </tr>
          <tr bgcolor="whitesmoke">
            <td >
              <font id="b1"><b>ปริมาณที่บรรจุ :</b></font>
            </td>
            <td >
              <font id="p1"><?PHP echo $rs['size']; ?> 
              <?php if ($rs['ft_type'] == 'Cream Foam - ครีม'){ 
                      echo "กรัม";
                    }else{
                            echo "มิลลิลิตร";
                    } ?></font>
            </td>
          </tr>
          <tr bgcolor="whitesmoke">
            <td height="70">
              <font id="b1"><b>ส่วนผสมสำคัญ :</b></font>
            </td>
            <td >
              <font id="p1"><?PHP echo $rs['mash']; ?></font>
            </td>
          </tr>
          
          <tr bgcolor="whitesmoke">
            <td>
              <font id="b1"><b>เหมาะสำหรับ :</b></font>
            </td>
            <td >
              <font id="p1"><?PHP echo $rs['texture']; ?></font>
            </td>
          </tr>
          <tr bgcolor="whitesmoke">
            <td>
              <font id="b1"><b>ราคา :</b></font>
            </td>
            <td >
              <font id="p1"><?PHP echo $rs['price']; ?> บาท </font>
            </td>
          </tr>
          <tr bgcolor="whitesmoke">
            <td>
              <font id="b1"><b>สินค้า(คงเหลือ):</b></font>
            </td>
            <td >
              <font id="p2"><b><?PHP if ($rs['stock'] > 0) {
                                    echo $rs['stock'] . ' ชิ้น';
                                  } ?> </b></font>
            </td>
          </tr>

          <form method="GET" action="addToCart.php">
            <input type="hidden" name="f_id" value="<?PHP echo $rs['f_id']; ?>" />
            <input type="hidden" name="username" value="<?PHP echo $rs['username']; ?>" />
            <input type="hidden" name="size" value="<?PHP echo $rs['size']; ?>" />
            <input type="hidden" name="mash" value="<?PHP echo $rs['mash']; ?>" />
            <input type="hidden" name="texture" value="<?PHP echo $rs['texture']; ?>" />
            <input type="hidden" name="price" value="<?PHP echo $rs['price']; ?>" />
            <input type="hidden" name="stock" id="stock" value="<?PHP echo $rs['stock']; ?>" />
            <br>
            <tr>
              <td colspan="2">
                <font id="b1"><b>จำนวนที่ต้องการสั่งซื้อ : </b></font>
                <font id="t1"><input type="number" name="amount" placeholder="1" maxlength="3" required min="1" max="<?PHP echo $rs['stock']; ?>" value="1" /> ชิ้น </font>
              </td>
            </tr>
            <td colspan="2"><p align="middle">
          <button type="submit" id="cart" name="cart" class="btn btn-info" /><span class="glyphicon glyphicon-shopping-cart"></span><font id="w_normal"><b> หยิบลงตะกร้า</b></font></button>
        </p></td>
        </table>
        
        </form>
        </div>
      </div>
    <?PHP $cnt++;
    }
    if ($cnt == 0) {
      echo "<p align='center' id='p3'>ไม่พบสินค้าที่ค้นหา !</p>";
    }
    ?>
    <br>
  </div>
  <?PHP
  include("include_footer.html");
  ?>
  <br><br>
</body>

</html>