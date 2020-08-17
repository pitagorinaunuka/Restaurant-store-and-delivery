<!DOCTYPE html>
<html lang="en">

<head>
    <title>Pizzeria</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nothing+You+Could+Do" rel="stylesheet">
    <link rel="stylesheet" href="/css/all.css">
    <link rel="stylesheet" href="/css/flaticon.css">
    <link rel="stylesheet" href="/css/style.css">
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
                    <li class="nav-item"><a href="//localhost/panel" class="nav-link">Panel</a></li>
                    <?php if(isset($_SESSION['user'])){ ?>
                    <?php if($_SESSION['user']->role == "administrator"){ ?>
                    <li class="nav-item"><a href="/logout" class="nav-link btn btn-default">Logout</a></li>
                    <?php } ?>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Navbar end -->
    <div class="container panel-container mt-3">
        <div class="row">
            <div class="col-md-12 mt-1">
                <div class="alert alert-success mt-3" role="alert">
                    <p>Ovdje možete da vidite listu trenutačno dostupnih jela, tj. menu, da dodajete nove ponude i da
                        brišete već postojeće.</p>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mt-3">
                <div class="alert alert-info mt-3" role="alert" style="color: #000 !important">
                    Poruka
                    <div class="hr-2" style="width: 100%;background-color: #aaa"></div>
                    <div>Korisnik: <strong><?php echo $message['first_name'] . " " . $message['last_name'];?></strong>
                    </div>
                    <div>E-mail: <strong><?php echo $message['email'];?></strong></div>
                    <div>Datum: <strong><?php echo((explode(" ", $message['dateTime']))[0]) ?></strong></div>
                    <div>Vrijeme:
                        <strong><?php echo(substr(((explode(" ", $message['dateTime']))[1]), 0, 5)) ?></strong></div>
                    <div class="hr-2" style="width: 100%;background-color: #aaa"></div>
                    <div><strong>Poruka:</strong></div>
                    <div class="mb-2">
                        <textarea style="width:100%;height: auto;"><?php echo $message['message'];?></textarea>
                    </div>
                    <div>
                        <form action="/panel/messages/<?php echo $message['id'];?>" method="POST">
                            <button type="submit" class="btn btn-danger" style="width: 100%;border-radius: 2px">Obrisi
                                poruku</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>




    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/main.js"></script>


</body>












</html>