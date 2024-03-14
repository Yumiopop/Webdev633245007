<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>นำเข้าเอกสาร</title>

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
    <!-- header -->
<header class="p-3 bd-indigo-700">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <img src="Logo.png" width=40px height=40px alt="">

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="index.php" class="nav-link fw-bold px-2 text-warning fs-5" >Home</a></li>
          <li><a href="#" class="nav-link px-2 text-white fs-5">About</a></li>
        </ul>

        <div class="text-end ms-3">
          <a class="btn bd-red-500" href="login.php" role="button">Log Out</a>
        </div>
      </div>
    </div>
</header>

    <div class="container px-5 mt-2">
        <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="text-center">นำเข้าเอกสาร</h1>
        </div>
        <!-- <h2 class="text-center">นำเข้าเอกสาร</h2> -->
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="title" class="form-label">เรื่อง</label>
                <input type="text" class="form-control" name="title" required>
            </div>
            <div class="mb-3">
                <label for="to_copy" class="form-label">สำเนาถึง</label>
                <input type="text" class="form-control" name="to_copy" required>
            </div>
            <div class="mb-3">
                <label for="copy_date" class="form-label">วันที่สำเนา</label>
                <input type="date" class="form-control" name="copy_date" required>
            </div>
            <div class="mb-3">
                <label for="pdf_file" class="form-label">เลือกไฟล์</label>
                <input type="file" class="form-control" name="pdf_file" accept=".pdf" required>
            </div>
            <button type="submit" class="btn btn-primary">อัปโหลด</button>
        </form>
    </div>
</body>
</html>
