<?php 
    $root = $_SERVER['DOCUMENT_ROOT'];
    $path_database = $root . '/database/connection.php';
    require_once($path_database);

    function get_tickets($username) {
        $conn = connect_database();
        $data = [];

        $result = $conn->query("select * from my_ticket where username = '$username'");
        if($result->num_rows > 0) {
            for($i = 1; $i <= $result->num_rows; $i++) {
                $data[] = $result->fetch_assoc();
            }
        }
        return $data;
    }

?>
