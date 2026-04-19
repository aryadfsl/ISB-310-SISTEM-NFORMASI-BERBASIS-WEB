<?php
require 'config.php';

$message = '';
$msg_type = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);

    // Validasi kosong
    if (empty($name) || empty($email)) {
        $message = "Please fill out all fields.";
        $msg_type = "error";
    } 
    // Validasi format email
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = "Invalid email address.";
        $msg_type = "error";
    } else {
        // Cek duplikasi email atau username
        $cek = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email' OR name = '$name'");
        if (mysqli_num_rows($cek) > 0) {
            $message = "This email or name is already registered. Please try another.";
            $msg_type = "error";
        } else {
            // Insert Data
            $insert = mysqli_query($conn, "INSERT INTO users (name, email) VALUES ('$name', '$email')");
            if ($insert) {
                $message = "User has been successfully inserted.";
                $msg_type = "success";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Data</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Create Data</h2>
        <form method="POST" action="">
            <div class="form-group">
                <label>Name:</label>
                <input type="text" name="name" placeholder="Your name" required>
            </div>
            <div class="form-group">
                <label>Email:</label>
                <input type="email" name="email" placeholder="Your email" required>
            </div>

            <?php if ($message != ''): ?>
                <div class="msg-<?php echo $msg_type; ?>">
                    <?php echo $message; ?>
                </div>
            <?php endif; ?>

            <button type="submit" class="btn-submit">Insert</button>
        </form>
        <div class="nav-buttons">
            <a href="index.php">CREATE</a>
            <a href="read.php">READ</a>
        </div>
    </div>
</body>
</html>