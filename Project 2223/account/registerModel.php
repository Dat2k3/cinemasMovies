<?php 
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;

    require 'vendor/autoload.php';
    
    $root = $_SERVER['DOCUMENT_ROOT'];
    $path_database = $root . '/database/connection.php';

    require_once($path_database);

    function register($first_name, $last_name, $email, $user, $pass) {

        if(is_email_exist($email)) {
            // array include 2 index, code (0: success, 1: fail), with error ...
            return array('code' => 1, 'error' => 'Email exist');
        }

        $hash = password_hash($pass, PASSWORD_DEFAULT);
        $rand = random_int(0, 1000);
        $token = md5($user .'+'. $rand);
        $sql = "insert into account (username, firstname, lastname, email, password, activate_token) values (?,?,?,?,?,?)";
    
        $con = connect_database();

        // Using Prepared Statement (SQL Injection)
        $stm = $con->prepare($sql);
        $stm->bind_param('ssssss', $user, $first_name, $last_name, $email, $hash, $token);

        if(!$stm->execute()) {
            return array('code' => 2, 'error' => 'Can not execute command');
        }

        // send verification email
        send($email, $token, $first_name, $last_name);

        return array('code' => 0, 'error' => 'Đăng kí thành công');
    }

    function is_email_exist($email) {
        $sql = "select username from account where email = ?";
        $con = connect_database();

        // Using Prepared Statement (SQL Injection)
        $stm = $con->prepare($sql);
        $stm->bind_param('s', $email);

        if(!$stm->execute()) {
           die("Query error: " . $stm->error);
        }

        $result = $stm->get_result();

        // User not exist
        if($result->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    function send($email, $token, $first_name, $last_name) {
        $server_host = $_SERVER['HTTP_HOST'];
        $mail = new PHPMailer(true);
        $name = $first_name . $last_name;
        try {
            $mail->isSMTP();                                            //Send using SMTP
            $mail->CharSet = 'UTF-8';
            $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'phamvantiendat2@gmail.com';            //SMTP username
            $mail->Password   = 'zdudmtloxjzikhkw';                     //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable implicit TLS encryption
            $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('phamvantiendat2@gmail.com', 'CGV Cinema');
            $mail->addAddress($email, $name);                //Add a recipient

            //Content
            $mail->isHTML(true);                                    //Set email format to HTML
            $mail->Subject = 'Account confirmation for ' . $name;
            $mail->Body    = "<h4>Click <a href='http://$server_host/account/activate.php?email=$email&token=$token'>Here</a> to verify the account</h4>";
           
            $mail->send();
            return true;   
        } 
        catch (Exception $e) {
            return false;
        }
    }
?>