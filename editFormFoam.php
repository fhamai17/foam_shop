<!DOCTYPE html>
<html lang="en">
<link href='https://fonts.googleapis.com/css?family=Athiti' rel='stylesheet'>
<link rel="stylesheet" type="text/css" href="main.css" />

<head>
    <title>Admin-Add Foam</title>
    <link rel="stylesheet" type='text/css' href="style.css">
    <link rel="stylesheet" type='text/css' href="main.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <?php include("menu.php") ?>
    <br> <br> <br> <br>
    <div class="container">
        <div class="row">
            <div align="center">
                <hr />
                <h2 id="h1"><b>แก้ไขข้อมูลโฟมล้างหน้า</b></h2>
                <hr />
            </div>
        </div>
    </div>
    <?PHP session_start();
    if ($_SESSION['userName'] == '' or !$_SESSION['guest'] == '') {
        echo "<script>alert('Please Login before Enter This Shop');
window.location='index.html'</script>";
        exit();
    }
    $f_id = $_GET['f_id'];
    $sql = "select * from foam Where f_id = $f_id";
    $result = mysqli_query($conn, $sql);
    while ($rs = mysqli_fetch_array($result)) {
    ?>
        <div class="container">
            <form name="editFoam_form" method="post" action="editFoam.php" accept-charset="utf-8" enctype="multipart/form-data">
                <div class="row" align="center">
                    <div class="col-sm-2">
                    </div>
                    <div class="col-sm-8">
                        <img src="<?PHP echo "images/" . $rs['picture']; ?>" height="200" width="200">
                        <p><input type="hidden" name="f_id" value="<?PHP echo $rs['f_id']; ?>" /></p>
                        <p><input type="hidden" name="pic" value="<?PHP echo $rs['picture']; ?>" /></p>
                    </div>
                    <div class="col-sm-2">
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-2">
                    </div>
                    <div class="col-sm-8">
                        <label id="b1">ชื่อสินค้า: </label><br>
                        <input type="text" id="p1_2" name="f_name" class="form-control" value="<?PHP echo $rs['fname']; ?>" /><br />
                    </div>
                    <div class="col-sm-2">
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-2">
                    </div>
                    <div class="col-sm-8">
                        <label id="b1">ประเภทสินค้า: </label><br>
                                    <select name="category" class="form-control" id="t3">
                                        <option value="1"<?PHP if($rs['category']=='1'){echo "selected";}else{ echo "";}  ?>>Cream Foam - ครีม</option>
                                        <option value="2"<?PHP if($rs['category']=='2'){echo "selected";}else{ echo "";}  ?>>Gel Foam - เจล</option>
                                        <option value="3"<?PHP if($rs['category']=='3'){echo "selected";}else{ echo "";}  ?>>Liquid Soap - สบู่เหลว</option>
                                    </select>
                        <br />
                    </div>
                    <div class="col-sm-2">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2">
                    </div>
                    <div class="col-sm-8">
                        <label id="b1">ปริมาณที่บรรจุ : </label><br>
                        <input type="text" id="p1_2" name="size" value="<?PHP echo $rs['size']; ?>" class="form-control" /><br />
                    </div>
                    <div class="col-sm-2">
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-2">
                    </div>
                    <div class="col-sm-8">
                        <label id="b1">ส่วนผสมสำคัญ: &nbsp;&nbsp;</label><br />
                        <textarea id="p1_2" name="mash" class="form-control"><?PHP echo $rs['mash']; ?></textarea><br />
                    </div>
                    <div class="col-sm-2">
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-2">
                    </div>
                    <div class="col-sm-8">
                        <label id="b1">เหมาะสมกับ: </label><br>
                                    <select name="texture" class="form-control" id="t3">
                                        <option value="ผิวธรรมดา"<?PHP if($rs['texture']=='ผิวธรรมดา'){echo "selected";}else{ echo "";}  ?>>ผิวธรรมดา</option>
                                        <option value="ผิวผสม"<?PHP if($rs['texture']=='ผิวผสม'){echo "selected";}else{ echo "";}  ?>>ผิวผสม</option>
                                        <option value="ผิวมัน"<?PHP if($rs['texture']=='ผิวมัน'){echo "selected";}else{ echo "";}  ?>>ผิวมัน</option>
                                        <option value="ผิวธรรมดา-ผิวมัน"<?PHP if($rs['texture']=='ผิวธรรมดา-ผิวมัน'){echo "selected";}else{ echo "";}  ?>>ผิวธรรมดา-ผิวมัน</option>
                                        <option value="ผิวผสม-ผิวมัน"<?PHP if($rs['texture']=='ผิวผสม-ผิวมัน'){echo "selected";}else{ echo "";}  ?>>ผิวผสม-ผิวมัน</option>
                                        <option value="ทุกสภาพผิว"<?PHP if($rs['texture']=='ทุกสภาพผิว'){echo "selected";}else{ echo "";}  ?>>ทุกสภาพผิว</option>
                                    </select>
                        <br />
                    </div>
                    <div class="col-sm-2">
                    </div>
                </div>
                
                <div class="row">
                <div class="col-sm-2">
                </div>
            <div class="col-sm-8">
                    <label id="b1">เลือกรูปภาพ: </label><input type="file" name="pic" id="t1" accept="image/*" /> <br />
                </div>
                <div class="col-sm-2">
                </div>
                </div>

                <div class="row">
                    <div class="col-sm-2">
                    </div>
                    <div class="col-sm-8">
                        <label id="p2">ราคา[บาท]: </label><br>
                        <input type="text" id="p1_2" name="price" value="<?PHP echo $rs['price']; ?>" class="form-control" value="<?PHP echo $rs['price']; ?>" required /> <br />
                    </div>
                    <div class="col-sm-2">
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-2">
                    </div>
                    <div class="col-sm-8">
                        <label id="p2">&nbsp;สินค้าคงเหลือ (ชิ้น)&nbsp;: </label>&nbsp; &nbsp;
                        <p id="p1_2"><input type="number" id="b12" name="stock" min="1" max="100" class="form-control" value="<?PHP echo $rs['stock']; ?>" required /></p><br>
                    </div>
                    <div class="col-sm-2">
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                    </div>
                    <div class="col-sm-3">
                        <p align="left" id="w_normal"><button type="submit" class="btn btn-success btn-lg" /><b>อัปเดตข้อมูลสินค้า</b></button></p>
                    </div>
                    <div class="col-sm-4">
                        </p><a id="back" href="adminFoam.php" align="right">ย้อนกลับ</a></p>
                    </div>
                    <div class="col-sm-4">
                    </div>
            </form>
        </div>

    <?php } ?>
    <br><br>
    <?php include("include_footer.html") ?>
</body>

</html>