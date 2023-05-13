<?php 
    $root = $_SERVER['DOCUMENT_ROOT'];
    $path_database = $root . '/database/connection.php';
    require_once($path_database);

    function activeAccount($email, $token) {
        $sql = 'select username from account where email = ? and activate_token = ? and activated = 0';
        
        $con = connect_database();
        $stm = $con->prepare($sql);
        $stm->bind_param('ss', $email, $token);

        if(!$stm->execute()) {
            return array('code' => 1, 'error' => 'Can not execute command');
        }

        $result = $stm->get_result();
        if($result->num_rows == 0) {
            return array('code' => 2, 'error' => 'Email address or password does not exist');
        }

        // Found
        $sql = "update account set activated = 1, activate_token = '' where email = ?";
        $stm = $con->prepare($sql);
        $stm->bind_param('s',$email);

        if(!$stm->execute()) {
            return array('code' => 1, 'error' => 'Can not execute command');
        }

        return array('code' => 0, 'message' => 'Account has been activated');
    }


?>