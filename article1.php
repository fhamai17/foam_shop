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
                <p align="center"><img src="pic/article1.jpg" width="800px" ></p>
                <p id="h1_2" align="center">โฟมล้างหน้า เลือกอย่างไรให้เหมาะกับผิว ? </a></p>
                <p id="p1"> &nbsp; &nbsp; &nbsp; &nbsp;ในแต่ละวันเราต้องออกไปข้างนอก เผชิญกับฝุ่นควัน มลภาวะ และสิ่งสกปรกต่าง ๆ มากมาย ซึ่งสิ่งที่
ตามมานั้นคือปัญหาผิวหน้า นั่นก็คือ สิว <br>ริ้วรอย ผิวคล้ำเสีย ฯลฯ เพราะฉะนั้นขั้นตอนที่สำคัญที่สุดในการดูแล
ผิวหน้าก็คือการทำความสะอาด แต่เราจะเลือกผลิตภัณฑ์ที่ทำความสะอาดผิวหน้าแบบไหนถึงจะเหมาะกับ
ผิวหน้าของเรามากที่สุดกันล่ะ มาดูกัน
                </p><p id="p1">
                <b>ผิวมัน</b><br>
ควรเลือกใช้โฟมล้างหน้าที่มีสารที่ควบคุมความมันผสม ตัวอย่างเช่น สารในกลุ่ม Zinc, สารกลุ่ม Clay เป็นต้น<br><br>
<b>ผิวแห้ง</b><br>
ผิวลักษณะนี้จะตรงข้ามกับคนที่มีผิวมัน คนที่มีผิวลักษณะนี้จะต้องใช้โฟมล้างหน้าที่มีสารให้ความชุ่มชื้น (Moisturizer) อยู่ในผลิตภัณฑ์ ตัวอย่างเช่น Glycerin, propylene glycol, Urea เป็นต้น<br><br>
<b>ผิวคล้ำเสีย</b><br>
ส่วนใหญ่จะเกิดจากการที่ต้องทำงานที่ต้องเผชิญกับแสงแดดมากกว่าคนทั่วไป ดังนั้นการเลือกใช้โฟมล้างหน้าสำหรับผู้ที่มีปัญหาผิวหมองคล้ำควรเลือกใช้โฟมล้างหน้าที่มีสารกลุ่ม Whitening เช่น Vitamin B3, Vitamin C & E ฯลฯ<br><br>
<b>ผิวคล้ำเสีย</b><br>
ส่วนใหญ่จะเกิดจากการที่ต้องทำงานที่ต้องเผชิญกับแสงแดดมากกว่าคนทั่วไป ดังนั้นการเลือกใช้โฟ
มล้างหน้าสำหรับผู้ที่มีปัญหาผิวหมองคล้ำควรเลือกใช้โฟมล้างหน้าที่มีสารกลุ่ม Whitening เช่น Vitamin B3, Vitamin C & E ฯลฯ<br><br>
<b>ผิวเป็นสิว</b><br>
คนที่เป็นสิวมักเกิดจากหลายสาเหตุ ไม่ว่าจะเป็น ฮอร์โมนเพศชายที่สูง, มีลักษณะผิวมันมากกว่าคนทั่วไป หรือแม้แต่การล้างหน้าที่ไม่สะอาดเอง ดังนั้นโฟมล้างหน้าสำหรับคนที่มีแนวโน้มเป็นสิวได้ง่าย ควรเลือกโฟมล้างหน้าที่มีสารที่ช่วยกำจัดเชื้อแบคทีเรียที่ทำให้เกิดสิวได้ เช่น Zinc PCA, Tea Tree oil ,Propoliz เป็นต้น<br><br></p>
    </div>

    <br>
    <?php include("include_footer.html") ?>
</body>

</html>