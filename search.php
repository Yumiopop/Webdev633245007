<!DOCTYPE html>
<html>
<head>
    <title>Search Results</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/5.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Search Results</h1>
        <?php
        if(isset($_POST['searchTerm'])) {
            $searchTerm = $_POST['searchTerm'];
            
            // Database Connection
            $db_host = "localhost";
            $db_user = "root";
            $db_pass = "";
            $db_name = "pdf_documents";

            $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

            // Check Connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            
            // Search Data
            $sql = "SELECT * FROM documents WHERE title LIKE '%$searchTerm%'";
            $result = $conn->query($sql);
            
            // Display Results
            if ($result->num_rows > 0) {
                echo "<ul class='list-group'>";
                while ($row = $result->fetch_assoc()) {
                    echo "<li class='list-group-item'><a href='" . $row['file_path'] . "'>" . $row['title'] . "</a></li>";
                }
                echo "</ul>";
            } else {
                echo "<p>No results found.</p>";
            }
            
            // Close Connection
            $conn->close();
        } else {
            echo "<p>No search term provided.</p>";
        }
        ?>
    </div>
</body>
</html>
