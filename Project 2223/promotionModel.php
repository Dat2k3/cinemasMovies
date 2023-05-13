<?php 
    function get_promotion() {
        $conn = connect_database();
        $data = [];

        $result = $conn->query("select * from event");
        if($result->num_rows > 0) {
            for($i = 1; $i <= $result->num_rows; $i++) {
                $data[] = $result->fetch_assoc();
            }
        }
        return $data;
    }
?>