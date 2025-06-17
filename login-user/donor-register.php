<?php
$message = '';

// DB connection setup
$host = 'localhost';
$db_name = 'blood_bank_db';
$db_user = 'root';
$db_password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db_name;charset=utf8mb4", $db_user, $db_password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . htmlspecialchars($e->getMessage()));
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $age = (int) ($_POST['age'] ?? 0);
    $blood_type = $_POST['blood_type'] ?? '';
    $medical_history = trim($_POST['medical_history'] ?? '');
    $medications = trim($_POST['medications'] ?? '');

    if ($name && $email && $phone && $age) {
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
        $message = "Thank you for registering! Your submission was successful. We will contact you shortly to schedule your blood donation appointment. We truly appreciate your willingness to help save lives!";
    } else {
        $message = "Please fill all required fields.";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />


    <!-- website font  -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/swiper.min.css">
    <link rel="stylesheet" type="text/css" href="css/animate.css" />
    <link rel="stylesheet" type="text/css" href="../user/css/style.css" />

    <title>Sign Up</title>
</head>

<body>

    <!-- Navbar 2 Start -->
    <section id="Nav2">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <img src="imgs/logo.png" width="18%"></img>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link selected" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="artical.php">Articles</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="donator.php">Donations</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact Us</a>
                    </li>
                </ul>
                <div class="type">
                    <h2>U</h2>
                </div>
                <button class="btn login" onclick= "window.location.href = 'blood-request.php';">blood request</button>
                <button class="btn login" onclick= "window.location.href = 'donor-register.php';">donor register</button>
                <button class="btn login" onclick= "window.location.href = '../user/index.php';">Login out</button>
            </div>
            </div>
        </nav>
    </section>
    <!-- Navbar 2 End -->

    <!-- Navigator Start -->
    <section id="navigator">
        <div class="container">
            <div class="path">
                <div class="path-main" style="color: darkred; display:inline-block;">Home</div>
                <div class="path-directio" style="color: grey; display:inline-block;"> / donor-register-form</div>
            </div>

        </div>
    </section>
    <!-- Navigator End -->

    <!-- Sign Up Start -->
    <section id="sign-up">
        <div class="container">
                <img src="imgs/logo.png" alt="">
                <?php if (!empty($message)): ?>
                    <div class="alert alert-info text-center"><?= htmlspecialchars($message) ?></div>
                <?php endif; ?>
                <form method="POST" action="donor-register.php">
                <input type="text" name="name" class="form-control" placeholder="Name" required>
                <input type="email" name="email" class="form-control" placeholder="Email" required>
                <input type="text" name="phone" class="form-control" placeholder="Phone Number" required>
                <input type="number" name="age" class="form-control" placeholder="Age" required>
                    <select name="type" id="type" required="">
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
                    <input type="text" name="medical_history" class="form-control" placeholder="Do you have any medical conditions?">
                    <input type="text" name="medications" class="form-control" placeholder="Are you currently taking any medications?">
                    <div class="reg-group">
                        <button class="submit" type="submit" style="background-color: rgb(51, 58, 65);">Submit</button>
                    </div>
                </form>
        </div>
    </section>
    <!-- Sign Up End -->

    <!-- Footer Start -->
    <section id="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="foot-info">
                        <img src="imgs/logo.png" alt="">
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quos ut sit natus earum ea cum
                            doloremque fugit. Sit non ex suscipit fugiat molestias, ipsa rerum tempore voluptates
                            adipisci rem cum?</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <ul class="menu">
                        <a href="index.php">
                            <li>Home</li>
                        </a>
                        <a href="about.php">
                            <li>About Us</li>
                        </a>
                        <a href="artical.php">
                            <li>Articles</li>
                        </a>
                        <a href="donator.php">
                            <li>Donations</li>
                        </a>
                        <a href="contact.php">
                            <li>Contact Us</li>
                        </a>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer End -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script type="text/javascript" src="js/swiper.min.js"></script>
    <script type="text/javascript" src="js/wow.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
</body>

</html>