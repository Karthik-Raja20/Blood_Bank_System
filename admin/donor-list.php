<?php
// Database connection
$host = 'localhost';
$db_name = 'blood_bank_db';
$db_user = 'root';
$db_password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db_name;charset=utf8mb4", $db_user, $db_password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Fetch all donors
    $stmt = $pdo->query("SELECT * FROM donors ORDER BY registered_at DESC");
    $donors = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("DB error: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Donor List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .sidebar {
            min-height: 100vh;
            background-color: #8B0000;
            color: white;
            padding-top: 20px;
        }
        .sidebar a {
            color: white;
            display: block;
            padding: 10px;
            text-decoration: none;
        }
        .sidebar a:hover {
            background-color: #a83232;
        }
        .header {
            background-color: #8B0000;
            color: white;
            padding: 10px;
        }
    </style>
</head>
<body>
<div class="row no-gutters">
    <div class="col-md-2 sidebar">
        <h4 class="text-center">🩸 Admin</h4>
        <a href="donor-list.php">Blood Donor List</a>
    <a href="request-blood.php">Blood Requests List</a>
    <a href="blood-stock.php">Blood Stock</a>
    <a href="new-donor.php">New Donor Registration</a>
    <a href="user-list.php">User List</a>
    </div>
    <div class="col-md-10">
        <div class="header"><h5>Donor List</h5></div>
        <div class="container mt-4">
            <?php if (count($donors) > 0): ?>
                <table class="table table-bordered table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Age</th>
                            <th>Blood Type</th>
                            <th>Medical History</th>
                            <th>Medications</th>
                            <th>Registered At</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($donors as $donor): ?>
                            <tr>
                                <td><?= htmlspecialchars($donor['name']) ?></td>
                                <td><?= htmlspecialchars($donor['email']) ?></td>
                                <td><?= htmlspecialchars($donor['phone']) ?></td>
                                <td><?= htmlspecialchars($donor['age']) ?></td>
                                <td><?= htmlspecialchars($donor['blood_type']) ?></td>
                                <td><?= htmlspecialchars($donor['medical_history']) ?></td>
                                <td><?= htmlspecialchars($donor['medications']) ?></td>
                                <td><?= htmlspecialchars($donor['registered_at']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <div class="alert alert-warning">No donor records found.</div>
            <?php endif; ?>
        </div>
    </div>
</div>
</body>
</html>
