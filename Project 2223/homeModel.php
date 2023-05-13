<?php 
    $root = $_SERVER['DOCUMENT_ROOT'];
    $path_database = $root . '/database/connection.php';
    require_once($path_database);

    function get_poster($position) {
        $conn = connect_database();
        $data = [];

        $result = $conn->query("select * from poster where position = '$position'");
        
        if($result->num_rows > 0) {
            $data = $result->fetch_assoc();
        }
        return $data;
    }

    function get_posters() {
        $conn = connect_database();
        $data = [];

        $result = $conn->query("select * from poster");
        if($result->num_rows > 0) {
            for($i = 1; $i <= $result->num_rows; $i++) {
                $data[] = $result->fetch_assoc();
            }
        }
        return $data;
    }

    function get_information($username) {
        $conn = connect_database();
        $data = [];

        $result = $conn->query("select * from account where username = '$username'");
        
        if($result->num_rows > 0) {
            $data = $result->fetch_assoc();
        }
        return $data;
    }
?>