<?php
include 'db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $stmt = $conn->prepare("SELECT id, password FROM users WHERE username=?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($user_id, $hash);
    if ($stmt->fetch() && password_verify($_POST['password'], $hash)) {
        $_SESSION['user_id'] = $user_id;
        $_SESSION['username'] = $username;
        header("Location: index.php");
        exit();
    } else {
        echo "Invalid credentials";
    }
}
?>

<link rel="stylesheet" href="style.css">
<h2>Login</h2>
<form method="POST">
    Username: <input type="text" name="username" required><br>
    Password: <input type="password" name="password" required><br>
    <button type="submit">Login</button>
</form>
