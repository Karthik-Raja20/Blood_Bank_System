<?php
$message = '';
$host = 'localhost';
$db_name = 'blood_bank_db';
$db_user = 'root';
$db_password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db_name;charset=utf8mb4", $db_user, $db_password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $age = trim($_POST['age'] ?? '');
    $blood_type = $_POST['blood_type'] ?? '';
    $medical_history = trim($_POST['medical_history'] ?? '');
    $medications = trim($_POST['medications'] ?? '');

    if ($name && $email && $phone && $age && $blood_type) {
        $stmt = $pdo->prepare("INSERT INTO donors (name, email, phone, age, blood_type, medical_history, medications) 
            VALUES (:name, :email, :phone, :age, :blood_type, :medical_history, :medications)");
        $stmt->execute([
            ':name' => $name,
            ':email' => $email,
            ':phone' => $phone,
            ':age' => $age,
            ':blood_type' => $blood_type,
            ':medical_history' => $medical_history,
            ':medications' => $medications,
        ]);
        $message = "✅ Registration successful! We'll contact the donor for a donation appointment soon.";
    } else {
        $message = "⚠️ Please fill all required fields.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>New Donor</title>
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
        <div class="header"><h5>Register New Donor</h5></div>
        <div class="container mt-4">
            <?php if (!empty($message)): ?>
                <div class="alert alert-info"><?= htmlspecialchars($message) ?></div>
            <?php endif; ?>
            <form method="POST" action="new-donor.php">
                <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="Name" required>
                </div>
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <input type="text" name="phone" class="form-control" placeholder="Phone Number" required>
                </div>
                <div class="form-group">
                    <input type="number" name="age" class="form-control" placeholder="Age" required>
                </div>
                <div class="form-group">
                    <select name="blood_type" class="form-control" required>
                        <option value="" disabled selected>Blood Type</option>
                        <option value="A+">A+</option>
                        <option value="A-">A-</option>
                        <option value="B+">B+</option>
                        <option value="B-">B-</option>
                        <option value="O+">O+</option>
                        <option value="O-">O-</option>
                        <option value="AB+">AB+</option>
                        <option value="AB-">AB-</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="text" name="medical_history" class="form-control" placeholder="Any medical conditions?">
                </div>
                <div class="form-group">
                    <input type="text" name="medications" class="form-control" placeholder="Any medications?">
                </div>
                <button type="submit" class="btn btn-dark">Submit</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
