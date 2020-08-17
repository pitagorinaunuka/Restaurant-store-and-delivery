<!DOCTYPE html>
<html lang="en">

<head>
    <title>Pizzeria</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nothing+You+Could+Do" rel="stylesheet">
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="css/flaticon.css">
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
                    <li class="nav-item"><a href="//localhost" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="panel/menu" class="nav-link">Menu</a></li>
                    <?php if(isset($_SESSION['user'])){ ?>
                    <?php if($_SESSION['user']->role == "administrator"){ ?>
                    <li class="nav-item"><a href="./logout" class="nav-link btn btn-default">Logout</a></li>
                    <?php } ?>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Navbar end -->
    <div class="container mt-3" style="background-color: #1c323e;border: 1px solid #aaa">
        <div class="row">
            <div class="col-md-12 mt-1">
                <div class="alert alert-success mt-3" role="alert">
                    <p>Dobrodošli na vaš control panel. Ovdje možete vidjeti broj registrovanih korisnika, broj
                        trenutnih narudžbi, broj poruka i messenger listu (subscriptions).</p>
                    <hr>
                    <p>Ukoliko želite da vidite listu trenutačno dostupnih jela, tj. menu, nastavite na "MENU" link u
                        navbaru.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="alert panel-alert-counter-wrapper alert-primary" role="alert">
                    <div class="row">
                        <div class="col-md-12 panel-alert-counter-title">Ukupno korisnika:</div>
                        <div class="col-md-12 panel-alert-counter-number">
                            <?php echo Flight::panelCount()->totalUsers() ?></div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="alert panel-alert-counter-wrapper alert-info" role="alert">
                    <div class="row">
                        <div class="col-md-12 panel-alert-counter-title">Narudžbi na čekanju:</div>
                        <div class="col-md-12 panel-alert-counter-number">
                            <?php echo Flight::panelCount()->totalPendingOrders() ?></div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="alert panel-alert-counter-wrapper alert-success" role="alert">
                    <div class="row">
                        <div class="col-md-12 panel-alert-counter-title">Ukupno poruka:</div>
                        <div class="col-md-12 panel-alert-counter-number">
                            <?php echo Flight::panelCount()->totalMessages() ?></div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="alert panel-alert-counter-wrapper alert-warning" role="alert">
                    <div class="row">
                        <div class="col-md-12 panel-alert-counter-title">Ukupno narudžbi:</div>
                        <div class="col-md-12 panel-alert-counter-number">
                            <?php echo Flight::panelCount()->totalOrders() ?></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- NARUDZBE -->
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-info" role="alert" style="font-size: 14px;font-weight: 700;">
                    <div class="row">
                        <div class="col-md-12" style="border-bottom: 1px solid #aaa; padding-bottom: 10px;">
                            <a data-toggle="collapse" href="#collapseOrders" role="button" aria-expanded="false"
                                aria-controls="collapseOrders" style="color: #383d41;">Narudžbe na čekanju</a>
                        </div>

                        <div class="col-md-12 collapse show" id="collapseOrders">
                            <table class="table" style="color: #383d41">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Narudžba</th>
                                        <th>Količina</th>
                                        <th>Ime i prezime</th>
                                        <th>Vrijeme</th>
                                        <th>Telefon</th>
                                        <th>Adresa</th>
                                        <th>Operacije</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($pendingOrders as $index => $pendingOrder){ ?>
                                    <tr>
                                        <th><?php echo $index + 1; ?></th>
                                        <th>
                                            <?php 
                    $sql = "SELECT * FROM foods WHERE id = '" . $pendingOrder['food'] . "'";
                    $result = Flight::db()->query($sql);
                    $row = $result->fetch_assoc();
                    $sql = "SELECT * FROM foodcategories WHERE id = '" . $row['category'] . "'";
                    $result = Flight::db()->query($sql);
                    $category = $result->fetch_assoc();
                    ?>
                                            <?php echo "(" . strtoupper($category['category']) . ") " . $row['food']; ?>
                                        </th>
                                        <th><?php echo $pendingOrder['quantity']; ?></th>
                                        <th><?php echo $pendingOrder['first_name'] . " " . $pendingOrder['last_name']; ?>
                                        </th>
                                        <th><?php echo(substr(((explode(" ", $pendingOrder['dateTime']))[1]), 0, 5)); ?>
                                        </th>
                                        <th><?php echo $pendingOrder['telephone']; ?></th>
                                        <th><?php echo $pendingOrder['address']; ?></th>
                                        <th class="d-flex">
                                            <form action="/panel/orderProcessed/" method="POST"
                                                style="margin-right: 5px;">
                                                <button type="submit" class="btn btn-sm btn-success order-button">
                                                    <i class="fas fa-check"></i>
                                                </button>
                                                <input name="orderID" type="hidden"
                                                    value="<?php echo $pendingOrder['id']; ?>">
                                            </form>
                                            <form action="/panel/orderDelete/" method="POST">
                                                <button type="submit" class="btn btn-sm btn-danger order-button">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                                <input name="orderID" type="hidden"
                                                    value="<?php echo $pendingOrder['id']; ?>">
                                            </form>
                                        </th>

                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- MESSAGES -->
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-info" role="alert" style="font-size: 14px;font-weight: 700;">
                    <div class="row">
                        <div class="col-md-12" style="border-bottom: 1px solid #aaa; padding-bottom: 10px;">
                            <a data-toggle="collapse" href="#collapseMessages" role="button" aria-expanded="false"
                                aria-controls="collapseMessages" style="color: #383d41;">Poruke</a>
                        </div>

                        <div class="col-md-12 collapse" id="collapseMessages">
                            <table class="table" style="color: #383d41">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Ime i prezime</th>
                                        <th>E-mail</th>
                                        <th>Datum</th>
                                        <th>Vrijeme</th>
                                        <th>Operacije</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($messages as $index => $message){ ?>
                                    <tr>
                                        <th><?php echo $index + 1; ?></th>
                                        <th>
                                            <a href="/panel/messages/<?php echo $message['id'];?>" class="messageLink">
                                                <?php echo $message['first_name'] . " " . $message['last_name']; ?>
                                            </a>
                                        </th>
                                        <th><?php echo $message['email']; ?></th>
                                        <th><?php echo((explode(" ", $message['dateTime']))[0]) ?></th>
                                        <th><?php echo(substr(((explode(" ", $message['dateTime']))[1]), 0, 5)) ?></th>
                                        <th>
                                            <form action="/panel/messages/<?php echo $message['id'];?>" method="POST">
                                                <button type="submit" class="btn btn-sm btn-danger order-button">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                                <input name="messageID" type="hidden"
                                                    value="<?php echo $message['id']; ?>">
                                            </form>
                                        </th>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- KORISNICI -->
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-info" role="alert" style="font-size: 14px;font-weight: 700;">
                    <div class="row">
                        <div class="col-md-12" style="border-bottom: 1px solid #aaa; padding-bottom: 10px;">
                            <a data-toggle="collapse" href="#collapseUsers" role="button" aria-expanded="false"
                                aria-controls="collapseUsers" style="color: #383d41;">Korisnici</a>
                        </div>

                        <div class="col-md-12 collapse" id="collapseUsers">
                            <table class="table" style="color: #383d41">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Ime i prezime</th>
                                        <th>E-mail</th>
                                        <th>Operacije</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($users as $index => $user){ ?>
                                    <tr>
                                        <th><?php echo $index + 1; ?></th>
                                        <th><?php echo $user['first_name'] . " " . $user['last_name']; ?></th>
                                        <th><?php echo $user['email']; ?></th>
                                        <th>
                                            <form action="/panel/users/<?php echo $user['id']; ?>" method="POST"
                                                id="userDelete<?php echo $user['id']; ?>">
                                                <button type="submit" class="btn btn-sm btn-danger order-button"
                                                    form="userDelete<?php echo $user['id']; ?>">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                                <input name="userID" type="hidden" value="<?php echo $user['id']; ?>">
                                            </form>
                                        </th>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>




    </div>




    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>


</body>












</html>