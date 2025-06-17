
<!-- // session_start();
// $con = mysqli_connect('localhost', 'root', '', 'mypro_bbms');

// $message = "";

// if (isset($_POST['signup'])) {
//     $uname = mysqli_real_escape_string($con, $_POST['uname']);
//     /*$pass = password_hash($_POST['pass'], PASSWORD_BCRYPT);*/

//     $check = mysqli_query($con, "SELECT * FROM admin WHERE  = '$uname'");
//     if (mysqli_num_rows($check) > 0) {
//         $message = "Username already taken!";
//     } else {
//         $insert = mysqli_query($con, "INSERT INTO admin (uname, pass) VALUES ('$uname', '$pass')");
//         if ($insert) {
//             $message = "Sign Up Successful. You can now <a href='admin-home.php'>Sign In</a>.";
//         } else {
//             $message = "Error: " . mysqli_error($con);
//         }
//     }
// } -->

<?php
// Initialize message variable for feedback to user
$message = '';

// Database configuration - adjust to your MySQL credentials
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


// Process form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Establish database connection using PDO
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$db_name;charset=utf8mb4", $db_user, $db_password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Database connection failed: " . htmlspecialchars($e->getMessage()));
    }

    // Collect and sanitize POST data
    $name = trim($_POST['name'] ?? '');
    $password = trim($_POST['password'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $address = trim($_POST['address'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $bloodType = $_POST['type'] ?? '';
    $role = $_POST['role'] ?? '';
    $termsAgreed = isset($_POST['terms']);

    // Validate inputs
    if (empty($name) || empty($password) || empty($email) || empty($address) || empty($phone) || empty($bloodType) || empty($role)) {
        $message = "Please fill all the fields.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = "Invalid email format.";
    } elseif (!preg_match('/^\d{10}$/', $phone)) {
        $message = "Phone number must be exactly 10 digits.";
    } else{
        // Insert data into database
        $stmt = $pdo->prepare("INSERT INTO users (name, password ,email, address, phone, blood_type, role) VALUES (:name, :password ,:email, :address, :phone, :blood_type, :role)");

        try {
            $stmt->execute([
                ':name' => $name,
                ':password' => $password,
                ':email' => $email,
                ':address' => $address,
                ':phone' => $phone,
                ':blood_type' => $bloodType,
                ':role' => $role,
            ]);
            $message = "Registration successful!";
            // Clear inputs after successful registration
            $name = $password = $email = $address = $phone = $bloodType = $role = '';
            $termsAgreed = false;
        } catch (PDOException $e) {
            if ($e->getCode() == 23000) {
                $message = "Email already exists.";
            } else {
                $message = "Database error: " . htmlspecialchars($e->getMessage());
            }
        }
    }
    
}
?>




<!DOCTYPE html>
<html>
<head>
     <!-- website font  -->
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/swiper.min.css">
    <link rel="stylesheet" type="text/css" href="css/animate.css" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />

    <title>Sign Up</title>
    <title>Sign Up</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <!-- Animation Styles -->
    <style>
        .fade-in {
            animation: fadeIn 1s ease-in;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .btn-animate:active {
            transform: scale(0.98);
            transition: 0.1s ease-in-out;
        }

        /* input[type="text"],
    input[type="email"],
    input[type="tel"],
    select {
        width: 100%;
        padding: 8px 10px;
        margin-top: 5px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        font-size: 14px;
    }

    .checkbox-label {
        display: flex;
        align-items: center;
        font-weight: normal;
        margin-top: 10px;
    }
    .checkbox-label input[type="checkbox"] {
        margin-right: 10px;
        height: auto;
        cursor: pointer;
    }*/

    .reg-group {
        margin-top: 15px;
    }
    .message {
        margin-top: 15px;
        text-align: center;
        font-size: 14px;
        color: <?= (strpos($message, 'successful') !== false) ? 'green' : 'red'; ?>;
    } 

    #sign-up .button{

        text-align: center;
        margin-top :20px;
    }
    </style>
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
                        <a class="nav-link" href="contact.php">Contact Us</a>
                    </li>
                </ul>
                <button class="btn signup" onclick= "window.location.href = 'signup.php';">New Account</button>
                <button class="btn login" onclick= "window.location.href = 'login.php';">Login</button>
            </div>
        </nav>
    </section>
    <!-- Navbar 2 End -->


    <!-- Navigator Start -->
    <section id="navigator">
        <div class="container">
            <div class="path">
                <div class="path-main" style="color: darkred; display:inline-block;">Home</div>
                <div class="path-directio" style="color: grey; display:inline-block;"> / Sign up</div>
            </div>

        </div>
    </section>
    <!-- Navigator End -->

    <!-- Sign Up Start -->
    <section id="sign-up">
        <div class="container">
                <img src="imgs/logo.png" alt="">
                <form action="signup.php" method="POST" novalidate>
                    <?php if(!empty($message)): ?>
                        <div class="message"><?= htmlspecialchars($message) ?></div>
                    <?php endif; ?>
                    
                    <input type="text" id="name" name="name" placeholder="Name" required value="<?= htmlspecialchars($name ?? '') ?>"/>

                    <input type="password" id="password" name="password" placeholder="Password" required value="<?= htmlspecialchars($password ?? '') ?>"/>


    <input
        type="email"
        id="email"
        name="email"
        placeholder="Email"
        required
        value="<?= htmlspecialchars($email ?? '') ?>"
    />

    <input
        type="text"
        id="address"
        name="address"
        placeholder="Address"
        required
        value="<?= htmlspecialchars($address ?? '') ?>"
    />


    <input
        type="tel"
        id="phone"
        name="phone"
        placeholder="Phone Number (10 digits)"
        required
        pattern="\d{10}"
        value="<?= htmlspecialchars($phone ?? '') ?>"
    />


    <select id="type" name="type" required>
        <option value="" disabled <?= empty($bloodType) ? 'selected' : '' ?>>Blood Type</option>
        <option value="A+" <?= ($bloodType ?? '') === 'A+' ? 'selected' : '' ?>>A+</option>
        <option value="A-" <?= ($bloodType ?? '') === 'A-' ? 'selected' : '' ?>>A-</option>
        <option value="B+" <?= ($bloodType ?? '') === 'B+' ? 'selected' : '' ?>>B+</option>
        <option value="B-" <?= ($bloodType ?? '') === 'B-' ? 'selected' : '' ?>>B-</option>
        <option value="O+" <?= ($bloodType ?? '') === 'O+' ? 'selected' : '' ?>>O+</option>
        <option value="O-" <?= ($bloodType ?? '') === 'O-' ? 'selected' : '' ?>>O-</option>
        <option value="AB+" <?= ($bloodType ?? '') === 'AB+' ? 'selected' : '' ?>>AB+</option>
        <option value="AB-" <?= ($bloodType ?? '') === 'AB-' ? 'selected' : '' ?>>AB-</option>
    </select>


    <select id="role" name="role" required>
        <option value="" disabled <?= empty($role) ? 'selected' : '' ?>>Role</option>
        <option value="Donor" <?= ($role ?? '') === 'Donor' ? 'selected' : '' ?>>Donor</option>
        <option value="Patient" <?= ($role ?? '') === 'Patient' ? 'selected' : '' ?>>Patient</option>
    </select>
 <div  class="button"><button   type="submit" name="signup" style="background-color: rgb(51, 58, 65); ">Submit</button></div>
    
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

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Simple JavaScript Animation Feedback -->
    <!-- <script>
        document.getElementById('signupForm').addEventListener('submit', function () {
            const btn = document.querySelector('button[name="signup"]');
            btn.innerHTML = `<span class="spinner-border spinner-border-sm me-2"></span>Signing Up...`;
            btn.disabled = true;
        });
    </script> -->
</body>
</html>

