<?php include 'db.php'; ?>

<h2>Search CVs</h2>

<form method="GET">
    <input type="text" name="search" placeholder="Search by name or language">
    <button type="submit">Search</button>
</form>

<hr>

<?php
if(isset($_GET['search'])){
    $search = "%" . $_GET['search'] . "%";

    $stmt = $conn->prepare("SELECT * FROM cvs WHERE name LIKE ? OR keyprogramming LIKE ?");
    $stmt->bind_param("ss", $search, $search);
    $stmt->execute();
    $result = $stmt->get_result();

    while($row = $result->fetch_assoc()){
        echo "<p>";
        echo htmlspecialchars($row['name']) . " - " . htmlspecialchars($row['keyprogramming']);
        echo " <a href='view.php?id=" . $row['id'] . "'>View</a>";
        echo "</p>";
    }
}
?>

<a href="cv.php">Back</a>