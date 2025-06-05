<?php
include 'db.php';
include 'session.php';

if (!isLoggedIn()) {
    header("Location: login.php");
    exit();
}

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM posts WHERE id=$id");
$post = $result->fetch_assoc();

if ($_SESSION['user_id'] != $post['user_id']) {
    die("Unauthorized access.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $stmt = $conn->prepare("UPDATE posts SET title=?, content=? WHERE id=?");
    $stmt->bind_param("ssi", $title, $content, $id);
    $stmt->execute();
    header("Location: index.php");
    exit();
}
?>

<link rel="stylesheet" href="style.css">
<h2>Edit Post</h2>
<form method="POST">
    Title: <input type="text" name="title" value="<?= htmlspecialchars($post['title']) ?>" required><br>
    Content: <br><textarea name="content" rows="6" required><?= htmlspecialchars($post['content']) ?></textarea><br>
    <button type="submit">Update</button>
</form>
