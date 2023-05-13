<?php 
    $root = $_SERVER['DOCUMENT_ROOT'];
    $path_database = $root . '/database/connection.php';

    require_once($path_database);

    function information($user_name, $name, $age, $gender, $email, $phone) {
        $sql = "insert into information_customer (username, name, age, gender, email, phone) values (?,?,?,?,?,?)";
        $con = connect_database();

        $stm = $con->prepare($sql);
        $stm->bind_param('ssssss', $user_name, $name, $age, $gender, $email, $phone);

        if(!$stm->execute()) {
            return array('code' => 2, 'error' => 'Can not execute command');
        }

        return array('code' => 0, 'error' => 'Successful Editing');
    }

    function get_information_customer($user_name) {
        $conn = connect_database();
        $data = [];

        $result = $conn->query("select * from information_customer where username = '$user_name'");
        
        if($result->num_rows > 0) {
            $data = $result->fetch_assoc();
        }
        return $data;
    }

    function update_information($user_name, $name, $age, $gender, $email, $phone) {
        $sql = "UPDATE information_customer SET name = ?, age = ?, gender = ?, email = ?, phone = ? WHERE username = ?";
        $con = connect_database(); 

        $stm = $con->prepare($sql);
        $stm->bind_param('ssssss', $name, $age, $gender, $email, $phone, $user_name);

        if(!$stm->execute()) {
            return array('code' => 1, 'error' => 'Can not execute command');
        }
        return array('code' => 0, 'error' => 'Updating Successful');
    }

?>