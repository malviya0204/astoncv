<?php include 'db.php'; ?>

<?php
$id = $_GET['id'] ?? 0;

$stmt = $conn->prepare("SELECT * FROM cvs WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$user = $stmt->get_result()->fetch_assoc();
?>

<?php if($user): ?>
<h2><?php echo htmlspecialchars($user['name']); ?></h2>
<p>Email: <?php echo htmlspecialchars($user['email']); ?></p>
<p>Language: <?php echo htmlspecialchars($user['keyprogramming']); ?></p>
<p>Education: <?php echo htmlspecialchars($user['education']); ?></p>
<p>Profile: <?php echo htmlspecialchars($user['profile']); ?></p>
<p>Links: <?php echo htmlspecialchars($user['URLlinks']); ?></p>
<?php else: ?>
<p>CV not found.</p>
<?php endif; ?>

<a href="cv.php">Back</a>