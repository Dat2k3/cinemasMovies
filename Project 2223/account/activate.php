<?php 
    require_once 'activateModel.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Active account</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="activate.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <div class="sub-header p-2">
    <ul class="nav justify-content-end">
            <li class="nav-item my-auto"><a href="../login.php">Login</a></li>/
            <li class="nav-item my-auto"><a href="../register.php">Register</a></li>
            <li class="nav-item my-auto mx-3"><a href="../my_ticket.php">My Tickets</a></li>
        </ul>
    </div>

    <div class="container-fluid main-header pl-4">
        <div class="row">
            <a class="col-xl-1 col-md-1 col-sm-1 col-xs-1 navbar-brand mr-5" href="../home.php">
                <img src="https://www.cgv.vn/skin/frontend/cgv/default/images/cgvlogo.png" alt="CGV Cinema">
            </a>
            
            <ul class="col-xl-8 col-md-7 col-sm-6 col-xs-5 nav justify-content-center">
                <li class="nav-item my-auto mx-2"><a href="../theater_system.php">THEATERS</a></li>
                <li class="nav-item my-auto mx-4" style="color: rgb(129, 129, 129);">|</li>
                <li class="nav-item my-auto mx-2"><a href="../film.php">MOVIES</a></li>
                <li class="nav-item my-auto mx-4" style="color: rgb(129, 129, 129);">|</li>
                <li class="nav-item my-auto mx-2"><a href="../promotion.php">PROMOTION</a></li>
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
    
    <div class="tilte-login" style="background-color: #EFEBDB;">
        <h5 class="text-center my-auto pt-2 pb-2"><strong>ACTIVE ACCOUNT</strong></h5>
    </div>
</head>

<body>
    <?php 
        $error = "";
        $message = "";

        if(isset($_GET['email']) && isset($_GET['token'])) {
            $email = $_GET['email'];
            $token = $_GET['token'];

            if(filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
                $error = 'Email address does not exist';
            }
            else if(strlen($token) != 32) {
                $error = 'Invalid token format';
            }
            else {
                // check database
                $result = activeAccount($email, $token);
                if($result['code'] == 0) {
                    $message = 'Your account has been activated. Sign in now';
                } else {
                    $error = $result['error'];
                }
            }
        }
        else {
            $error = 'Invalid activation URL';
        }
    ?>

    <?php 
        if(!empty($error)) {
        ?>
        <div class="container-fluid">
            <div class="row text-center">
                <div class="col-lg-4 col-md-3"></div>
                <div class="col-lg-4 col-md-5 form-activate mt-4 mb-4 pl-5 pr-5 pt-4 pb-2">
                    <span class="bi bi-x-circle-fill" style="font-size: 75px; color:darkred"></span>
                    <p class="text-danger"><?= $error?></p>
                    <p>Click <a href="login.php"><strong>here</strong></a> to login.</p>
                    <a href="../login.php"><button class="button-login m-2">Login</button></a>
                </div>
                <div class="col-lg-4 col-md-3"></div>
            </div>
        <?php
        } else {
        ?>
            <div class="row text-center">
                <div class="col-lg-4 col-md-3"></div>
                <div class="col-lg-4 col-md-5 form-activate mt-4 mb-4 pl-5 pr-5 pt-4 pb-2">
                    <span class="bi bi-check-circle-fill" style="font-size: 75px; color:forestgreen"></span>
                    <h6 class="text-success">Your account has been activated successfully</h6>
                    <h6>Click <a href="../login.php"><strong>here</strong></a> to login</h6>
                    <a href="../login.php"><button class="button-login m-2">Login</button></a>
                </div>
                <div class="col-lg-4 col-md-3"></div>
            </div>
        <?php
        }
    ?>
    </div>

    <hr class="mt-1 mb-0">

    </body>

<footer>
    <div class="container-fluid content-footer">
        <div class="row">
            <div class="col-xl-2 col-md-2 col-sm-12">
                <a href="../home.php">
                    <img class="mx-auto d-block" height="150" width="150" src="../image/logo/cgv-footer.png" alt="CGV Cinemas logo">
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