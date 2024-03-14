<?php
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "pdf_documents";

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$title = $_POST['title'];
$to_copy = $_POST['to_copy'];
$copy_date = $_POST['copy_date'];
$pdf_file = $_FILES['pdf_file'];

$file_name = $pdf_file['name'];
$file_tmp = $pdf_file['tmp_name'];
$file_path = "uploads/" . $file_name;  // Assuming you create an 'uploads' directory

move_uploaded_file($file_tmp, $file_path);

$sql = "INSERT INTO documents (title, to_copy, copy_date, file_path) VALUES ('$title', '$to_copy', '$copy_date', '$file_path')";
if (mysqli_query($conn, $sql)) {
    echo "Document uploaded and data inserted successfully.";
    // Redirect to index.php
    header("Location: index.php");
    exit(); // Make sure to exit after redirecting
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
