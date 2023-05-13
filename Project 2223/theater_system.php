<?php
    session_start();
    require_once 'homeModel.php';
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
    <title>Theaters</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/theater_system.css">
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
    
    <div class="tilte-rap" style="background-color: #EFEBDB;">
        <h5 class="text-center my-auto pt-2 pb-2"><strong>CGV CINEMAS</strong></h5>
    </div>
</head>

<body>
    <div class="theater pt-4 pb-4">
        <div class="nav justify-content-center">
            <div class="col-xl-2 col-md-1"></div>
            <div class="col-xl-8 col-md-10 menu p-3"><h4 class="text-center" style="font-weight: bold;">Ho Chi Minh</h4></div>
            <div class="col-xl-2 col-md-1"></div>

            <div class="col-xl-2 col-md-5 menu">
                <li><a class="" href="https://goo.gl/maps/bfreeJu8vVeKHWqXA" target="_blank">CGV Hùng Vương Plaza</a></li>
                <li><a class="" href="https://goo.gl/maps/ENwuEbGM5RoRjAkY9" target="_blank">CGV Vivo City</a></li>
                <li><a class="" href="https://goo.gl/maps/jKnzuXs36QotUbnRA" target="_blank">CGV Trường Sơn Plaza</a></li>
                <li><a class="" href="https://goo.gl/maps/LK5BX18mNDYcc8QU8" target="_blank">CGV Hoàng Văn Thụ</a></li>
                <li><a class="" href="https://goo.gl/maps/zxNUFjmCxohPgvhAA" target="_blank">CGV Sư Vạn Hạnh</a></li>
            </div> 
            <div class="col-xl-2 col-md-5 menu">
                <li><a class="" href="https://goo.gl/maps/rqCxRCbWa4SMbaQh7" target="_blank">CGV Crescent Mall</a></li>
                <li><a class="" href="https://goo.gl/maps/rB7486sDmP92uCBf8" target="_blank">CGV Pearl Plaza</a></li>
                <li><a class="" href="https://goo.gl/maps/gwfqRLTTrH5midMP8" target="_blank">CGV Pandora City</a></li>
                <li><a class="" href="https://goo.gl/maps/uykqRqW9xJqpdUsr9" target="_blank">CGV Aeon Bình Tân</a></li>
                <li><a class="" href="https://goo.gl/maps/MiAqxNcA1jKRokar8" target="_blank">CGV Vincom Landmark 81</a></li>
            </div>
            <div class="col-xl-2 col-md-5 menu">
                <li><a class="" href="https://goo.gl/maps/aMYGGXy12CJqNAB66" target="_blank">CGV Thảo Điền Pearl</a></li>
                <li><a class="" href="https://goo.gl/maps/hfGnWqywhaJ8Bxqh6" target="_blank">CGV Liberty Citypoint</a></li>
                <li><a class="" href="https://goo.gl/maps/BC63ARdxhcTQz2Uh8" target="_blank">CGV Aeon Tân Phú</a></li>
                <li><a class="" href="https://goo.gl/maps/u8TUw73dQ7gShtneA" target="_blank">CGV Saigonres Nguyễn Xí</a></li>
                <li><a class="" href="https://goo.gl/maps/Cam9kqCJ66KQYtzp8" target="_blank">CGV Satra Củ Chi</a></li>
            </div>
            <div class="col-xl-2 col-md-5 menu">
                <li><a class="" href="https://goo.gl/maps/s6FUfwvxKhU1vSHm8" target="_blank">CGV Vincom Thủ Đức</a></li>
                <li><a class="" href="https://goo.gl/maps/krXVkksMPE6vHg398" target="_blank">CGV Vincom Đồng Khởi</a></li>
                <li><a class="" href="https://goo.gl/maps/wTmLTpjhbJKaoZEDA" target="_blank">CGV Vincom Gò Vấp</a></li>
                <li><a class="" href="https://goo.gl/maps/2YiwNBoUDqx9ae1T7" target="_blank">CGV Parkson Đồng Khởi</a></li>
                <li><a class="" href="https://goo.gl/maps/xTzvKJxnij5LU6648" target="_blank">CGV Giga Mall Thủ Đức</a></li>
            </div>
        </div>
       
        <div class="nav justify-content-center">
            <div class="col-xl-2 col-md-1"></div>
            <div class="col-xl-8 col-md-10 menu p-3"><h4 class="text-center" style="font-weight: bold;">Ha Noi</h4></div>
            <div class="col-xl-2 col-md-1"></div>

            <div class="col-xl-2 col-md-5 menu">
                <li><a class="" href="https://goo.gl/maps/Aw7GEeV8rZKM742K8" target="_blank">CGV Vincom Center Bà Triệu</a></li>
                <li><a class="" href="https://goo.gl/maps/9XngqFeJfAiAygHp9" target="_blank">CGV Vincom Royal City</a></li>
                <li><a class="" href="https://goo.gl/maps/R3DA2uouRQpDngfw5" target="_blank">CGV Trương Định Plaza</a></li>
                <li><a class="" href="https://goo.gl/maps/w8m7Euu2pQhZTYDu8" target="_blank">CGV Vincom Bắc Từ Liêm</a></li>
                <li><a class="" href="https://goo.gl/maps/Y6zQLabVB4DDLPmW9" target="_blank">CGV Vincom Trần Duy Hưng</a></li>
            </div> 
            <div class="col-xl-2 col-md-5 menu">
                <li><a class="" href="https://goo.gl/maps/oQXkhwQKcWTQreo96" target="_blank">CGV Mipec Tower</a></li>
                <li><a class="" href="https://goo.gl/maps/bomMxkqUJhxnWGuT8" target="_blank">CGV Indochina Plaza Hà Nội</a></li>
                <li><a class="" href="https://goo.gl/maps/mufbKS6HSxidV5tq7" target="_blank">CGV Vincom Times City</a></li>
                <li><a class="" href="https://goo.gl/maps/Yen3eVELzSb8g8BR8" target="_blank">CGV Tràng Tiền Plaza</a></li>                
                <li><a class="" href="https://goo.gl/maps/VSkFY3CJWghXPifM6" target="_blank">CGV Aeon Hà Đông</a></li>
            </div>
            <div class="col-xl-2 col-md-5 menu">
                <li><a class="" href="https://goo.gl/maps/4GKowS6CUj9kGrgR6" target="_blank">CGV Hồ Gươm Plaza</a></li>
                <li><a class="" href="https://goo.gl/maps/De1qJqBsvUB2vPvS8" target="_blank">CGV Rice City</a></li>
                <li><a class="" href="https://goo.gl/maps/zKqD5eKAtAdjMGEq6" target="_blank">CGV Vincom Long Biên</a></li>
                <li><a class="" href="https://goo.gl/maps/tvbquhUcg4zQDQ4V9" target="_blank">CGV Sun Grand Thụy Khuê</a></li>
                <li><a class="" href="https://goo.gl/maps/4UzK1mnCVT5owb8B7" target="_blank">CGV Xuân Diệu</a></li>
            </div> 
            <div class="col-xl-2 col-md-5 menu">
                <li><a class="" href="https://goo.gl/maps/ZykvV9x6VEHhL8hh9" target="_blank">CGV Aeon Long Biên</a></li>
                <li><a class="" href="https://goo.gl/maps/Qto5vLT5h94uLZsw7" target="_blank">CGV Hà Nội Centerpoint</a></li>
                <li><a class="" href="https://goo.gl/maps/1qhjPPxbfeRSgkST9" target="_blank">CGV Mac Plaza (Machinco)</a></li>
                <li><a class="" href="https://goo.gl/maps/WwptNwi5zoSf5m6P8" target="_blank">CGV Sun Grand Lương Yên</a></li>
                <li><a class="" href="https://goo.gl/maps/2KPJyCkUpwYHd2Px6" target="_blank">CGV Vincom Ocean Park</a></li>
            </div>           
        </div>
        <div class="nav justify-content-center">
            <div class="col-xl-2 col-md-1"></div>
            <div class="col-xl-8 col-md-10 menu p-2"></div>
            <div class="col-xl-2 col-md-1"></div>
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