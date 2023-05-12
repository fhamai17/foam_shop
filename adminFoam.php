<!DOCTYPE html>
<html lang="en">

<head>
  <title>Admin Foam</title>
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
<style type="text/css">

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

  .footer {
    left: 0;
    bottom: 0;
    width: 100%;
  }
</style>

<body onload="defaultElements()">
  <p align="right" id="t1">
    <?PHP session_start();
    if ($_SESSION['userName'] == '') {
      echo "<script>alert('กรุณาเข้าสู่ระบบก่อนใช้งาน');
window.location='index.html'</script>";
      exit();
    }
    ?>
    
  </p>

  <?PHP
    include("menu.php");
    include("include_banner.html");
    ?>
  <div class="container">
        <div class="row">
            <div align="center">
                <hr />
                <h2 id="h1"><b>จัดการข้อมูลโฟมล้างหน้า</b></h2>
                <hr />
            </div>
        </div><br>
    </div>
  <div class="allButFooter">
    <div class="container">
      <form name='search' action="" method="get">
        <table align="center" width="100%" border="0">
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
                  <option value="1">Cream - ครีม</option>
                  <option value="2">Jell - เจล</option>
                <option value="3">Liquid soap - สบู่เหลว</option>
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
              <p align="left" id="t1"><button type="submit" />ค้นหา
                </button></p>
            </td>
          </tr>
        </table>
      </form>
    </div>
    <div><?PHP
      if (isset($_GET['searching'])) {
        if ($_GET['searching'] != '') {
          if (isset($_GET['type_search'])) {
            $type_price = $_GET['type_price'];
            if ($_GET['type_search'] == 'fname') {
              $fname = $_GET['searching'];
              $sql = "SELECT f.f_id,f.fname,f.price,f.size,f.mash,f.texture,f.picture,f.picture,f.stock,id.ft_type
 FROM foam f , foam_type id Where f.ft_id=id.ft_id And f.fname like '%" . $fname . "%' ORDER by f.price $type_price";
            }
            if ($_GET['type_search'] == 'mash') {
              $mash = $_GET['searching'];
              $sql = "SELECT f.f_id,f.fname,f.price,f.size,f.mash,f.texture,f.picture,f.picture,f.stock,id.ft_type
 FROM foam f , foam_type id Where f.ft_id=id.ft_id And f.mash like '%" . $mash . "%' ORDER by f.price
$type_price";
            }

            if ($_GET['type_search'] == 'texture') {
              $texture = $_GET['searching'];
              $sql = "SELECT f.f_id,f.fname,f.price,f.size,f.mash,f.texture,f.picture,f.picture,f.stock,id.ft_type
 FROM foam f , foam_type id Where f.ft_id=id.ft_id And f.texture like '%" . $texture . "%' ORDER by f.price $type_price";
            }
          }
        } else if ($_GET['type_price'] != '' and $_GET['searching'] == '') {
          $type_price = $_GET['type_price'];
          if ($_GET['type_price'] == 'desc') {
            $sql = "SELECT f.f_id,f.fname,f.price,f.size,f.mash,f.texture,f.picture,f.picture,f.stock,id.ft_type
 FROM foam f , foam_type id Where f.ft_id=id.ft_id ORDER by f.price $type_price";
          } else {
            $sql = "SELECT f.f_id,f.fname,f.price,f.size,f.mash,f.texture,f.picture,f.picture,f.stock,id.ft_type
FROM foam f , foam_type id Where f.ft_id=id.ft_id ORDER by f.price $type_price";
          }
        } else {
          $sql = "SELECT f.f_id,f.fname,f.price,f.size,f.mash,f.texture,f.picture,f.picture,f.stock,id.ft_type FROM foam f , foam_type id Where f.ft_id=id.ft_id";
        }
      }
      if ($_GET['type_search'] == 'ft_id' and $_GET['searching'] == '') {
        if ($_GET['category'] != '') {
          $ct_id = $_GET['category'];
          echo $ct_id;
          $sql = "SELECT f.f_id,f.fname,f.price,f.size,f.mash,f.texture,f.picture,f.picture,f.stock,id.ft_type FROM foam f , foam_type id Where f.ft_id=id.ft_id And f.ft_id like $ct_id ORDER by f.price $type_price";
        }
      }
      if (!isset($_GET['searching']) and !isset($_GET['ft_id'])) {
        $sql = "SELECT f.f_id,f.fname,f.price,f.size,f.mash,f.texture,f.picture,f.picture,f.stock,id.ft_type FROM foam f , foam_type id Where f.ft_id=id.ft_id";
      }
      ?></div>
      <br><div style="margin-right: 50px; margin-left: 50px;">
        <?PHP
        $result = mysqli_query($conn, $sql);
        $cnt = 0;
        ?>
        <p align="right"><a class="btn btn-success" href="addFoam.php" id="a1"><span class="glyphicon glyphicon-plus"></span> <b>เพิ่มข้อมูลโฟมล้างหน้า</b></a></p>
          <table width="100%" align="center" border="0" class="styled-table" >
          <tr height="50" bgcolor="#d6f4fc" >
            <th id="th">ลำดับ</th>
            <th id="th">ชื่อสินค้า</th>
            <th id="th">รูปภาพ</th>
            <th id="th">ประเภทสินค้า</th>
            <th id="th">ปริมาณที่บรรจุ</th>
            <th id="th">ส่วนผสมสำคัญ</th>
            <th id="th">เหมาะสำหรับ</th>
            <th id="th">ราคา</th>
            <th id="th">สินค้า<br>(คงเหลือ)</th>
            <th id="th" colspan="2">การจัดการ</th>
        </tr>
        
        <?PHP $num=1;
        while ($rs = mysqli_fetch_array($result)) {
        ?>
            <tr height="250">
            <td width="20">
                    <font id="p3"><?PHP echo $num; ?> </font>
                </td>
                <td width="200">
                    <font id="p3"><?PHP echo $rs['fname']; ?> </font>
                </td>
                <td>
                    <font id="p3"><img src="<?PHP echo "images/" . $rs['picture']; ?>" height="200" width="200"> </font>
                </td>
                <td>
                    <font id="p3"> <?PHP echo $rs['ft_type']; ?> </font>
                </td>
                <td>
                    <font id="p3"> <?PHP echo $rs['size']."<br>";?>
                    <?php if ($rs['ft_type'] == 'Cream Foam - ครีม'){ 
                      echo "กรัม";
                    }else{
                            echo "มิลลิลิตร";
                    } ?>  </font>
                </td>
                <td  width="200">
                    <font id="p3"> <?PHP echo $rs['mash']; ?> </font>
                </td>
                <td>
                    <font id="p3"> <?PHP echo $rs['texture']; ?> </font>
                </td>
                <td>
                    <font id="p3"> <?PHP echo $rs['price']."<br>บาท"; ?> </font>
                </td>
                <td>
                    <font id="p3"> <?PHP if ($rs['stock'] > 0) {
                                    echo $rs['stock'] . ' ชิ้น';
                                  }else {?>
                                    <font color="red"><?php echo "สินค้าหมด";?></font>
                                    <?php } ?>
                </td>
                <td>
       
                <a class="btn btn-primary" href="editFormFoam.php?f_id=<?PHP echo $rs['f_id']; ?>" id="a1"><span class="glyphicon glyphicon-pencil"></span></a>
                </td>
                <td>
                <a class="btn btn-danger" href="delFoam.php?f_id=<?PHP echo $rs['f_id']; ?> " id="a1"><span class="glyphicon glyphicon-trash"></span></a>
                </td>
            </tr>
        <?PHP
        $num++; }
        mysqli_close($conn);
        ?>
    </table>
          </div>
        <?PHP
          $cnt++;
        if ($cnt == 0) {
          echo "<p align='center' id='p3'>ไม่พบสินค้าที่ค้นหา !</p>";
        }
        ?></div>
      </div>
    </div>
    <br><br>

    <?php include("include_footer.html") ?>
</body>

</html>

