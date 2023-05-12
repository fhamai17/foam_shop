<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/login.css">
</head>
<body>
  <main>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6 login-section-wrapper">
          <div class="brand-wrapper">
            <img src="pic/LogoWipWapShop.PNG" height="50" alt="logo" class="logo">
          </div>
          <div class="login-wrapper my-auto">
            <h1 class="login-title">สมัครสมาชิก</h1>
            <form name="login_form" method="post" action="regInsert.php">
              <div class="form-group">
                <input type="text" name="userName" id="userName" class="form-control" placeholder="กรุณาระบุบัญชีผู้ใช้">
              </div>
              <div class="form-group mb-4">
                <input type="password" name="passWord" id="passWord" class="form-control" placeholder="กรุณาระบุรหัสผ่าน">
              </div>
              <div class="form-group">
              <input type="text" name="name"  class="form-control" placeholder="กรุณาระบุชื่อ-สกุล" required />
              </div>
              <div class="form-group">
            <input type="text" name="address"  class="form-control" placeholder="กรุณาระบุที่อยู่" required />
            </div>
            <div class="form-group">
            <input type="text" name="email"  class="form-control" placeholder="กรุณาระบุอีเมลล์" />
            </div>
              <input type="submit" class="btn btn-block login-btn" type="button" value="ลงทะเบียน">
            </form>
            <p align="center"><font color="red"><a href="index.html" class="text-reset">ย้อนกลับ</a></font></p><p class="login-wrapper-footer-text" align="center"><font color="red"><a href="home.php" class="text-reset">ไปยังหน้าแรก</a></font></p>
          </div>
        </div>
        <div class="col-sm-6 px-0 d-none d-sm-block">
          <img src="pic/regis.jpg" alt="login image" class="login-img" >
        </div>
      </div>
    </div>
  </main>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>
