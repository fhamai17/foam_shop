<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin-Edit User</title>
    <link rel="stylesheet" type='text/css' href="style.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <?PHP session_start();
        if ($_SESSION['userName'] == '') {
            echo "<script>alert('Please Login before Enter This Shop');
    window.location='index.html'</script>";
            exit();
        }

    include("menu.php");
    include("include_banner.html");
    ?>
    <div class="container">
        <hr/>
        <div class="row" align="center">
            <div class="col-sm-12">
                <p id="h1">แก้ไขข้อมูลผู้ใช้</p>
            </div>
        </div>
        <hr/>
    </div>
    <?PHP
    include('connectDB.php');
    $user_id = $_GET['user_id'];
    $sql = "select * from user Where user_id = $user_id";
    $result = mysqli_query($conn, $sql);
    while ($rs = mysqli_fetch_array($result)) {
    ?>
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <table width="1000">
                        <form name="editUser_form" method="get" action="editUser.php">
                            <tr>
                                <td>
                                    <p align="left">
                                        <font id="b1"><b>User ID:</b>
                                </td>
                                <td>
                                    <p align="left">
                                        <font id="p1_2"><input type="text" name="user_id" Value="<?PHP echo $rs['user_id']; ?>" class="form-control" required />
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p align="left">
                                        <font id="b1"><b>ชื่อ-สกุล :</b>
                                </td>
                                <td>
                                    <p align="left">
                                        <font id="p1_2"><input type="text" name="name" Value="<?PHP echo $rs['name']; ?>" class="form-control" required />
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p align="left">
                                        <font id="b1"><b>ที่อยู่ :</b>
                                </td>
                                <td>
                                    <p align="left">
                                        <font id="p1_2"><input type="text" name="name" Value="<?PHP echo $rs['address']; ?>" class="form-control" required />
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p align="left">
                                        <font id="b1"><b>บัญชีผู้ใช้ :</b>
                                </td>
                                <td>
                                    <p align="left">
                                        <font id="p1_2"><input type="text" name="username" Value="<?PHP echo $rs['username']; ?>" class="form-control" required />
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p align="left">
                                        <font id="b1"><b>รหัสผ่าน :</b>
                                </td>
                                <td>
                                    <p align="left">
                                        <font id="p1_2"><input type="password" name="password" Value="<?PHP echo $rs['password']; ?>" class="form-control" required />
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p align="left">
                                        <font id="b1"><b>อีเมลล์ :</b>
                                </td>
                                <td>
                                    <p align="left">
                                        <font id="p1_2"><input type="text" name="email" Value="<?PHP echo $rs['email']; ?>" class="form-control" required />
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p align="left">
                                        <font id="b1"><b>สถานะผู้ใช้งาน :</b>
                                </td>
                                <td>
                                    <p align="left">
                                        <font id="p1_2"><select name="status" id="status" class="form-control">
                                                <option value="Admin"<?PHP if($rs['status']=='Admin'){echo "selected";}else{ echo "";}  ?>>Admin</option>
                                                <option value="Customer"<?PHP if($rs['status']=='Customer'){echo "selected";}else{ echo "";}  ?>>Customer</option>
                                            </select></font>
                                    </p>
                                </td>
                            </tr>
                            <br>
                            <tr>
                                <td width="150">
                                <p align="left" id="space"><button type="submit" class="btn btn-success btn-lg" /><b>อัปเดตข้อมูลผู้ใช้</b></button>&nbsp;&nbsp;&nbsp;</p>
                                </td>
                                <td>
                                    <p align="right">&nbsp;&nbsp;<a id="back" href="userManagement.php">ย้อนกลับ</a></p>
                                </td>
                        </form>
                    </table>
                </div>
            <?PHP
        }
        mysqli_close($conn);
            ?>
            </div>
        </div>
        <br><br>
        <?PHP
        include("include_footer.html");
        ?>
</body>

</html>