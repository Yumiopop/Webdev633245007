<?php 
    session_start();
    include('server.php'); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- เรียกใช้ Bootstrap 5 -->
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <!-- เรียกใช้ CSS -->
    <link rel="stylesheet" href="style_2.css">
    <!-- เพิ่ม icon -->
    <script src="https://unpkg.com/feather-icons"></script>
    <!-- ล็อคตำเเหน่ง side bar -->

</head>
<body>
    <div class="container">
        <div class="row justify-content-center ">
            <div class="border border-dark border-5 rounded-3 mt-5 col-md-6">
                <img class="position-absolute start-50 translate-middle" src="Logo.png" width=80px height=80px alt="">
                <div class="p-2 mx-5 mt-5 text-bg-#6610f2 rounded">
                    <h2 class="text-center">เข้าสู่ระบบ</h2>
                </div>

                <form action="login_db.php" method="post" class="mt-3">
                    <!-- Notification message -->
                    <?php if (isset($_SESSION['error'])) : ?>
                        <div class="alert alert-danger">
                            <h3><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></h3>
                        </div>
                    <?php endif ?>

                    <div class="mb-3">
                        <label for="username" class="form-label">ชื่อผู้ใช้</label>
                        <input type="text" name="username" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">รหัสผ่าน</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <div class="mb-3">
                        <button type="submit" name="login_user" class="btn btn-primary">เข้าสู่ระบบ</button>
                    </div>
                    <p>ยังไม่มีบัญชี? <a href="register.php">สมัครเลย</a></p>
                </form>
            </div>
        </div>
    </div>

    <!-- Include Bootstrap JS (optional) -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
