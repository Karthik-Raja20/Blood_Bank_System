<?php
// Connect to the database
$pdo = new PDO("mysql:host=localhost;dbname=blood_bank_db", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Fetch users
$stmt = $pdo->query("SELECT id, name, email, phone, blood_type, role FROM users");
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User List - Blood Bank Admin</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
<div class="row no-gutters">
    <!-- Sidebar -->
    <div class="col-md-2 sidebar">
        <h4 class="text-center">🩸 Admin Panel</h4>
        <a href="donor-list.php">Blood Donor List</a>
    <a href="request-blood.php">Blood Requests List</a>
    <a href="blood-stock.php">Blood Stock</a>
    <a href="new-donor.php">New Donor Registration</a>
    <a href="user-list.php">User List</a>
    </div>

    <!-- Content -->
    <div class="col-md-10">
        <div class="header">
            <h5>User List</h5>
        </div>
        <div class="container mt-4">
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Blood Type</th><th>Role</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= htmlspecialchars($user['id']) ?></td>
                        <td><?= htmlspecialchars($user['name']) ?></td>
                        <td><?= htmlspecialchars($user['email']) ?></td>
                        <td><?= htmlspecialchars($user['phone']) ?></td>
                        <td><?= htmlspecialchars($user['blood_type']) ?></td>
                        <td><?= htmlspecialchars($user['role']) ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
