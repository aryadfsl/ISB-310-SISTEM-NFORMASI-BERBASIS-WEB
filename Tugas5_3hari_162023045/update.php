<?php
require 'config.php';

$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM users WHERE id = '$id'");
$data = mysqli_fetch_assoc($query);

$message = '';
$msg_type = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);

    if (empty($name) || empty($email)) {
        $message = "Please fill out all fields.";
        $msg_type = "error";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = "Invalid email address.";
        $msg_type = "error";
    } else {
        $cek = mysqli_query($conn, "SELECT * FROM users WHERE (email = '$email' OR name = '$name') AND id != '$id'");
        if (mysqli_num_rows($cek) > 0) {
            $message = "This email or name is already registered by another user.";
            $msg_type = "error";
        } else {
            $update = mysqli_query($conn, "UPDATE users SET name='$name', email='$email' WHERE id='$id'");
            if ($update) {
                header("Location: read.php");
                exit();
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update User</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Update User</h2>
        <form method="POST" action="">
            <div class="form-group">
                <label>Name:</label>
                <input type="text" name="name" value="<?php echo htmlspecialchars($data['name']); ?>" required>
            </div>
            <div class="form-group">
                <label>Email:</label>
                <input type="email" name="email" value="<?php echo htmlspecialchars($data['email']); ?>" required>
            </div>

            <?php if ($message != ''): ?>
                <div class="msg-<?php echo $msg_type; ?>">
                    <?php echo $message; ?>
                </div>
            <?php endif; ?>

            <button type="submit" class="btn-submit">Update</button>
        </form>
        <div class="nav-buttons">
            <a href="index.php">CREATE</a>
            <a href="read.php">READ</a>
        </div>
    </div>
</body>
</html>