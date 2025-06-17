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

    <title>Donations</title>
</head>

<body>


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
                <div class="path-directio" style="color: grey; display:inline-block;"> / Donations</div>
            </div>

        </div>
    </section>
    <!-- Navigator End -->

    <!-- Requests Start -->
    <section id="requests">
        <div class="title">
            <h2>Donations</h2>
            <hr class="line">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <select name="Type" id="">
                        <option value="" disabled selected>Select Blood Type</option>
                        <option value="AB+">AB+</option>
                        <option value="O">O</option>
                        <option value="B">B</option>
                    </select>
                </div>
                <div class="col-lg-5">
                    <select name="City" id="">
                        <option value="" disabled selected>Select City</option>
                        <option value="Alexandria">Alexandria</option>
                        <option value="Cairo">Cairo</option>
                        <option value="Giza">Giza</option>
                    </select>
                </div>
                <div class="search">
                    <button><i class="col-lg-2 fas fa-search"></i></button>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="type">
                                <h2>AB+</h2>
                            </div>
                        </div>
                        <div class="data col-lg-6">
                            <h4>Name: Ahmed Mohamed</h4>
                            <h4>Hospital: Andalusia Hospitals</h4>
                            <h4>City: Cairo</h4>
                        </div>
                        <div class="col-lg-3">
                            <button onclick= "window.location.href = 'donarDetailes.php';">Details</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="type">
                                <h2>B</h2>
                            </div>
                        </div>
                        <div class="data col-lg-6">
                            <h4>Name: Ahmed Mohamed</h4>
                            <h4>Hospital: Andalusia Hospitals</h4>
                            <h4>City: Giza</h4>
                        </div>
                        <div class="col-lg-3">
                            <button onclick= "window.location.href = 'donarDetailes.php';">Details</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="type">
                                <h2>AB+</h2>
                            </div>
                        </div>
                        <div class="data col-lg-6">
                            <h4>Name: Ahmed Mohamed</h4>
                            <h4>Hospital: Andalusia Hospitals</h4>
                            <h4>City: Cairo</h4>
                        </div>
                        <div class="col-lg-3">
                            <button onclick= "window.location.href = 'donarDetailes.php';">Details</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="type">
                                <h2>O</h2>
                            </div>
                        </div>
                        <div class="data col-lg-6">
                            <h4>Name: Ahmed Mohamed</h4>
                            <h4>Hospital: Andalusia Hospitals</h4>
                            <h4>City: Giza</h4>
                        </div>
                        <div class="col-lg-3">
                            <button onclick= "window.location.href = 'donarDetailes.php';">Details</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="type">
                                <h2>AB+</h2>
                            </div>
                        </div>
                        <div class="data col-lg-6">
                            <h4>Name: Ahmed Mohamed</h4>
                            <h4>Hospital: Andalusia Hospitals</h4>
                            <h4>City: Cairo</h4>
                        </div>
                        <div class="col-lg-3">
                            <button onclick= "window.location.href = 'donarDetailes.php';">Details</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="page-num">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
        </div>
    </section>
    <!-- Requests End -->
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