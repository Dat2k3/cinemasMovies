<?php 
    $root = $_SERVER['DOCUMENT_ROOT'];
    $path_database = $root . '/database/connection.php';
    require_once($path_database);

    function replace_password($email, $pass) {
        $sql = 'update account set password = ? where email = ?';
        $hash = password_hash($pass, PASSWORD_DEFAULT);

        $con = connect_database();
        $stm = $con->prepare($sql);
        $stm->bind_param('ss',$hash, $email);

        if(!$stm->execute()) {
            return array('code' => 1, 'error' => 'Can not execute command');
        }

        return array('code' => 0, 'error' => 'Create account successful');
    }
?>