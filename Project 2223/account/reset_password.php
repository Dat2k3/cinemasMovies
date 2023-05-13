<?php
    require_once("reset_passwordModel.php");

    $post_error = '';
    $error = '';
    $message = '';
    $email = '';
    $pass = '';
    $pass_confirm = '';
    $display_email = filter_input(INPUT_GET, 'email', FILTER_SANITIZE_EMAIL);

    if(isset($_GET['email']) && isset($_GET['token'])) {
        $email = $_GET['email'];
        $token = $_GET['token'];

        if(filter_var($email, FILTER_SANITIZE_EMAIL) == false) {
            $error = 'Email address does not exist';
        }
        else if(strlen($token) != 32) {
            $error = 'This is not a valid token';
        }
        else {
            // Xu ly POST
            if (isset($_POST['email']) && isset($_POST['pass']) &&
                isset($_POST['pass-confirm'])) {

                $email = $_POST['email'];
                $pass = $_POST['pass'];
                $pass_confirm = $_POST['pass-confirm'];

                if (empty($email)) {
                    $post_error = 'Please enter your email address';
                }
                else if (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
                    $post_error = 'Email address does not exist';
                }
                else if (empty($pass)) {
                    $post_error = 'Please enter a password';
                }
                else if (strlen($pass) < 6) {
                    $post_error = 'Password must be more than 6 characters';
                }
                else if ($pass != $pass_confirm) {
                    $post_error = 'Password does not match';
                }
                else {
                    $result = replace_password($email, $pass);
                    if($result['code'] == 0) {
                        $message = 'Password reset successful';
                    }
                    else {
                        $post_error = 'Error Database';
                    }
                }
            }
        }
    }
    else {
        $error = 'Invalid email address or token';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="forgot.css">
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
        <h5 class="text-center my-auto pt-2 pb-2"><strong>RESET PASSWORD</strong></h5>
    </div>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-4 col-md-3"></div>
        <div class="col-lg-4 col-md-5 form-forgot mt-4 mb-4 pl-5 pr-5 pt-4 pb-2">
            <?php
                if(!empty($error)) {
                    echo "<div class='text-danger'><p>$error</p></div>";
                } else {
                    ?>
                        <form novalidate method="post">
                            <div class="form-group">
                                <label for="email"><strong>Email</strong></label>
                                <input readonly value="<?= $display_email ?>" name="email" id="email" type="text" class="form-control" placeholder="Email address">
                            </div>
                            <div class="form-group">
                                <label for="pass"><strong>Password</strong></label>
                                <input  value="<?= $pass?>" name="pass" required class="form-control" type="password" placeholder="Password" id="pass">
                                <div class="invalid-feedback">Mật khẩu không hợp lệ.</div>
                            </div>
                            <div class="form-group">
                                <label for="pass2"><strong>Confirm password</strong></label>
                                <input value="<?= $pass_confirm?>" name="pass-confirm" required class="form-control" type="password" placeholder="Confirm password" id="pass2">
                                <div class="invalid-feedback">Mật khẩu không hợp lệ.</div>
                            </div>
                            <div class="form-group">
                                <?php 
                                    if(!empty($post_error)) {
                                        echo "<div class='text-danger'><p>$post_error</p></div>";
                                    }
                                    else if(!empty($message)) {
                                        echo "<div class='text-success'><p>$message</p></div>";
                                    }
                                ?>
                                <button class="button-resetpw">Change the password</button>
                            </div>
                        </form>
                    <?php
                }
            ?>
        </div>
        <div class="col-lg-4 col-md-3"></div>
    </div>
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
