<?php
session_start();
include 'db.php';

if(!isset($_SESSION['user'])){
    die("Please login first. <a href='login.php'>Login</a>");
}

$id = $_SESSION['user'];

$stmt = $conn->prepare("SELECT * FROM cvs WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$user = $stmt->get_result()->fetch_assoc();

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $name = trim($_POST['name']);
    $keyprogramming = trim($_POST['keyprogramming']);
    $education = trim($_POST['education']);
    $profile = trim($_POST['profile']);
    $URLlinks = trim($_POST['URLlinks']);

    $stmt = $conn->prepare("UPDATE cvs SET name=?, keyprogramming=?, education=?, profile=?, URLlinks=? WHERE id=?");
    $stmt->bind_param("sssssi", $name, $keyprogramming, $education, $profile, $URLlinks, $id);
    $stmt->execute();

    echo "<p>CV updated successfully!</p>";
}
?>

<h2>Update Your CV</h2>

<form method="POST">
    <input type="text" name="name" value="<?php echo htmlspecialchars($user['name'] ?? ''); ?>" placeholder="Name"><br><br>
    <input type="text" name="keyprogramming" value="<?php echo htmlspecialchars($user['keyprogramming'] ?? ''); ?>" placeholder="Key Programming Language"><br><br>
    <input type="text" name="education" value="<?php echo htmlspecialchars($user['education'] ?? ''); ?>" placeholder="Education"><br><br>
    <textarea name="profile" placeholder="Profile"><?php echo htmlspecialchars($user['profile'] ?? ''); ?></textarea><br><br>
    <input type="text" name="URLlinks" value="<?php echo htmlspecialchars($user['URLlinks'] ?? ''); ?>" placeholder="URL Links"><br><br>
    <button type="submit">Update CV</button>
</form>

<a href="logout.php">Logout</a> |
<a href="cv.php">Back</a>