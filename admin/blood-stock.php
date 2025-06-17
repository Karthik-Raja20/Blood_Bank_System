<?php
$host = 'localhost';
$db_name = 'blood_bank_db';
$db_user = 'root';
$db_password = '';

$blood_stock = [];
$error = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db_name;charset=utf8mb4", $db_user, $db_password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->query("SELECT * FROM bloodstock");
    $blood_stock = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (empty($blood_stock)) {
        $error = "No blood stock data available.";
    }
} catch (PDOException $e) {
    die("DB error: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Blood Stock</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <style>
        body { background-color: #f8f9fa; }
        .sidebar {
            min-height: 100vh;
            background-color: #8B0000;
            color: white;
            padding-top: 20px;
        }
        .sidebar a {
            color: white;
            padding: 10px;
            display: block;
            text-decoration: none;
        }
        .sidebar a:hover {
            background-color: #a83232;
        }
        .header {
            background-color: #8B0000;
            color: white;
            padding: 10px 20px;
        }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-2 sidebar">
            <h4 class="text-center">🩸 Admin Panel</h4>
            <a href="donor-list.php">Blood Donor List</a>
        <a href="request-blood.php">Blood Requests List</a>
        <a href="blood-stock.php">Blood Stock</a>
        <a href="new-donor.php">New Donor Registration</a>
        <a href="user-list.php">User List</a>
        </div>

        <!-- Main Content -->
        <div class="col-md-10 mt-4">
            <h2>Blood Stock</h2>

            <?php if ($error): ?>
                <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>

            <table class="table table-bordered table-striped mt-3">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Blood Type</th>
                        <th>units (in Liters)</th>
                        <th>Last Updated</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($blood_stock as $stock): ?>
                    <tr>
                        <td><?= htmlspecialchars($stock['id']) ?></td>
                        <td><?= htmlspecialchars($stock['blood_type']) ?></td>
                        <td><?= htmlspecialchars($stock['units']) ?> L</td>
                        <td><?= htmlspecialchars($stock['last_updated']) ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>
