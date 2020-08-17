<!doctype HTML>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nothing+You+Could+Do" rel="stylesheet">
    <link rel="stylesheet" href="/css/all.css">
    <link rel="stylesheet" href="/css/flaticon.css">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <title>Add Category</title>
</head>

<body>
    <?php if(session_status() == PHP_SESSION_NONE) session_start(); ?>
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
                    <li class="nav-item"><a href="//localhost/panel/menu" class="nav-link">Menu</a></li>
                    <?php if(isset($_SESSION['user'])){ ?>
                    <?php if($_SESSION['user']->role == "administrator"){ ?>
                    <li class="nav-item"><a href="/logout" class="nav-link btn btn-default">Logout</a></li>
                    <?php } ?>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container panel-container" style="color: #ddd">
        <div class="row mt-3">
            <div class="col-md-12" style="font-size: 18px; font-weight: 700">Dodaj kategoriju hrane</div>
            <div class="hr-2 mt-3 mb-3"></div>
            <form class="col-md-12" action="addCategory/createFoodCategory" method="POST">
                <div class="form-row">
                    <div class="col-md-12 mb-4">
                        <label for="validationTooltip01">Ime</label>
                        <input class="form-control form-special" type="text" name="food_category"
                            placeholder="Ime hrane" id="validationTooltip01" required style="background-color: " ">
				      
				    </div>
				  </div>
				  <button class=" btn btn-success mb-3" type="submit" style="border-radius: 2px;width: 100%">Dodaj</button>
            </form>
        </div>
    </div>
</body>
<script src="/js/jquery.min.js"></script>
<script src="/js/bootstrap.min.js"></script>

</html>