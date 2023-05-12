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
        <div class="row">
            <div class="col-sm-6">
                <img src="pic/article1.jpg" width="500px">
            </div>
            <div class="col-sm-6">
                <p id="p1"><a href="article1.php">โฟมล้างหน้า<br>เลือกอย่างไรให้เหมาะกับผิว ? </a></p>
                <p id="p1">ในแต่ละวันเราต้องออกไปข้างนอก เผชิญกับฝุ่นควัน มลภาวะ <br>และสิ่งสกปรกต่าง ๆ มากมาย ซึ่งสิ่งที่
                    ตามมานั้นคือปัญหาผิวหน้า <br>นั่นก็คือ สิว ริ้วรอย ผิวคล้ำเสีย ฯลฯ เพราะฉะนั้นขั้นตอนที่สำคัญที่สุด<br>ในการดูแล
                    ผิวหน้าก็คือการทำความสะอาด แต่เราจะเลือกผลิตภัณฑ์<br>ที่ทำความสะอาดผิวหน้าแบบไหนถึงจะเหมาะกับ...
                </p>
                <a href="article1.php" class="btn btn-default btn-lg btn-block btn-huge">อ่านเพิ่มเติม</a>
            </div>
        </div>
    </div>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <img src="pic/article2.jpg" width="500px">
            </div>
            <div class="col-sm-6">
                <p id="p1"><a href="article2.php">โฟมล้างหน้า<br>ช่วยให้หน้าสะอาด กระจ่างใส</a></p>
                <p id="p1">ที่จริงแล้วโฟมล้างหน้าแต่ละยี่ห้อล้วนมีสูตรที่แตกต่างกันออกไป ขึ้นอยู่กับว่าสภาพผิวหน้าของแต่ละ
                    คนว่าเหมาะกับโฟมล้างหน้าแบบไหน...</p>
                <a href="article2.php" class="btn btn-default btn-lg btn-block btn-huge">อ่านเพิ่มเติม</a>
            </div>
        </div>
    </div>

    <br>
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <img src="pic/article3.jpg" width="500px">
            </div>
            <div class="col-sm-6">
                <p id="p1"><a href="article3.php">สิวเกิดจากอะไร?</a> </p>
                <p id="p1">การเกิดสิวนั้นล้วนแต่ก่อตัวขึ้นจากสิวอุดตันขนาดเล็กมากที่มองไม่เห็นได้ด้วยตาเปล่าใต้ผิวหนัง
                    ภาวะการผลิตน้ำมันในผิวมากเกินไป (Seborrhea) และชั้นผิวก่อตัวหนาผิดปกติ (Hyperkeratosis) ...</p>
                <a href="article3.php" class="btn btn-default btn-lg btn-block btn-huge">อ่านเพิ่มเติม</a>
            </div>
        </div>
    </div>
    <br><br><br>
    <?php include("include_footer.html") ?>
</body>

</html>