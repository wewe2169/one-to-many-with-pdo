<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cafe Management System</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Welcome to the Cafe Management System</h1>
    
    <h2>Add a New Cafe</h2>
    <form action="core/handleForms.php" method="POST">
        <p>
            <label>Cafe Name:</label> 
            <input type="text" name="cafe_name" required>
        </p>
        <p>
            <label>Address:</label> 
            <input type="text" name="address" required>
        </p>
        <input type="submit" name="insertCafeBtn" value="Add Cafe">
    </form>

    <h2>List of Cafes</h2>
    <div class="card-container">
        <?php $cafes = getAllCafes($pdo); ?>
        <?php foreach ($cafes as $row) { ?>
        <div class="card">
            <h3><?php echo htmlspecialchars($row['cafe_name']); ?></h3>
            <p>Address: <?php echo htmlspecialchars($row['address']); ?></p>
            <p><small>Added: <?php echo $row['date_added']?? 'NA'; ?></small></p>
            <div class="actions">
                <a href="vieworders.php?cafe_id=<?php echo $row['cafe_id']; ?>">View Orders</a>
                <a href="editcafe.php?cafe_id=<?php echo $row['cafe_id']; ?>">Edit</a>
                <a href="deletecafe.php?cafe_id=<?php echo $row['cafe_id']; ?>">Delete</a>
            </div>
        </div>
        <?php } ?>
    </div>
</body>
</html>