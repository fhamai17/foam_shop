<!DOCTYPE html>
<html lang="en">

<head>
    <title>Article</title>
    <link rel="stylesheet" type='text/css' href="style.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/main_styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
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
</style>

<body>
    <?php
    session_start();
    if (isset($_SESSION['userName']) != '') {
        include("menu2.php");
    } else {
    ?>
        <div class="navbar">
            <img src="pic/LogoWipWapShop.png" width="125px" valign="middle" align="left">
            <a href="home.php"><b>หน้าแรก</b></a>
            <a href="article.php"><b>สาระน่ารู้</b></a>
            <a style="float: right;" href="index.html"><b>เข้าสู่ระบบ</b></a>
        </div><br><br>
    <?php } ?>
    <br><br>
    <div class="container">
                <p align="center"><img src="pic/article2.jpg" width="800px" ></p>
                <p id="h1_2" align="center">โฟมล้างหน้า ช่วยให้หน้าสะอาด กระจ่างใส</a></p>
                <p id="p1"> &nbsp; &nbsp; &nbsp; &nbsp; ที่จริงแล้วโฟมล้างหน้าแต่ละยี่ห้อล้วนมีสูตรที่แตกต่างกันออกไป ขึ้นอยู่กับว่าสภาพผิวหน้าของแต่ละ
คนว่าเหมาะกับโฟมล้างหน้าแบบไหน
                </p>
                <p id="p1"> &nbsp; &nbsp; &nbsp; &nbsp; โฟมล้างหน้ามีส่วนที่ทำให้ใบหน้าของเราสะอาด และขาวขึ้นได้จริง ด้วยส่วนผสม AHA/BHA ที่มีฤทธิ์
เป็นกรด ช่วยกำจัดเซลล์ผิวตกค้างให้หลุดออก ทำให้ผิวหน้ากระจ่างใส
                </p>
                <p id="p1"> &nbsp; &nbsp; &nbsp; &nbsp; นอกจากนี้ก็ยังมีสาร Whitening ที่ช่วยให้ผิวขาว แต่ต้องใช้เวลา 1 – 2 นาที เพื่อให้เนื้อโฟมซึมซาบ
เข้าสู่ผิวหน้า ในขณะเดียวกันในบางสูตรที่มีโคเอนไซม์ Q10 ยังช่วยในเรื่องของการชะลอริ้วรอยก่อนวัย ทำให้ใบหน้าดูอ่อนกว่าวัยได้อีกด้วย
                </p>
                <p id="p1"> &nbsp; &nbsp; &nbsp; &nbsp; หนึ่งในสูตรยอดนิยมของโฟมล้างหน้านั่นก็คือโฟมล้างหน้าสูตรน้ำนม ที่ทำให้ผิวหน้านุ่มน่าสัมผัส แต่
ทั้งนี้ทั้งนั้นผลลัพธ์ที่ได้ของแต่ละคนก็จะแตกต่างกันไปอีกด้วย
                </p>
    </div>
    <br> <br>
    <?php include("include_footer.html") ?>
</body>

</html>