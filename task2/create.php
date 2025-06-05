<?php
include 'db.php';
include 'session.php';

if (!isLoggedIn()) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $user_id = $_SESSION['user_id'];

    $stmt = $conn->prepare("INSERT INTO posts (title, content, user_id) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $title, $content, $user_id);
    $stmt->execute();
    header("Location: index.php");
    exit();
}
?>

<link rel="stylesheet" href="style.css">
<h2>Create Post</h2>
<form method="POST">
    Title: <input type="text" name="title" required><br>
    Content: <br><textarea name="content" rows="6" required></textarea><br>
    <button type="submit">Publish</button>
</form>
