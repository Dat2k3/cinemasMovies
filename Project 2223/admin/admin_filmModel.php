<?php 
    $root = $_SERVER['DOCUMENT_ROOT'];
    $path_database = $root . '/database/connection.php';
    require_once($path_database);

    function upload_films($name, $image, $time, $detail, $table) {
        $sql = "insert into $table (name, image, time, detail) values (?,?,?,?)";
        $con = connect_database(); 

        $stm = $con->prepare($sql);
        $stm->bind_param('ssss', $name, $image, $time, $detail);

        if(!$stm->execute()) {
            return array('code' => 1, 'error' => 'Can not execute command');
        }

        return array('code' => 0, 'error' => 'Adding Successful');
    }

    function update_film($name, $time, $detail, $nameCurrent, $table) {
        $sql = "UPDATE $table SET name = ?, time = ?, detail = ? WHERE name = ?";
        $con = connect_database(); 

        $stm = $con->prepare($sql);
        $stm->bind_param('ssss', $name, $time, $detail, $nameCurrent);

        if(!$stm->execute()) {
            return array('code' => 1, 'error' => 'Can not execute command');
        }

        return array('code' => 0, 'error' => 'Modifying Successful');
    }

    function check_exist_name($name, $table) {
        $con = connect_database();
        
        $result = $con->query("SELECT * FROM $table WHERE name = '$name'");
        if($result->num_rows > 0) {
           return true;
        }
       return false;
    }
    function remove_film($name, $table) {
        $sql = "DELETE FROM $table WHERE name = ?";
        $con = connect_database();

        $stm = $con->prepare($sql);
        $stm->bind_param('s', $name);

        if(!$stm->execute()) {
            return array('code' => 1, 'error' => 'Can not execute command');
        }
        return array('code' => 0, 'error' => 'Removing Successful');
    }

    function name_image($name, $table) {
        $conn = connect_database();
        $data = [];

        $result = $conn->query("select image from $table where name = '$name'");
        if($result->num_rows > 0) {
            for($i = 1; $i <= $result->num_rows; $i++) {
                $data = $result->fetch_assoc();
            }
        }
        return $data;
    }
?>