<?php
include 'db.php';
include 'session.php';

if (!isLoggedIn()) {
    header("Location: login.php");
    exit();
}

$result = $conn->query("SELECT posts.*, users.username FROM posts JOIN users ON posts.user_id = users.id ORDER BY created_at DESC");
?>

<link rel="stylesheet" href="style.css">
<h1>Welcome <?= $_SESSION['username'] ?>!</h1>
<a href="create.php">+ New Post</a> | 
<a href="logout.php">Logout</a>
<hr>

<?php while ($row = $result->fetch_assoc()): ?>
<div class="post">
    <h2><?= htmlspecialchars($row['title']) ?></h2>
    <small>by <?= htmlspecialchars($row['username']) ?> at <?= $row['created_at'] ?></small>
    <p><?= nl2br(htmlspecialchars($row['content'])) ?></p>
    <?php if ($_SESSION['user_id'] == $row['user_id']): ?>
        <a href="edit.php?id=<?= $row['id'] ?>">Edit</a> | 
        <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Delete this post?')">Delete</a>
    <?php endif; ?>
</div>
<hr>
<?php endwhile; ?>
