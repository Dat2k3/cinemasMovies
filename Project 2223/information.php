<?php 
    require_once 'filmModel.php';
    $now_films = get_now_film();
    $future_films = get_future_film();

    session_start();
    require_once 'homeModel.php';
    $user_name = '';
    if(isset($_SESSION['user'])) {
        $information = get_information($_SESSION['user']);
        $user_name =  $information['firstname'] . ' ' . $information['lastname'];
        $email_address = $information['email'];
    }

    require_once 'informationModel.php';

    $error = '';
    $message = '';
    $name = $user_name;
    $age = '';
    $gender = '';
    $email = $email_address;
    $phone = '';

    $infor = get_information_customer($user_name);

    if(empty($infor)) {
        if (isset($_POST['name']) && isset($_POST['age']) && isset($_POST['gender'])
        && isset($_POST['email']) && isset($_POST['phone']))
        {
            $name = $_POST['name'];
            $age = $_POST['age'];
            $gender = $_POST['gender'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
    
            if (empty($name)) {
                $error = 'Please enter your name';
            }
            else if (empty($age)) {
                $error = 'Please enter your age';
            }
            else if (empty($gender)) {
                $error = 'Please enter your gender';
            }
            else if (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
                $error = 'This is not a valid email';
            }
            else if (empty($phone)) {
                $error = 'Please enter your phone';
            }
            else {
                $result = information($user_name, $name, $age, $gender, $email, $phone);
                if($result['code'] == 0) {
                   $message = "Successful Editing";
                } 
                else {
                    $error = "Failing, Please edit again.";
                }
            }
        }
    } else {
        $name = $infor['name'];
        $age = $infor['age'];
        $gender = $infor['gender'];
        $email = $infor['email'];
        $phone = $infor['phone'];

        if (isset($_POST['name']) && isset($_POST['age']) && isset($_POST['gender'])
        && isset($_POST['email']) && isset($_POST['phone']))
        {
            $name = $_POST['name'];
            $age = $_POST['age'];
            $gender = $_POST['gender'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];

            if (empty($name)) {
                $error = 'Please enter your name';
            }
            else if (empty($age)) {
                $error = 'Please enter your age';
            }
            else if (empty($gender)) {
                $error = 'Please enter your gender';
            }
            else if (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
                $error = 'This is not a valid email';
            }
            else if (empty($phone)) {
                $error = 'Please enter your phone';
            }
            else {
                $result = update_information($user_name, $name, $age, $gender, $email, $phone);
                if($result['code'] == 0) {
                   $message = "Successful Updating";
                } 
                else {
                    $error = "Failing, Please edit again.";
                }
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Information</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/infor.css">
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
    <div class="tilte-information" style="background-color: #EFEBDB;">
        <h5 class="text-center my-auto pt-2 pb-2"><strong>PERSONAL INFORMATION</strong></h5>
    </div>
</head>

<body>
<div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-2"></div>
            <div class="col-lg-6 col-md-8 form-information mt-4 mb-4 pl-5 pr-5 pt-4 pb-2">
                <form method="post"> 
                    

                    <div class="row">
                        <div class="form-group col-md-7">
                            <label for="name"><strong>Name:</strong></label>
                            <input value="<?= $name ?>" required class="form-control" type="text" name="name" placeholder="Your name">
                        </div>

                        <div class="form-group col-md-5">
                            <label for="gender"><strong>Gender:</strong></label>
                            <input value="<?= $gender ?>" type="text" required class="form-control" name="gender" placeholder="Your gender">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-7">
                            <label for="phone"><strong>Phone:</strong></label>
                            <input value="<?= $phone ?>" type="text" required class="form-control" name="phone" placeholder="Your phone">
                        </div>

                        <div class="form-group col-md-5">
                            <label for="age"><strong>Age:</strong></label>
                            <input value="<?= $age ?>" type="text" required class="form-control" name="age" placeholder="Your age">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email"><strong>Email:</strong></label>
                        <input value="<?= $email ?>" required class="form-control" type="text" name="email" placeholder="Your email">
                    </div>

                    <?php
                            if (!empty($error)) {
                                echo "<div class='text-danger'><p>$error</p></div>";
                            }
                            else if (!empty($message)){
                                echo "<div class='text-success'><p>$message</p></div>";
                            }
                    ?>
                    <div class="text-center my-4">
                        <button type="submit" class="button mx-2">Edit</button>
                    </div>
                </form>
            </div>
            <div class="col-lg-3 col-md-2"></div>
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