<?php 
    $root = $_SERVER['DOCUMENT_ROOT'];
    $path_database = $root . '/database/connection.php';
    require_once($path_database);

    function login($user, $pass) {
        $sql = "select * from account where username = ?";
        $con = connect_database();

        $stm = $con->prepare($sql);
        $stm->bind_param('s', $user);
        if(!$stm->execute()) {
            return array('code' => 1, 'error' => "Can not execute command");
        }

        $result = $stm->get_result();

        if($result->num_rows == 0) {
            return array('code' => 1, 'error' => "Account does not exist");
        }

        $data = $result->fetch_assoc();

        $hashed_password = $data['password'];
        if(!password_verify($pass, $hashed_password)) {
            return array('code' => 1, 'error' => "Incorrect password");
        }
        else if($data['activated'] == 0) {
            return array('code' => 3, 'error' => "Your account has not been activated");
        }
        else return array('code' => 0, 'error' => "", 'data' => $data);
    }
?>