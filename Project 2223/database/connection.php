<?php 
    define('HOST', '127.0.0.1');
    define('USER', 'root');
    define('PASS', '');
    define('DB', 'cgv_cinema');

    function connect_database() {
        $conn = new mysqli(HOST, USER, PASS, DB);
        if($conn->connect_error) {
            die('Connect-error: ' . $conn->connect_error);
        }
        return $conn;
    }
?>