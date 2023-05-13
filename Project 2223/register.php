<?php
    session_start();
    if (isset($_SESSION['user'])) {
        header('Location: home.php');
        exit();
    }

    require_once('account/registerModel.php');
    require_once('admin/adminModel.php');

    $error = '';
    $message = '';
    $first_name = '';
    $last_name = '';
    $email = '';
    $user = '';
    $pass = '';
    $pass_confirm = '';

    if (isset($_POST['first']) && isset($_POST['last']) && isset($_POST['email'])
    && isset($_POST['user']) && isset($_POST['pass']) && isset($_POST['pass-confirm']))
    {
        $first_name = $_POST['first'];
        $last_name = $_POST['last'];
        $email = $_POST['email'];
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $pass_confirm = $_POST['pass-confirm'];

        if (empty($first_name)) {
            $error = 'Please enter your first name';
        }
        else if (empty($last_name)) {
            $error = 'Please enter your last name';
        }
        else if (empty($email)) {
            $error = 'Please enter your email address';
        }
        else if (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
            $error = 'This is not a valid email address';
        }
        else if (empty($user)) {
            $error = 'Please enter your account';
        }
        else if (empty($pass)) {
            $error = 'Please enter a password';
        }
        else if (strlen($pass) < 6) {
            $error = 'Password must be more than 6 characters';
        }
        else if ($pass != $pass_confirm) {
            $error = 'Password does not match';
        }
        else {
            if(!check_exist_username($user, 'account')) {
                 // register a new account
                $result = register($first_name, $last_name, $email, $user, $pass);
                if($result['code'] == 0) {
                $message = "Sign up successfully";
                } 
                else if($result['code'] == 1) {
                    $error = "Email address already exists";
                }
                else {
                    $error = "Error! An error occurred. Please try again later. Try later!";
                }
            }
            else {
                $error = 'Username already exists, please try again';
            }
        }
    }
?>

<?php 
    require_once 'filmModel.php';
    $now_films = get_now_film();
    $future_films = get_future_film();

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
    <title>Register</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="account/register.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>

    </style>
    
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
    
    <div class="tilte-dang-ki" style="background-color: #EFEBDB;">
        <h5 class="text-center my-auto pt-2 pb-2"><strong>REGISTER</strong></h5>
    </div>
</head>

<body>
    <div class="container main-body">
        <div class="row">
            <div class="col-lg-3 col-md-2"></div>
            <div class="col-lg-6 col-md-8 form-register mt-4 mb-4 pl-5 pr-5 pt-4 pb-2">
                <form method="post" action="" novalidate>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="firstname"><strong>First name</strong></label>
                            <input value="<?= $first_name?>" name="first" required class="form-control" type="text" placeholder="First name" id="firstname">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="lastname"><strong>Last name</strong></label>
                            <input value="<?= $last_name?>" name="last" required class="form-control" type="text" placeholder="Last name" id="lastname">
                            <div class="invalid-tooltip">Họ là bắt buộc</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email"><strong>Email</strong></label>
                        <input value="<?= $email?>" name="email" required class="form-control" type="email" placeholder="Email address" id="email">
                    </div>
                    <div class="form-group">
                        <label for="user"><strong>Account</strong></label>
                        <input value="<?= $user?>" name="user" required class="form-control" type="text" placeholder="Account" id="user">
                        <div class="invalid-feedback">Vui lòng nhập tài khoản</div>
                    </div>
                    <div class="form-group">
                        <label for="pass"><strong>Password</strong></label>
                        <input  value="<?= $pass?>" name="pass" required class="form-control" type="password" placeholder="Password" id="pass">
                        <div class="invalid-feedback">Mật khẩu không hợp lệ</div>
                    </div>
                    <div class="form-group">
                        <label for="pass2"><strong>Confirm password</strong></label>
                        <input value="<?= $pass_confirm?>" name="pass-confirm" required class="form-control" type="password" placeholder="Confirm password" id="pass2">
                        <div class="invalid-feedback">Mật khẩu không hợp lệ</div>
                    </div>

                    <div class="form-group">
                        <?php
                            if (!empty($error)) {
                                echo "<div class='text-danger'><p>$error</p></div>";
                            }
                            else if (!empty($message)){
                                echo "<div class='text-success'><p>$message</p></div>";
                                echo "<p class='text-danger'><strong>Please confirm your account via email</strong></p>";
                            }
                        ?>
                        <div class="text-center">
                            <button type="submit" class="button button-submit mx-2">Register</button>
                            <button type="reset" class="button button-reset mx-2">Reset</button>
                        </div>
                    </div>
                    <div class="form-group">
                        <p>Do you already have an account? <a href="login.php">Login</a> now.</p>
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