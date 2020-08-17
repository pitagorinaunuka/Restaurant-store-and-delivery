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
        <!-- NARUDZBE -->
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-info" role="alert" style="font-size: 14px;font-weight: 700;">
                    <div class="row">
                        <div class="col-md-12" style="border-bottom: 1px solid #aaa; padding-bottom: 10px;">
                            <a data-toggle="collapse" href="#collapseOrders" role="button" aria-expanded="false"
                                aria-controls="collapseOrders" style="color: #383d41;">Kategorije</a>
                            <a href="menu/addCategory" style="float: right">
                                <button class="btn btn-info btn-sm">Dodaj</button>
                            </a>
                        </div>

                        <div class="col-md-12 collapse show" id="collapseOrders">
                            <table class="table" style="color: #383d41">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Kategorija</th>
                                        <th>Operacije</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($result as $index => $category){ ?>
                                    <tr>
                                        <th><?php echo $index + 1 ?></th>
                                        <th><?php echo $category['category'] ?></th>
                                        <th class="d-flex">
                                            <form action="menu/deleteFoodCategory" method="POST">
                                                <button type="submit" class="btn btn-sm btn-danger order-button">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                                <input name="categoryID" type="hidden"
                                                    value="<?php echo $category['id'] ?>">
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
        <?php foreach($result as $index => $category){ ?>
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-info" role="alert" style="font-size: 14px;font-weight: 700;">
                    <div class="row">
                        <div class="col-md-12" style="border-bottom: 1px solid #aaa; padding-bottom: 10px;">
                            <a data-toggle="collapse" href="#collapse<?php echo $category['category'] ?>" role="button"
                                aria-expanded="false" aria-controls="collapse<?php echo $category['category'] ?>"
                                style="color: #383d41;"><?php echo $category['category'] ?></a>
                            <form action="./addFood" method="POST" id="addFoodForm<?php echo $category['category']?>"
                                style="float: right">
                                <button type="submit" class="btn btn-sm btn-info"
                                    form="addFoodForm<?php echo $category['category']?>">Dodaj</button>
                                <input name="food_category" type="hidden" value="<?php echo $category['id'] ?>">
                            </form>
                        </div>

                        <div class="col-md-12 collapse" id="collapse<?php echo $category['category'] ?>">
                            <table class="table" style="color: #383d41">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Hrana</th>
                                        <th>Cijena</th>
                                        <th>Operacije</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $sql = "SELECT * FROM foods WHERE category = '" . $category['id'] . "'";
                      $result = Flight::db()->query($sql);
                      Flight::db()->commit();
                ?>
                                    <?php foreach($result as $index => $food){ ?>
                                    <tr>
                                        <th><?php echo $index + 1; ?></th>
                                        <th>
                                            <a href="food/<?php echo $food['id']?>" class="foodLink">
                                                <?php echo $food['food']; ?>
                                            </a>
                                        </th>
                                        <th><?php echo $food['price']; ?></th>
                                        <th class="d-flex">
                                            <a href="./food/<?php echo $food['id'] ?>" style="margin-right: 5px">
                                                <button type="submit" class="btn btn-sm btn-info order-button">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                            </a>
                                            <form action="./deleteFood" method="POST"
                                                id="deleteFoodForm<?php echo $food['id']; ?>">
                                                <button type="submit" class="btn btn-sm btn-danger order-button"
                                                    form="deleteFoodForm<?php echo $food['id']; ?>">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                                <input name="food_id" type="hidden" value="<?php echo $food['id'] ?>">
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
        <?php } ?>


    </div>




    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/main.js"></script>


</body>












</html>