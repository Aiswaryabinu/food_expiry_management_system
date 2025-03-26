<?php
include 'config/db.php';

$result = $conn->query("SELECT * FROM food_items ORDER BY expiry_date ASC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Food Expiry Management</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h2 class="text-center text-primary mb-4">Food Expiry Dashboard</h2>

        <!-- Food Table -->
        <div class="card shadow p-4">
            <table class="table table-bordered table-hover text-center">
                <thead class="table-dark">
                    <tr>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Expiry Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr class="<?= ($row['status'] == 'Expired') ? 'table-danger' : (($row['status'] == 'Expiring Soon') ? 'table-warning' : 'table-success') ?>">
                            <td><?= htmlspecialchars($row['name']) ?></td>
                            <td><?= htmlspecialchars($row['category']) ?></td>
                            <td><?= htmlspecialchars($row['expiry_date']) ?></td>
                            <td><strong><?= htmlspecialchars($row['status']) ?></strong></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>

        <!-- Button to Manage Items -->
        <div class="text-center mt-4">
            <a href="manage_food.php" class="btn btn-primary btn-lg">Manage Food Items</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
