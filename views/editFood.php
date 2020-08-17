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
            <div class="col-md-12" style="font-size: 18px; font-weight: 700">Dodaj/edituj hranu</div>
            <div class="hr-2 mt-3 mb-3"></div>
            <form class="col-md-12" action="addFood/createFood" method="POST" enctype="multipart/form-data">
                <div class="form-row">
                    <div class="col-md-4 mb-4">
                        <label for="validationTooltip01">Naziv jela</label>
                        <input class="form-control form-special" type="text" name="food_name" placeholder="food name"
                            id="validationTooltip01" required>
                    </div>
                    <div class="col-md-4 mb-4">
                        <label for="validationTooltip01">Kategorija</label>
                        <?php foreach($categories as $category){
				      if($food_category == $category['id'])echo $category['category'];
				  } ?>
                        <select class="custom-select form-control form-control-special" name="food_category"
                            id="validationTooltip01" required>

                            <?php foreach($categories as $category){ ?>
                            <?php if(isset($food_category)){?>
                            <?php if($food_category == $category['id']){?>
                            <option value="<?php echo $category['id']; ?>" selected="">
                                <?php echo $category['category']; ?></option>
                            <?php } else {?>
                            <option value="<?php echo $category['id']; ?>"><?php echo $category['category']; ?></option>
                            <?php } ?>
                            <?php } else { ?>
                            <option value="<?php echo $category['id']; ?>"><?php echo $category['category']; ?></option>
                            <?php } ?>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-4 mb-4">
                        <label for="validationTooltip01">Slika</label>
                        <input class="form-control form-special" type="file" name="food_image" placeholder="picture"
                            id="validationTooltip01" required style="font-size: 12px;">

                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-3 mb-4">
                        <label for="validationTooltip01">Cijena</label>
                        <input class="form-control form-special" type="text"
                            style="height:165px !important;text-align: center;font-size: 72px" name="food_price"
                            placeholder="0.00" id="validationTooltip01" required>
                    </div>
                    <div class="col-md-9 mb-4">
                        <label for="validationTooltip01">Deskripcija</label>
                        <textarea class="form-control form-special" type="text" name="food_description"
                            placeholder="food description" id="validationTooltip01" required rows="5"></textarea>
                    </div>
                </div>
                <button class="btn btn-success mb-3" type="submit" style="border-radius: 2px;width: 100%">Dodaj</button>
            </form>
        </div>
    </div>
</body>
<script src="/js/jquery.min.js"></script>
<script src="/js/bootstrap.min.js"></script>

</html>