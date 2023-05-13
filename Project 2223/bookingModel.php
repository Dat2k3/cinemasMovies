<?php 
    $root = $_SERVER['DOCUMENT_ROOT'];
    $path_database = $root . '/database/connection.php';
    require_once($path_database);

    function get_film_day($film) {
        $conn = connect_database();
        $data = [];

        $result = $conn->query("select * from film_day where film = '$film'");
        if($result->num_rows > 0) {
            for($i = 1; $i <= $result->num_rows; $i++) {
                $data[] = $result->fetch_assoc();
            }
        }
        return $data;
    }

    function get_film_theater($film, $theater) {
        $conn = connect_database();
        $data = [];

        $result = $conn->query("select * from film_theater where film = '$film' and theater = '$theater'");
        if($result->num_rows > 0) {
            for($i = 1; $i <= $result->num_rows; $i++) {
                $data[] = $result->fetch_assoc();
            }
        }
        return $data;
    }

    function get_film_chair($film, $chair_name) {
        $conn = connect_database();
        $data = [];

        $result = $conn->query("select * from film_chair where film = '$film' and name_chair = '$chair_name'");
        if($result->num_rows > 0) {
            for($i = 1; $i <= $result->num_rows; $i++) {
                $data[] = $result->fetch_assoc();
            }
        }
        return $data;
    }

    function updateChair($film, $num_chair) {
        $sql = "UPDATE film_chair SET selected = 1 WHERE film = ? and num_chair = ?";
        $con = connect_database(); 

        $stm = $con->prepare($sql);
        $stm->bind_param('ss', $film, $num_chair);

        if(!$stm->execute()) {
            return array('code' => 1, 'error' => 'Can not execute command');
        }

        return array('code' => 0, 'error' => 'Modifying Successful');
    }

    function insertTicket($name, $username, $film, $day, $time_theater, $chair) {
        $sql = "insert into my_ticket (username, film, day, theater_time, chair, name) values (?,?,?,?,?,?)";
        $con = connect_database(); 

        $stm = $con->prepare($sql);
        $stm->bind_param('ssssss', $username, $film, $day, $time_theater, $chair, $name);

        if(!$stm->execute()) {
            return array('code' => 1, 'error' => 'Can not execute command');
        }

        return array('code' => 0, 'error' => 'Adding Successful');
    }

    function get_history_booking() {
        $conn = connect_database();
        $data = [];

        $result = $conn->query("select * from my_ticket");
        if($result->num_rows > 0) {
            for($i = 1; $i <= $result->num_rows; $i++) {
                $data[] = $result->fetch_assoc();
            }
        }
        return $data;
    }
?>