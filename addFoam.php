<!DOCTYPE html>
<html lang="en">
<link href='https://fonts.googleapis.com/css?family=Athiti' rel='stylesheet'>
<link rel="stylesheet" type="text/css" href="table.css" />
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
                <h2 id="h1"><b>+ เพิ่มข้อมูลโฟมล้างหน้า</b></h2>
                <hr />
            </div>
        </div>
    </div>
    <div class="container">
        <form name="addFoam_form" method="post" action="foamInsert.php" enctype="multipart/form-data">
            <div class="row">
            <div class="col-sm-2">
                </div>
                <div class="col-sm-8">
                    <label id="b1">ชื่อสินค้า: </label><br>
                    <input type="text" id="p1_2" name="f_name" class="form-control" placeholder="ชื่อสินค้า"  required /><br />
                </div>
                <div class="col-sm-2">
                </div>
            </div>

            <div class="row">
            <div class="col-sm-2">
                </div>
            <div class="col-sm-8">
                    <label id="b1">ประเภทสินค้า: </label>
                    <p id="p1_2"><select name="category" id="category" class="form-control" onchange="selectCategory()">
                    <option>กรุณาเลือก</option>        
                    <option value="1">Cream Foam - ครีม</option>
                            <option value="2">Gel Foam - เจล</option>
                            <option value="3">Liquid Soap - สบู่เหลว</option>
                        </select></p>
                </div>
                <div class="col-sm-2">
                </div>
            </div>

            <div class="row">
            <div class="col-sm-2">
                </div>
            <div class="col-sm-8">
                    <label id="b1">ปริมาณที่บรรจุ : </label><br>
                    <input type="text" id="p1_2" name="size" class="form-control" placeholder="กรัม/มิลลิลิตร " required /><br />
                </div>
                <div class="col-sm-2">
                </div>
            </div>

            <div class="row">
            <div class="col-sm-2">
                </div>
            <div class="col-sm-8">
                    <label id="b1">ส่วนผสมสำคัญ: &nbsp;&nbsp;</label><br />
                    <textarea id="p1_2" name="mash" placeholder="ส่วนผสม" class="form-control" required></textarea> <br />
                </div>
                <div class="col-sm-2">
                </div>
            </div>
            <div class="row">
            <div class="col-sm-2">
                </div>
            <div class="col-sm-8">
                    <label id="b1">เหมาะสำหรับ: &nbsp;&nbsp;</label>
                    <p id="p1_2"><select name="texture" class="form-control" >
                    <option>กรุณาเลือก</option>
                            <option value="ผิวธรรมดา">ผิวธรรมดา</option>
                            <option value="ผิวผสม">ผิวผสม</option>
                            <option value="ผิวมัน">ผิวมัน</option>
                            <option value="ผิวธรรมดา-ผิวมัน">ผิวธรรมดา-ผิวมัน</option>
                            <option value="ผิวผสม-ผิวมัน">ผิวผสม-ผิวมัน</option>
                            <option value="ทุกสภาพผิว">ทุกสภาพผิว</option>
                        </select></p>
                </div>
                <div class="col-sm-2">
                </div>
            </div>
         
    
            <div class="row">
                <div class="col-sm-2">
                </div>
            <div class="col-sm-8">
                    <label id="b1">เลือกรูปภาพ: </label>
                    <input type="file" name="pic" id="t1"  placeholder="รูป" accept="image/*" required /> <br />
                </div>
                <div class="col-sm-2">
                </div>
            </div>
            <div class="row">
            <div class="col-sm-2">
                </div>
            <div class="col-sm-8">
                    <label id="p2">ราคา [บาท]: </label><br>
                    <input type="text" id="p1_2" name="price" class="form-control" placeholder="ราคา (บาท)" required /> <br />
                </div>
                <div class="col-sm-2">
                </div> 
            </div>

            <div class="row">
            <div class="col-sm-2">
                </div>
            <div class="col-sm-8">
                    <label id="p2" >สินค้าคงเหลือ [ชิ้น]: </label>&nbsp; &nbsp;<p id="p1_2"><input type="number" id="b12" name="stock"  class="form-control"  placeholder="1" maxlength="20" required min="1" max="100" /></p><br>
                </div>
                <div class="col-sm-2">
                </div>
            </div>
   
            <div class="row">
                    <div class="col-sm-4">
                    </div>
                    <div class="col-sm-3">
                        <p align="left" id="w_normal"><button type="submit" class="btn btn-success btn-lg" /><b>+ เพิ่มโฟมล้างหน้า</b></button></p>
                    </div>
                    <div class="col-sm-4">
                        </p><a id="back" href="adminFoam.php" align="right">ย้อนกลับ</a></p>
                    </div>
                    <div class="col-sm-4">
                    </div>
        </form>

    </div>
    </div>
    <br><br>
    <?php include("include_footer.html") ?>
</body>
</html>

