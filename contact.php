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
    <link rel="stylesheet" type="text/css" href="css/style.css" />

    <title>Contact Us</title>
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
                <button class="btn signup" onclick= "window.location.href = './signup.php';">New Account</button>
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
                <div class="path-directio" style="color: grey; display:inline-block;"> / Contact Us</div>
            </div>

        </div>
    </section>
    <!-- Navigator End -->

    <!-- login Start -->
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-md-6 call">
                    <div class="title">Head</div>
                    <img src="imgs/logo.png" alt="">
                    <hr>
                    <h4>Mobile: +20 127 245 6884</h3>
                        <h4>Fax: +2 455 6646</h3>
                            <h4>Email: InfoBloodBank@gmail.com</h3>
                                <hr>
                                <h3>Find Us On</h3>
                                <div class="icons">
                                    <i class="fab fa-facebook-square fa-3x"></i>
                                    <i class="fab fa-google-plus-square fa-3x"></i>
                                    <i class="fab fa-twitter-square fa-3x"></i>
                                    <i class="fab fa-whatsapp-square fa-3x"></i>
                                    <i class="fab fa-youtube-square fa-3x"></i>
                                </div>
                </div>
                <div class="col-md-6 info">
                    <div class="title">Head</div>
                    <form action="submit">
                        <input type="text" name="name" id="" placeholder="Name" required="">
                        <input type="email" name="name" id="" placeholder="Email" required="">
                        <input type="number" name="name" id="" placeholder="Phone" required="">
                        <input type="text" name="title" id="" placeholder="Title" required="">
                        <textarea name="message" id="" cols="10" rows="5" placeholder="Message"></textarea>
                        <div class="reg-group">
                            <button type="submit">Send</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- login End -->

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
</body>

</html>