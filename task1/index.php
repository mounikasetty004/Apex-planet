<?php
// index.php - Entry point of the Apex Project
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Apex Project Home</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            color: #333;
            padding: 40px;
        }
        .container {
            max-width: 800px;
            margin: auto;
            background-color: #fff;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #007BFF;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to the Apex Project</h1>
        <p>This is the homepage of your PHP web application.</p>
        <p><strong>Date:</strong> <?php echo date("Y-m-d H:i:s"); ?></p>
    </div>
</body>
</html>
