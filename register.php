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
    <title>Register Page</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style_2.css">
    <script src="https://unpkg.com/feather-icons"></script>
</head>
<body>

    <div class="container">
        <div class="row justify-content-center ">
            <div class="border border-dark border-5 rounded-3 mt-5 col-md-6">
                <img class="position-absolute start-50 translate-middle" src="Logo.png" width=80px height=80px alt="">
                <div class="p-2 mx-5 mt-5 text-bg-#6610f2 rounded">
                    <h2 class="text-center">เข้าสู่ระบบ</h2>
                </div>

                <form action="register_db.php" method="post" class="mt-3">
                    <!-- Notification message -->
                    <?php if (isset($_SESSION['error'])) : ?>
                        <div class="alert alert-danger">
                            <h3><?php echo $_SESSION['error'];
                             unset($_SESSION['error']); 
                             ?>
                             </h3>
                        </div>
                    <?php endif ?>

                    <div class="mb-3">
                        <label for="username" class="form-label">ชื่อผู้ใช้</label>
                        <input type="text" class="form-control" name="username">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="password_1" class="form-label">รหัสผ่าน</label>
                        <input type="password" class="form-control" name="password_1">
                    </div>
                    <div class="mb-3">
                        <label for="password_2" class="form-label">ยืนยันรหัสผ่าน</label>
                        <input type="password" class="form-control" name="password_2">
                    </div>
                    <div class="mb-3">
                         <button type="submit" name="reg_user" class="btn btn-primary">ลงทะเบียน</button>
                    </div>
                    <p class="mt-3">มีบัญชีอยู่เเล้ว? <a href="login.php">เข้าสู่ระบบ</a></p>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
