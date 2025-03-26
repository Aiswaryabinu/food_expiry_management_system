<?php
include 'config/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $category = $_POST['category'];
    $purchase_date = $_POST['purchase_date'];
    $expiry_date = $_POST['expiry_date'];

    // Determine status
    $today = date("Y-m-d");
    $status = ($expiry_date < $today) ? 'Expired' : ((strtotime($expiry_date) - strtotime($today)) <= 3 * 86400 ? 'Expiring Soon' : 'Fresh');

    $sql = "INSERT INTO food_items (name, category, purchase_date, expiry_date, status) VALUES ('$name', '$category', '$purchase_date', '$expiry_date', '$status')";
    $conn->query($sql);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manage Food</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow p-4">
            <h2 class="text-center text-primary mb-4">Add Food Item</h2>
            
            <!-- Food Item Form -->
            <form method="post">
                <div class="mb-3">
                    <label class="form-label">Name:</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Category:</label>
                    <input type="text" name="category" class="form-control">
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Purchase Date:</label>
                    <input type="date" name="purchase_date" class="form-control" required>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Expiry Date:</label>
                    <input type="date" name="expiry_date" class="form-control" required>
                </div>
                
                <div class="text-center">
                    <button type="submit" class="btn btn-success btn-lg">Add Item</button>
                </div>
            </form>

            <!-- Back to Dashboard Button -->
            <div class="text-center mt-4">
                <a href="index.php" class="btn btn-secondary btn-lg">Back to Dashboard</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

