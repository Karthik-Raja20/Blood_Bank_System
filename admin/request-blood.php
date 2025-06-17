<?php
$host = 'localhost';
$db_name = 'blood_bank_db';
$db_user = 'root';
$db_password = '';

// Initialize
$requests = [];
$error = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db_name;charset=utf8mb4", $db_user, $db_password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->query("SELECT * FROM blood_requests ORDER BY required_date ASC");
    $requests = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $error = "Database error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Blood Requests</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 220px;
            background-color: #8B0000;
            padding-top: 20px;
            color: white;
        }
        .sidebar h4 {
            text-align: center;
            margin-bottom: 20px;
        }
        .sidebar a {
            color: white;
            display: block;
            padding: 12px 20px;
            text-decoration: none;
        }
        .sidebar a:hover {
            background-color: #a83232;
        }
        .main-content {
            margin-left: 220px;
            padding: 20px;
        }
        .table-container {
            margin-top: 20px;
        }
    </style>
</head>
<body>

<!-- Sidebar -->
<div class="sidebar">
    <h4>🩸 Admin Panel</h4>
    <a href="donor-list.php">Blood Donor List</a>
    <a href="request-blood.php">Blood Requests List</a>
    <a href="blood-stock.php">Blood Stock</a>
    <a href="new-donor.php">New Donor Registration</a>
    <a href="user-list.php">User List</a>
</div>

<!-- Main content -->
<div class="main-content">
    <h2>Blood Request List</h2>

    <?php if ($error): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <div class="table-container">
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Blood Type</th>
                    <th>Quantity (L)</th>
                    <th>Required Date</th>
                    <th>Reason</th>
                    <th>Requested At</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($requests)): ?>
                    <?php foreach ($requests as $req): ?>
                        <tr>
                            <td><?= htmlspecialchars($req['id']) ?></td>
                            <td><?= htmlspecialchars($req['name']) ?></td>
                            <td><?= htmlspecialchars($req['email']) ?></td>
                            <td><?= htmlspecialchars($req['phone']) ?></td>
                            <td><?= htmlspecialchars($req['blood_type']) ?></td>
                            <td><?= htmlspecialchars($req['quantity']) ?></td>
                            <td><?= htmlspecialchars($req['required_date']) ?></td>
                            <td><?= htmlspecialchars($req['reason']) ?></td>
                            <td><?= htmlspecialchars($req['created_at']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="9" class="text-center">No blood requests found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
