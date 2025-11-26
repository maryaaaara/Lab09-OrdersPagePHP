<?php
include 'connect.php';

function getAllOrders() {
    $query = "SELECT * FROM invoice AS i JOIN customer AS c ON i.cus_code = c.cus_code";
    $conn = ConnectDB();

    $result = $conn->query($query);
    
    $data = [];
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    return $data;
}

?>