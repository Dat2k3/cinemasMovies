<?php
    // session_start();
    // if (!isset($_SESSION['user'])) {
    //     header('Location: login.php');
    //     exit();
    // }

    require_once('filmModel.php');
    $now_films = get_now_film();
    $future_films = get_future_film();

    require_once 'homeModel.php';
    $posters = get_posters();

    require_once 'promotionModel.php';
    $promotions = get_promotion();

    require_once 'bookingModel.php';
    $bookings = get_history_booking();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manager CGV</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="admin/adm.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <div class="container-fluid main-header pl-4">
        <div class="row">
            <a class="col-xl-1 col-md-1 col-sm-1 col-xs-1 navbar-brand mr-5" href="home.php">
                <img src="https://www.cgv.vn/skin/frontend/cgv/default/images/cgvlogo.png" alt="CGV Cinema">
            </a>
            
            <ul class="col-xl-8 col-md-7 col-sm-6 col-xs-5 nav justify-content-center">
                <li class="nav-item my-auto mx-2"><a href="#">THEATERS</a></li>
                <li class="nav-item my-auto mx-4" style="color: rgb(129, 129, 129);">|</li>
                <li class="nav-item my-auto mx-2"><a href="#">MOVIES</a></li>
                <li class="nav-item my-auto mx-4" style="color: rgb(129, 129, 129);">|</li>
                <li class="nav-item my-auto mx-2"><a href="#">PROMOTION</a></li>
            </ul>
                
            <a class="col-xl-1 col-md-1 col-sm-1 col-xs-1 navbar-brand" href="">
                <img src="https://www.cgv.vn/media/wysiwyg/2019/AUG/kenhcine.gif" alt="Cine">
            </a>
        
            <a class="col-xl-1 col-md-1 col-sm-1 col-xs-1 navbar-brand" href="">
                <img src="https://www.cgv.vn/media/wysiwyg/news-offers/mua-ve_ngay.png" alt="Sale Ticket">
            </a>
        </div>
    </div>

    <hr class="mt-1 mb-0">
    
    <div class="tilte-dang-ki" style="background-color: #EFEBDB;">
        <h5 class="text-center my-auto pt-2 pb-2"><strong>MANAGER CGV</strong></h5>
    </div>
</head>

<body>
    <script>
        function edit_product(nameCurrent) {
            let label = $('#name_product_update');
            label.html(nameCurrent);
            return nameCurrent;
        }
    </script>

    <div class="container my-4">
        <div class="row" id="Offer">
            <div class="col-md-3">
                <button class="button" data-toggle="collapse" data-target="#Choice1" aria-controls="Choice1">Now Showing</button>
                <button class="button" data-toggle="collapse" data-target="#Choice2" aria-controls="Choice2">Coming Soon</button>
                <button class="button" data-toggle="collapse" data-target="#Choice3" aria-controls="Choice3">Poster</button>
                <button class="button" data-toggle="collapse" data-target="#Choice4" aria-controls="Choice4">Promotion</button>
                <button class="button" data-toggle="collapse" data-target="#Choice5" aria-controls="Choice5">History Booking</button>
            </div>
                
           
            <div class="col-md-9 collapse multi-collapse" id="Choice1" data-parent="#Offer">
                <div class="d-flex mb-4">
                    <a class="button-child mr-2" href="admin/upload_film.php">Add on</a>
                    <a class="button-child mr-2" href="admin/remove_film.php">Remove</a>
                    <a class="button-child mr-2" href="admin/update_film.php">Modify</a>
                </div>

                <table class="table-bordered table table-hover text-center">
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                    </tr>
                    <?php 
                    foreach($now_films as $film) {
                        ?>
                        <tr>
                            <td class="align-middle"><img height="100px" src="image/now_films/<?= $film['image'] ?>"></td>
                            <td class="align-middle"><?= $film['name'] ?></td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
                <p class="text-right">Total films: <strong><?= count($now_films)?></strong></p>
            </div>

            <div class="col-md-9 collapse collapse multi-collapse" id="Choice2" data-parent="#Offer">
                <div class="d-flex mb-4">
                    <a class="button-child mr-2" href="admin/upload_future_film.php">Add on</a>
                    <a class="button-child mr-2" href="admin/remove_future_film.php">Remove</a>
                    <a class="button-child mr-2" href="admin/update_future_film.php">Modify</a>
                </div>

                <table class="table-bordered table table-hover text-center">
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                    </tr>
                    <?php 
                    foreach($future_films as $film) {
                        ?>
                        <tr>
                            <td class="align-middle"><img height="100px" src="image/future_films/<?= $film['image'] ?>"></td>
                            <td class="align-middle"><?= $film['name'] ?></td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
                <p class="text-right">Total films: <strong><?= count($future_films)?></strong></p>
            </div>

            <div class="col-md-9 collapse collapse multi-collapse" id="Choice3" data-parent="#Offer">
                <div class="d-flex mb-4">
                    <a class="button-child mr-2" href="admin/upload_poster.php">Add on</a>
                    <a class="button-child mr-2" href="admin/remove_poster.php">Remove</a>
                    <a class="button-child mr-2" href="admin/update_poster.php">Modify</a>
                </div>

                <table class="table-bordered table table-hover text-center">
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Position</th>
                    </tr>
                    <?php 
                    foreach($posters as $p) {
                        ?>
                        <tr>
                            <td class="align-middle"><img height="100px" src="image/poster/<?= $p['image'] ?>"></td>
                            <td class="align-middle"><?= $p['name'] ?></td>
                            <td class="align-middle"><?= $p['position'] ?></td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
                <p class="text-right">Total posters: <strong><?= count($posters)?></strong></p>
            </div>

            <div class="col-md-9 collapse collapse multi-collapse" id="Choice4" data-parent="#Offer">
                <div class="d-flex mb-4">
                    <a class="button-child mr-2" href="admin/upload_event.php">Add on</a>
                    <a class="button-child mr-2" href="admin/remove_event.php">Remove</a>
                    <a class="button-child mr-2" href="admin/update_event.php">Modify</a>
                </div>

                <table class="table-bordered table table-hover text-center">
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                    </tr>
                    <?php 
                    foreach($promotions as $event) {
                    ?>
                        <tr>
                            <td class="align-middle"><img height="100px" src="image/event/<?= $event['image'] ?>"></td>
                            <td class="align-middle"><?= $event['name'] ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
                <p class="text-right">Total events: <strong><?= count($promotions)?></strong></p>
            </div>

            <div class="col-md-9 collapse collapse multi-collapse" id="Choice5" data-parent="#Offer">
                <div class="d-flex mb-2">
                    <h3 class="text-center"><strong>History Booking</strong></h3>
                </div>

                <table class="table-bordered table table-hover text-center">
                    <tr>
                        <th>Films</th>
                        <th>Day</th>
                        <th>Cinemas</th>
                        <th>Chair</th>
                        <th>Customer</th>
                    </tr>
                    <?php 
                    foreach($bookings as $ticket) {
                    ?>
                        <tr>
                            <td class="align-middle"><?= $ticket['film'] ?></td>
                            <td class="align-middle"><?= $ticket['day'] ?></td>
                            <td class="align-middle"><?= $ticket['theater_time'] ?></td>
                            <td class="align-middle"><?= $ticket['chair'] ?></td>
                            <td class="align-middle"><?= $ticket['name'] ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
                <p class="text-right">Total events: <strong><?= count($bookings)?></strong></p>
            </div>

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