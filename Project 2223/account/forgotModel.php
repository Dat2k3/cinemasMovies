<?php 
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    require 'vendor/autoload.php';
    
    $root = $_SERVER['DOCUMENT_ROOT'];
    $path_database = $root . '/database/connection.php';
    require_once($path_database);
    require_once 'registerModel.php';

    function reset_password($email) {
        if(!is_email_exist($email)) {
            return;
        }

        $token = md5($email .'+'. random_int(1000,2000));
        $sql = "update reset_token set token = ? where email = ?";
        
        $con = connect_database();
        $stm = $con->prepare($sql);
        $stm->bind_param('ss',$token, $email);

        if(!$stm->execute()) {
            return array('code' => 2, 'error' => 'Can not execute command');
        }

        // There are empty table in database (row)
        if($stm->affected_rows == 0) {
            $exp = time() + 3600*24; // dealine 24h
            
            $sql = 'insert into reset_token values (?,?,?)';
            $stm = $con->prepare($sql);
            $stm->bind_param('ssi',$email, $token, $exp);

            if(!$stm->execute()) {
                return array('code' => 1, 'error' => 'Can not execute command');
            }
        }

        $success = send_password($email, $token);
        return array('code' => 1, 'success' => $success);
    }

    function send_password($email, $token) {
        $server_host = $_SERVER['HTTP_HOST'];
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();         
            $mail->CharSet    = 'utf-8';                                // Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                       // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'phamvantiendat2@gmail.com';            // SMTP username
            $mail->Password   = 'zdudmtloxjzikhkw';                     // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable implicit TLS encryption
            $mail->Port       = 587;                                    // TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('phamvantiendat2@gmail.com', 'CGV Cinema');
            $mail->addAddress($email, 'Nguoi nhan');                    // Add a recipient

            //Content
            $mail->isHTML(true);                                        // Set email format to HTML
            $mail->Subject = 'Password Recovery';
            $mail->Body    = "<h4>Click <a href='http://$server_host/account/reset_password.php?email=$email&token=$token'>Here</a> to recover your password</h4>";
           
            $mail->send();
            return true;   
        } 
        catch (Exception $e) {
            return false;
        }
    }
?>