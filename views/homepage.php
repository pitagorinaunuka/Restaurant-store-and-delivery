<!DOCTYPE html>
<html lang="en">

<head>
    <title>Pizzeria</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nothing+You+Could+Do" rel="stylesheet">
    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/ionicons.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php if(session_status() == PHP_SESSION_NONE) session_start(); ?>
    <!-- Navbar start -->
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="index.html"><span class="flaticon-pizza-1 mr-1"></span>Pizza &
                Restaurant<br><small>Galija</small></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span>Menu
            </button>
            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active"><a href="#home" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="#about" class="nav-link">About</a></li>
                    <li class="nav-item"><a href="#services" class="nav-link">Services</a></li>
                    <li class="nav-item"><a href="#pizza-offers" class="nav-link">Pizza offers</a></li>
                    <li class="nav-item"><a href="#menu" class="nav-link">Menu</a></li>
                    <li class="nav-item"><a href="#order-list" class="nav-link">Order</a></li>
                    <li class="nav-item"><a href="#contact" class="nav-link">Contact</a></li>
                    <?php if(isset($_SESSION['user'])){ ?>
                    <?php if($_SESSION['user']->role == "administrator"){ ?>
                    <li class="nav-item"><a href="./panel" class="nav-link btn btn-default">Panel</a></li>
                    <?php } elseif($_SESSION['user']->role == "user"){ ?>
                    <li class="nav-item"><a href="./logout" class="nav-link btn btn-default">Logout</a></li>
                    <?php } ?>
                    <?php } else { ?>
                    <li class="nav-item"><a href="" class="nav-link btn btn-default" data-toggle="modal"
                            data-target="#modalLRForm">Register</a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Navbar end -->


    <!-- Slider section start -->
    <section class="home-slider owl-carousel img" style="background-image: url(images/bg_1.jpg);" id="#home">
        <div class="slider-item">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text align-items-center" data-scrollax-parent="true">

                    <div class="col-md-6 col-sm-12 ftco-animate">
                        <span class="subheading">Delicious</span>
                        <h1 class="mb-4">Margherita</h1>
                        <p class="mb-4 mb-md-5">A selection of Italian cheese with tomato and oregano</p>
                        <p><a href="#pizza-offers" class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3">View
                                Menu</a></p>
                    </div>
                    <div class="col-md-6 ftco-animate">
                        <img src="images/bg_1.png" class="img-fluid" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="slider-item">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text align-items-center" data-scrollax-parent="true">
                    <div class="col-md-6 col-sm-12 order-md-last ftco-animate">
                        <span class="subheading">Crunchy</span>
                        <h1 class="mb-4">Tabasco pizza</h1>
                        <p class="mb-4 mb-md-5">Pepperoni sausage, tomato, mozzarella, oregano. Add jalapeños to your
                            Tabasco for an extra 1KM</p>
                        <p><a href="#pizza-offers" class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3">View
                                Menu</a></p>
                    </div>
                    <div class="col-md-6 ftco-animate">
                        <img src="images/bg_2.png" class="img-fluid" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Slider section end -->


    <!--Modal: Login / Register Form-->
    <div class="modal fade" id="modalLRForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog cascading-modal" role="document">
            <!--Content-->
            <div class="modal-content">

                <!--Modal cascading tabs-->
                <div class="modal-c-tabs">
                    <div id="tabs">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs md-tabs tabs-2 light-blue darken-3" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#panel7" role="tab">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#panel8" role="tab">Register</a>
                            </li>
                        </ul>
                    </div>

                    <!-- Tab panels -->
                    <div class="tab-content">
                        <!--Panel 7-->
                        <form class="tab-pane fade in show active" id="panel7" role="tabpanel" method="POST"
                            action="./login">

                            <!--Body-->
                            <div class="modal-body mb-1 text-center">
                                <div class="md-form form-sm mb-4">
                                    <input type="email" id="modalLRInput10" class="form-control1" placeholder="Email"
                                        name="email_login">
                                    <label data-error="wrong" data-success="right" for="modalLRInput10"></label>
                                </div>
                                <div class="md-form form-sm mb-2">
                                    <input type="password" id="modalLRInput11" class="form-control1"
                                        placeholder="Password" name="password_login">
                                    <label data-error="wrong" data-success="right" for="modalLRInput11"></label>
                                </div>
                                <div class="text-center mt-2">
                                    <button class="btn btn-info1" type="submit" form="panel7"><span
                                            class="button-text-sizes">Log in</span></button>
                                </div>
                            </div>
                            <!--Footer-->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-info waves-effect ml-auto"
                                    data-dismiss="modal">Close</button>
                            </div>

                        </form>
                        <!--/.Panel 7-->

                        <!--Panel 8-->
                        <form class="tab-pane fade" id="panel8" role="tabpanel" method="POST" action="./register">

                            <!--Body-->
                            <div class="modal-body text-center">
                                <div class="md-form form-sm mb-4">
                                    <i class="fas fa-envelope prefix"></i>
                                    <input type="text" id="modalLRInput12" class="form-control1" placeholder="Name"
                                        name="first_name" required>
                                    <label data-error="wrong" data-success="right" for="modalLRInput12"></label>
                                </div>

                                <div class="md-form form-sm mb-4">
                                    <i class="fas fa-lock prefix"></i>
                                    <input type="text" id="modalLRInput13" class="form-control1" placeholder="Last name"
                                        name="last_name" required>
                                    <label data-error="wrong" data-success="right" for="modalLRInput13"></label>
                                </div>

                                <div class="md-form form-sm mb-4">
                                    <i class="fas fa-lock prefix"></i>
                                    <input type="email" id="modalLRInput14" class="form-control1" placeholder="Email"
                                        name="email" required>
                                    <label data-error="wrong" data-success="right" for="modalLRInput14"></label>
                                    <div class="md-form form-sm mb-2" style="opacity: 1">
                                        <div style="color: red;font-size: 18px;" id="emailAvailability"></div>
                                    </div>
                                </div>

                                <div class="md-form form-sm mb-4">
                                    <i class="fas fa-lock prefix"></i>
                                    <input type="password" id="modalLRInput14" class="form-control1"
                                        placeholder="Password" name="password" required>
                                    <label data-error="wrong" data-success="right" for="modalLRInput14"></label>
                                </div>

                                <div class="text-center form-sm mt-2">
                                    <button class="btn btn-info1" type="submit" form="panel8"><span
                                            class="button-text-sizes">Sign up</span></button>
                                </div>

                            </div>
                            <!--Footer-->
                            <div class="modal-footer">

                            </div>
                        </form>
                        <!--/.Panel 8-->
                    </div>

                </div>
            </div>
            <!--/.Content-->
        </div>
    </div>
    <!--Modal: Login / Register Form-->





    <!-- About section start -->
    <section class="ftco-intro" id="about">
        <div class="container-wrap">
            <div class="wrap d-md-flex">
                <div class="info">
                    <div class="row no-gutters">
                        <div class="col-md-4 d-flex ftco-animate">
                            <div class="icon"><span class="icon-phone"></span></div>
                            <div class="text">
                                <h3>+387 33 443-350</h3>
                                <p>Arrange special events like parties or birthdays</p>
                            </div>
                        </div>
                        <div class="col-md-4 d-flex ftco-animate">
                            <div class="icon"><span class="icon-my_location"></span></div>
                            <div class="text">
                                <h3>Čobanija 20, Sarajevo, BiH </h3>
                                <p>In the center of the city with a beautiful view</p>
                            </div>
                        </div>
                        <div class="col-md-4 d-flex ftco-animate">
                            <div class="icon"><span class="icon-clock-o"></span></div>
                            <div class="text">
                                <h3>Open Monday-Saturday</h3>
                                <p>8:00AM - 10:00PM</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="social d-md-flex pl-md-5 p-4 align-items-center">
                    <ul class="social-icon">
                        <li class="ftco-animate"><a href="https://www.facebook.com/restaurant.galija/?ref=br_rs"><span
                                    class="icon-facebook"></span></a></li>
                        <li class="ftco-animate"><a
                                href="https://www.instagram.com/explore/locations/276558844/restoran-galija/?hl=hr"><span
                                    class="icon-instagram"></span></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="ftco-about d-md-flex">
        <div class="one-half img" style="background-image: url(images/about.jpg);"></div>
        <div class="one-half ftco-animate">
            <div class="heading-section ftco-animate ">
                <h2 class="mb-4">About <span class="flaticon-pizza">Pizza & Restaurant </span>Galija</h2>
            </div>
            <div>
                <p>In addition to a rich assortment of dishes, in our house, you can try many of the world drinks and
                    various types of quality wine.
                    With all this we have pointed out, and as you can see on our website, visit the pizzeria “Gaul” and
                    make sure to everything we said. A special service we offer our youngest guests with fun and games
                    and a variety of gifts that get in the house, can enjoy a menu that is specifically tailored to
                    them. n this unique facility with the many offers of food and drink and with proven maximum hygiene
                    pizzeria “Galija” has become a brand of Sarajevo. As part of our offer is also organizing different
                    receptions, birthday parties and business cocktails. Services to organize all the reception we also
                    outside our facility.</p>
            </div>
        </div>
    </section>
    <!-- About section end -->


    <!-- Services section start -->
    <section class="ftco-section ftco-services" id="services">
        <div class="overlay"></div>
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section ftco-animate text-center">
                    <h2 class="mb-4">Our Services</h2>
                    <p>Our team of staff and chefs will provide the best service for you. Only the finest igredients are
                        used in the process in order for every bite to count.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 ftco-animate">
                    <div class="media d-block text-center block-6 services">
                        <div class="icon d-flex justify-content-center align-items-center mb-5">
                            <span class="flaticon-diet"></span>
                        </div>
                        <div class="media-body">
                            <h3 class="heading">Healthy ingredients</h3>
                            <p>Only fresh and healty ingredients are used when making every meal both for meat lovers
                                and vegetarians</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 ftco-animate">
                    <div class="media d-block text-center block-6 services">
                        <div class="icon d-flex justify-content-center align-items-center mb-5">
                            <span class="flaticon-bicycle"></span>
                        </div>
                        <div class="media-body">
                            <h3 class="heading">Fast Delivery</h3>
                            <p>For the bill of 15KM you get free delivery directly to your address</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 ftco-animate">
                    <div class="media d-block text-center block-6 services">
                        <div class="icon d-flex justify-content-center align-items-center mb-5">
                            <span class="flaticon-pizza-1"></span>
                        </div>
                        <div class="media-body">
                            <h3 class="heading">Original Recipes</h3>
                            <p>Our chefs are using original and traditional recipes which make us unique</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Services section end -->


    <!-- Pizza section start -->
    <section class="ftco-section" id="pizza-offers">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section ftco-animate text-center">
                    <h2 class="mb-4">Hot Pizza Meals</h2>
                    <p>For pizza lovers, we prepared some of our best pizza meals. Enjoj!</p>
                </div>
            </div>
        </div>
        <div class="container-wrap">
            <div class="row no-gutters d-flex">
                <?php $sql = "SELECT * FROM foodcategories WHERE category = 'pizza' OR category = 'Pizza' OR category = 'PIZZA'";
          $result = Flight::db()->query($sql);
          $row = $result->fetch_assoc();
          ?>
                <?php foreach($foods as $food){ ?>
                <?php if($food['category'] == $row['id']){ ?>
                <div class="col-lg-4 d-flex ftco-animate">
                    <div class="services-wrap d-flex">
                        <a class="img" style="background-image: url('food_images/<?php echo $food['image'];?>');"></a>
                        <div class="text p-4">
                            <h3><?php echo $food['food'] ?> <span
                                    class="ml-2 btn btn-white btn-outline-white">HOT</span></h3>
                            <p><?php echo $food['description']; ?></p>
                            <p class="price"><span><?php echo $food['price']; ?>KM</span></p>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <?php } ?>


            </div>
        </div>

        <div class="container" id="menu">
            <div class="row justify-content-center mb-5 pb-3 mt-5 pt-5">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <h2 class="mb-4">Our Menu Pricing</h2>
                    <p class="flip"><span class="deg1"></span><span class="deg2"></span><span class="deg3"></span></p>
                    <p class="mt-5">We use only fresh and healty ingredients from local farms and serve directly to you!
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <?php $sql = "SELECT * FROM foodcategories WHERE NOT category = 'Pizza' AND NOT category = 'Pizza' AND NOT category = 'PIZZA' ORDER BY category ASC";
              $result = Flight::db()->query($sql);
              ?>
                        <?php foreach($foods as $food){ ?>
                        <?php foreach($result as $category){ ?>
                        <?php if($food['category'] == $category['id']){ ?>
                        <div class="col-md-6 pricing-entry d-flex ftco-animate">
                            <div class="img" style="background-image: url('food_images/<?php echo $food['image'];?>');">
                            </div>
                            <div class="desc pl-3">
                                <div class="d-flex text align-items-center">
                                    <h3><span><?php echo $category['category'] ?> <?php echo $food['food'] ?></span>
                                    </h3>
                                    <span class="price"><?php echo $food['price']; ?>KM</span>
                                </div>
                                <div class="d-block">
                                    <p><?php echo $food['description']; ?></p>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                        <?php } ?>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Pizza section end -->


    <!-- Menu section end -->
    <section class="ftco-menu">
        <div class="container-fluid">
            <div class="row d-md-flex">
                <div class="col-lg-4 ftco-animate img f-menu-img mb-5 mb-md-0"
                    style="background-image: url(images/about.jpg);">
                </div>
                <div class="col-lg-8 ftco-animate p-md-5">
                    <div class="row">
                        <div class="col-md-12 nav-link-wrap mb-5">
                            <div class="nav ftco-animate nav-pills" id="v-pills-tab" role="tablist"
                                aria-orientation="vertical">
                                <a class="nav-link active" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1"
                                    role="tab" aria-controls="v-pills-1" aria-selected="true">Salads</a>

                                <a class="nav-link" id="v-pills-2-tab" data-toggle="pill" href="#v-pills-2" role="tab"
                                    aria-controls="v-pills-2" aria-selected="false">Pancakes</a>

                                <a class="nav-link" id="v-pills-3-tab" data-toggle="pill" href="#v-pills-3" role="tab"
                                    aria-controls="v-pills-3" aria-selected="false">Desserts</a>

                                <a class="nav-link" id="v-pills-4-tab" data-toggle="pill" href="#v-pills-4" role="tab"
                                    aria-controls="v-pills-4" aria-selected="false">Shakes</a>
                            </div>
                        </div>

                        <div class="col-md-12 d-flex align-items-center">
                            <div class="tab-content ftco-animate" id="v-pills-tabContent">
                                <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel"
                                    aria-labelledby="v-pills-1-tab">
                                    <div class="row">
                                        <?php $sql = "SELECT * FROM foodcategories WHERE category = 'Salad' ORDER BY category ASC";
                        $result = Flight::db()->query($sql);
                        ?>
                                        <?php foreach($foods as $food){ ?>
                                        <?php foreach($result as $category){ ?>
                                        <?php if($food['category'] == $category['id']){ ?>
                                        <div class="col-md-3 text-center">
                                            <div class="menu-wrap">
                                                <a href="#" class="menu-img img mb-4"
                                                    style="background-image: url('food_images/<?php echo $food['image'];?>');"></a>
                                                <div class="text">
                                                    <h3><a href="#"><?php echo $food['food']; ?></a></h3>
                                                    <p><?php echo $food['description']; ?></p>
                                                    <p class="price"><span><?php echo $food['price']; ?>KM</span></p>
                                                </div>
                                            </div>
                                        </div>
                                        <?php } ?>
                                        <?php } ?>
                                        <?php } ?>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="v-pills-2" role="tabpanel"
                                    aria-labelledby="v-pills-2-tab">
                                    <div class="row">
                                        <?php $sql = "SELECT * FROM foodcategories WHERE category = 'Pancake' ORDER BY category ASC";
                        $result = Flight::db()->query($sql);
                        ?>
                                        <?php foreach($foods as $food){ ?>
                                        <?php foreach($result as $category){ ?>
                                        <?php if($food['category'] == $category['id']){ ?>
                                        <div class="col-md-3 text-center">
                                            <div class="menu-wrap">
                                                <a href="#" class="menu-img img mb-4"
                                                    style="background-image: url('food_images/<?php echo $food['image'];?>');"></a>
                                                <div class="text">
                                                    <h3><a href="#"><?php echo $food['food']; ?></a></h3>
                                                    <p><?php echo $food['description']; ?></p>
                                                    <p class="price"><span><?php echo $food['price']; ?>KM</span></p>
                                                </div>
                                            </div>
                                        </div>
                                        <?php } ?>
                                        <?php } ?>
                                        <?php } ?>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="v-pills-3" role="tabpanel"
                                    aria-labelledby="v-pills-3-tab">
                                    <div class="row">
                                        <?php $sql = "SELECT * FROM foodcategories WHERE category = 'Dessert' ORDER BY category ASC";
                        $result = Flight::db()->query($sql);
                        ?>
                                        <?php foreach($foods as $food){ ?>
                                        <?php foreach($result as $category){ ?>
                                        <?php if($food['category'] == $category['id']){ ?>
                                        <div class="col-md-3 text-center">
                                            <div class="menu-wrap">
                                                <a href="#" class="menu-img img mb-4"
                                                    style="background-image: url('food_images/<?php echo $food['image'];?>');"></a>
                                                <div class="text">
                                                    <h3><a href="#"><?php echo $food['food']; ?></a></h3>
                                                    <p><?php echo $food['description']; ?></p>
                                                    <p class="price"><span><?php echo $food['price']; ?>KM</span></p>
                                                </div>
                                            </div>
                                        </div>
                                        <?php } ?>
                                        <?php } ?>
                                        <?php } ?>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="v-pills-4" role="tabpanel"
                                    aria-labelledby="v-pills-4-tab">
                                    <div class="row">
                                        <?php $sql = "SELECT * FROM foodcategories WHERE category = 'Shake' ORDER BY category ASC";
                        $result = Flight::db()->query($sql);
                        ?>
                                        <?php foreach($foods as $food){ ?>
                                        <?php foreach($result as $category){ ?>
                                        <?php if($food['category'] == $category['id']){ ?>
                                        <div class="col-md-3 text-center">
                                            <div class="menu-wrap">
                                                <a href="#" class="menu-img img mb-4"
                                                    style="background-image: url('food_images/<?php echo $food['image'];?>');"></a>
                                                <div class="text">
                                                    <h3><a href="#"><?php echo $food['food']; ?></a></h3>
                                                    <p><?php echo $food['description']; ?></p>
                                                    <p class="price"><span><?php echo $food['price']; ?>KM</span></p>
                                                </div>
                                            </div>
                                        </div>
                                        <?php } ?>
                                        <?php } ?>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Menu section end -->


    <!-- Order section start -->
    <section class="ftco-section" id="order-list">

        <div class="container" id="menu">
            <div class="row justify-content-center mb-5 pb-3 mt-5 pt-5">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <h2 class="mb-4">Order now!</h2>
                    <p class="flip"><span class="deg1"></span><span class="deg2"></span><span class="deg3"></span></p>
                    <p class="mt-5">Your order will be placed right away and it will be delivered to your address for
                        free!</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form id="orders" method="post" action="/order">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">First name</label>
                                <input type="text" class="form-control" id="inputName4" name="first_name" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Last name</label>
                                <input type="text" class="form-control" id="inputLastname4" name="last_name" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">City</label>
                            <input type="text" class="form-control" id="inputCity" name="city" required>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress2">Address</label>
                            <input type="text" class="form-control" id="inputAddress2" name="address" required>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputCity">Phone number</label>
                                <input type="number" class="form-control" name="telephone" id="telephone" required>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="inputState">Order</label>
                                <select id="inputState" class="form-control" name="food" required>
                                    <?php foreach($categories as $category){ ?>
                                    <optgroup label="<?php echo $category['category'];?>"
                                        style="background-color: #aaa !important">
                                        <?php foreach($foods as $food){ ?>
                                        <?php if($food['category'] == $category['id']){ ?>
                                        <option value="<?php echo $food['id']?>"><?php echo $food['food']; ?></option>
                                        <?php } ?>
                                        <?php } ?>
                                    </optgroup>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputZip">Quantity</label>
                                <input type="number" class="form-control" id="inputQuantity" name="quantity">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Place your order</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Order section end -->





    <!-- Contact section start -->
    <section class="ftco-appointment" id="contact">
        <div class="overlay"></div>
        <div class="container-wrap">
            <div class="row no-gutters d-md-flex align-items-center">
                <div class="col-md-6 d-flex align-self-stretch">
                    <div class="mapouter">
                        <div class="gmap_canvas"><iframe width="600" height="500" id="gmap_canvas"
                                src="https://maps.google.com/maps?q=%C4%8Cobanija%2020%2C%20BIH%2C%20Sarajevo%2071000&t=&z=17&ie=UTF8&iwloc=&output=embed"
                                frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a
                                href="https://www.jetzt-drucken-lassen.de">jetzt-drucken-lassen.de</a>
                        </div>
                        <style>
                        .mapouter {
                            text-align: right;
                            height: 500px;
                            width: 600px;
                        }

                        .gmap_canvas {
                            overflow: hidden;
                            background: none !important;
                            height: 500px;
                            width: 600px;
                        }
                        </style>
                    </div>
                </div>
                <div class="col-md-6 appointment ftco-animate">
                    <h3 class="mb-3">Write Us!</h3>
                    <form action="./writeUs" class="appointment-form" method="POST">
                        <div class="d-md-flex">
                            <div class="form-group">
                                <input required type="text" class="form-control"
                                    placeholder='<?php if(!isset($_SESSION['user'])){echo "Please login first";}else{echo "First Name";} ?>'
                                    name="first_name" <?php if(!isset($_SESSION['user']))echo 'disabled=""'; ?>
                                    <?php if(!isset($_SESSION['user'])){echo 'style="background-color: rgba(255, 0, 0, 0.1) !important;border-radius: 3px;padding: 5px 5px;"';} ?>>
                            </div>
                        </div>
                        <div class="d-me-flex">
                            <div class="form-group">
                                <input required type="text" class="form-control"
                                    placeholder='<?php if(!isset($_SESSION['user'])){echo "Please login first";}else{echo "Last Name";} ?>'
                                    name="last_name" <?php if(!isset($_SESSION['user']))echo 'disabled=""'; ?>
                                    <?php if(!isset($_SESSION['user'])){echo 'style="background-color: rgba(255, 0, 0, 0.1) !important;border-radius: 3px;padding: 5px 5px;"';} ?>>
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea required name="message" id="" cols="30" rows="3" class="form-control"
                                placeholder='<?php if(!isset($_SESSION['user'])){echo "Please login first";}else{echo "Message";} ?>'
                                <?php if(!isset($_SESSION['user']))echo 'disabled=""'; ?>
                                <?php if(!isset($_SESSION['user'])){echo 'style="background-color: rgba(255, 0, 0, 0.1) !important;border-radius: 3px;padding: 5px 5px;"';} ?>></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Send" class="btn btn-primary py-3 px-4"
                                <?php if(!isset($_SESSION['user']))echo 'disabled=""'; ?>>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact section end -->


    <!-- Footer section start -->
    <section class="ftco-counter ftco-bg-dark img" id="section-counter">
        <div class="overlay"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="row">
                        <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18 text-center">
                                <div class="text">
                                    <div class="icon"><span class="flaticon-pizza-1"></span></div>
                                    <strong class="number" data-number="360">0</strong>
                                    <span>Pizza Branches</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18 text-center">
                                <div class="text">
                                    <div class="icon"><span class="flaticon-medal"></span></div>
                                    <strong class="number" data-number="15">0</strong>
                                    <span>Number of Awards</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18 text-center">
                                <div class="text">
                                    <div class="icon"><span class="flaticon-laugh"></span></div>
                                    <strong class="number" data-number="10253">0</strong>
                                    <span>Happy Customers</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18 text-center">
                                <div class="text">
                                    <div class="icon"><span class="flaticon-chef"></span></div>
                                    <strong class="number" data-number="50">0</strong>
                                    <span>Staff</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer section end -->


    <!-- Subscription section start -->
    <div class="simple-subscription-form row">
        <div class="col-lg-4"></div>
        <div class="col-lg-4 center">
            <form id="subscribe" action="./subscribe" method="POST">
                <h4 class="text-center">Subscribe:</h4>
                <div class="input-group justify-content-center">
                    <input class="input-group-field email" type="email" placeholder="E-mail" required
                        name="subscribe_email">
                    <button class="button-subscribe justify-content-center">Sign up now</button>
                </div>
            </form>
        </div>
        <div class="col-lg-4"></div>
    </div>
    <!-- Subscription section end -->


    <!-- Loader -->
    <div id="ftco-loader" class="show fullscreen">
        <svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
                stroke="#F96D00" /></svg>
    </div>

    <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>



    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-migrate-3.0.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/jquery.timepicker.min.js"></script>
    <script src="js/scrollax.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false">
    </script>
    <script src="js/google-map.js"></script>
    <script src="js/main.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>

</body>

<script>
$('#orders').validate({
    focusCleanup: true,
    errorElement: "em",
    rules: {
        name1: 'required',
        lastname1: 'required',
        city1: 'required',
        address1: 'required',
        number1: 'required',
        order1: 'required',
        quantity1: 'required',
    },

    messages: {
        name1: 'This field is required',
        lastname1: 'This field is required',
        city1: 'Enter a valid city name',
        address1: 'Enter a valid address',
        number1: 'Enter a valid number',
        order1: 'Choose a meal',
        quantity1: 'Enter valid number',
    },
    submitHandler: function(form) {
        if (confirm('Confirm')) {
            console.log(form);
            form.submit();
        } else {
            alert('Error');
        }

    }
});
</script>

<script src="ajaxCheckUsername.js"></script>













</html>