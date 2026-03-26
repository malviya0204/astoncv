<?php include 'db.php'; ?>
<style>
body {
    font-family: Arial;
    background-color: #f5f5f5;
    padding: 20px;
}

h1 {
    color: #333;
}

a {
    text-decoration: none;
    color: blue;
}

p {
    background: white;
    padding: 10px;
    border-radius: 5px;
}
</style>

<h1>AstonCV System</h1>
<h2>All CVs</h2>

<a href="search.php">Search</a> |
<a href="login.php">Login</a> |
<a href="register.php">Register</a>

<hr>

<?php
$result = $conn->query("SELECT * FROM cvs");

while($row = $result->fetch_assoc()){
    echo "<p>";
    echo "<b>" . htmlspecialchars($row['name']) . "</b><br>";
    echo "Language: " . htmlspecialchars($row['keyprogramming']) . "<br>";
    echo "<a href='view.php?id=" . $row['id'] . "'>View CV</a>";
    echo "</p><hr>";
}
?>