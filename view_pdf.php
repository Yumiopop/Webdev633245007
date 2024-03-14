<?php
// Connect to the database (change these credentials if needed)
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "pdf_documents";

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

// Handle search query
$searchQuery = isset($_GET['q']) ? $conn->real_escape_string($_GET['q']) : '';
$whereClause = '';
if ($searchQuery !== '') {
    $whereClause = "WHERE title LIKE '%$searchQuery%'";
}

// Pagination
$resultsPerPage = 5;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $resultsPerPage;

// Fetch total number of results
$sqlTotal = "SELECT COUNT(*) AS total FROM documents $whereClause";
$resultTotal = $conn->query($sqlTotal);
$totalRows = $resultTotal->fetch_assoc()['total'];

// Fetch PDF files based on the search query with pagination
$sql = "SELECT * FROM documents $whereClause LIMIT $offset, $resultsPerPage";
$result = $conn->query($sql);
$files = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $files[] = $row;
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>View PDF Files</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>PDF Files</h1>

        <!-- Search Bar -->
        <div class="search-form">
            <form action="view_pdf.php" method="get">
                <input type="text" name="q" placeholder="Search PDF files..." value="<?php echo htmlspecialchars($searchQuery); ?>">
                <input type="submit" value="Search">
            </form>
        </div>

        <!-- Search Results -->
        <div class="search-results">
            <?php
            // Display search results
            if (empty($files)) {
                echo '<p>No results found.</p>';
            } else {
                foreach ($files as $file) {
                    $fileName = $file['title'];
                    $filePath = $file['file_path'];
                    echo '<p><a href="' . $filePath . '" target="_blank">' . $fileName . '</a></p>';
                }
            }
            ?>
        </div>

        <!-- Pagination Links -->
        <div class="pagination">
            <?php
            $totalPages = ceil($totalRows / $resultsPerPage);

            for ($i = 1; $i <= $totalPages; $i++) {
                echo '<a href="view_pdf.php?q=' . urlencode($searchQuery) . '&page=' . $i . '">' . $i . '</a>';
            }
            ?>
        </div>
    </div>
</body>
</html>
