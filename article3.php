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
                <p align="center"><img src="pic/article3.jpg" width="800px" ></p>
                <p id="h1_2" align="center">สิวเกิดจากอะไร ?</a></p>
                <p id="p1"> &nbsp; &nbsp; &nbsp; &nbsp; การเกิดสิวนั้นล้วนแต่ก่อตัวขึ้นจากสิวอุดตันขนาดเล็กมากที่มองไม่เห็นได้ด้วยตาเปล่าใต้ผิวหนัง
ภาวะการผลิตน้ำมันในผิวมากเกินไป (Seborrhea) และชั้นผิวก่อตัวหนาผิดปกติ (Hyperkeratosis) การเกิดสิวหัวดำ,สิวหัวขาว สิวผด และสิวประเภทต่างๆ การเจริญเติบโตของแบคทีเรียกระตุ้นให้การอักเสบรุนแรงขึ้น และก่อให้เกิดสิว
                </p>
                <p id="p1"> &nbsp; &nbsp; &nbsp; &nbsp; สาเหตุของการเกิดสิวนั้นเป็นที่เป็นที่พูดถึงและถกเถียงกันมานาน แต่ส่วนใหญ่แล้วยังไม่ใช่ข้อมูลที่
ถูกต้อง แพทย์หลายคนมีความเห็นร่วมกันว่า การเกิดสิวนั้นมีความสัมพันธ์โดยตรงกับฮอร์โมนในร่างกายพันธุกรรม นอกจากนี้ยังเกิดได้จากยาบางชนิด, การสูบบุหรี่, ความเครียดและการดูแลผิวอย่างไม่ถูกวิธีล้วน
กระตุ้นให้เกิดสิวได้ อีกทั้งยังมีหลักฐานยืนยันว่าอาหารมีผลต่อการเกิดสิว 
                </p>
    </div>
    <br> <br>
    <?php include("include_footer.html") ?>
</body>

</html>