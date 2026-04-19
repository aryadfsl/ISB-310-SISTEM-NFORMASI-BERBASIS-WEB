<?php require 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Read Data</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container" style="width: 400px;">
        <h2>Read Data</h2>
        
        <div class="data-list">
            <?php
            $query = mysqli_query($conn, "SELECT * FROM users ORDER BY id DESC");
            while ($row = mysqli_fetch_assoc($query)) {
            ?>
            <div class="data-item">
                <div class="data-info">
                    <p><strong><?php echo htmlspecialchars($row['name']); ?></strong></p>
                    <p class="email"><?php echo htmlspecialchars($row['email']); ?></p>
                </div>
                <div class="action-buttons">
                    <a href="update.php?id=<?php echo $row['id']; ?>" class="btn-edit">Edit</a>
                    <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn-delete" onclick="return confirm('Are you sure?')">Delete</a>
                </div>
            </div>
            <?php } ?>
        </div>

        <div class="nav-buttons">
            <a href="index.php">CREATE</a>
            <a href="read.php">READ</a>
        </div>
    </div>
</body>
</html>