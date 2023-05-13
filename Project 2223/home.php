<?php
    require_once 'homeModel.php';
    $poster_1 = get_poster('Top 1');
    $poster_2 = get_poster('Top 2');
    $poster_3 = get_poster('Top 3');
    $poster_4 = get_poster('Top 4');

    session_start();

    $user_name = '';
    if(isset($_SESSION['user'])) {
        $information = get_information($_SESSION['user']);
        $user_name =  $information['firstname'] . ' ' . $information['lastname'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CGV Cinema</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <div class="sub-header p-2">
        <ul class="nav justify-content-end">
            <li class="nav-item my-auto"><a href="login.php">Login</a></li>/
            <li class="nav-item my-auto"><a href="register.php">Register</a></li>
            <li class="nav-item my-auto mx-3"><a href="my_ticket.php">My Tickets</a></li>
    <?php 
        if (!empty($user_name)) {
    ?>
            <li class="nav-item my-auto mr-2" style="color:black;"><strong>Hello </strong><a href="information.php"><?= $user_name ?></a></li>
            <a href="account/logout.php"><i class="bi bi-power" style="font-size: 18px;"></i></a>
    <?php
        }
    ?>
        </ul>
    </div>

    <div class="container-fluid main-header pl-4">
        <div class="row">
            <a class="col-xl-1 col-md-1 col-sm-1 col-xs-1 navbar-brand mr-5" href="home.php">
                <img src="https://www.cgv.vn/skin/frontend/cgv/default/images/cgvlogo.png" alt="CGV Cinema">
            </a>
            
            <ul class="col-xl-8 col-md-7 col-sm-6 col-xs-5 nav justify-content-center">
                <li class="nav-item my-auto mx-2"><a href="theater_system.php">THEATERS</a></li>
                <li class="nav-item my-auto mx-4" style="color: rgb(129, 129, 129);">|</li>
                <li class="nav-item my-auto mx-2"><a href="film.php">MOVIES</a></li>
                <li class="nav-item my-auto mx-4" style="color: rgb(129, 129, 129);">|</li>
                <li class="nav-item my-auto mx-2"><a href="promotion.php">PROMOTION</a></li>
            </ul>
                
            <a class="col-xl-1 col-md-1 col-sm-1 col-xs-1 navbar-brand" href="#">
                <img src="https://www.cgv.vn/media/wysiwyg/2019/AUG/kenhcine.gif" alt="Cine">
            </a>
        
            <a class="col-xl-1 col-md-1 col-sm-1 col-xs-1 navbar-brand" href="#">
                <img src="https://www.cgv.vn/media/wysiwyg/news-offers/mua-ve_ngay.png" alt="Sale Ticket">
            </a>
        </div>
    </div>

    <hr class="mt-1 mb-0">

    <div class="tilte-hot-film" style="background-color: #EFEBDB;">
        <h4 class="text-center my-auto pt-2 pb-2"><strong>HOT MOVIES</strong></h4>
    </div>
</head>

<body>
    <div class="film-slides">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
            </ol>

            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="image/poster/<?= $poster_1['image'] ?>" alt="<?= $poster_1['name'] ?>">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="image/poster/<?= $poster_2['image'] ?>" alt="<?= $poster_2['name'] ?>">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="image/poster/<?= $poster_3['image'] ?>" alt="<?= $poster_3['name'] ?>">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="image/poster/<?= $poster_4['image'] ?>" alt="<?= $poster_4['name'] ?>">
                </div>
            </div>

            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <svg xmlns="http://www.w3.org/2000/svg" width="25%" fill="currentColor" class="bi bi-chevron-compact-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M9.224 1.553a.5.5 0 0 1 .223.67L6.56 8l2.888 5.776a.5.5 0 1 1-.894.448l-3-6a.5.5 0 0 1 0-.448l3-6a.5.5 0 0 1 .67-.223z"/>
                </svg>
                <span class="sr-only">Previous</span>
            </a>
            
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <svg xmlns="http://www.w3.org/2000/svg" width="25%" fill="currentColor" class="bi bi-chevron-compact-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M6.776 1.553a.5.5 0 0 1 .671.223l3 6a.5.5 0 0 1 0 .448l-3 6a.5.5 0 1 1-.894-.448L9.44 8 6.553 2.224a.5.5 0 0 1 .223-.671z"/>
                </svg>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

    <div class="container-fluid event">
        <div class="tilte-event pt-4">
            <h3 class="text-center"><strong>EVENT</strong></h3>
        </div>
        <div class="grid-wrap">
            <a class="tall" href="#"><img src="image/event/nguc-toi-rong.jpg" alt="KLaught-Dragon"></a>
            <a class="medium" href="#"><img src="image/event/dat-ve-online.png" alt="Book-Ticket"></a>
            <a class="medium" href="#"><img src="image/event/2023_culture_day.png" alt="Culture Day"></a>
            <a class="medium" href="#"><img src="image/event/2023_happy_wed.png" alt="Wednesday-Happy"></a>
            <a class="wide" href="#"><img src="image/event/poster-rap.png" alt="Background-Cinema"></a>
            <a class="medium" href="#"><img src="image/event/2023_u22.png" alt="U22"></a>
        </div>
    </div> 
    <hr class="mt-1 mb-0">
</body>

<footer>
    <div class="container-fluid content-footer">
        <div class="row">
            <div class="col-xl-2 col-md-2 col-sm-12">
                <a href="home.php">
                    <img class="mx-auto d-block" height="150" width="150" src="image/logo/cgv-footer.png" alt="CGV Cinemas logo">
                </a>
            </div>
            <div class="col-xl-10 col-md-10 col-sm-12">
                <ul style="color: gray; font-size: 14px;">
                    <li><strong>COMPANY CJ CGV VIETNAM</strong></li>
                    <li>Business registration certificate: 0303675393, registered for the first time on 31/7/2008,issued by HCMC Department of Planning and Investment.</li>
                    <li>Address: Floor 2, Rivera Park Saigon - No. 7/28 Thanh Thai street, Ward 14, District 10, HCMC.</li>
                    <li>Hotline: 1900 9999</li>
                    <li>COPYRIGHT &copy; 2023 CJ CGV - TeamDC</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer"></div>
</footer>
</html>