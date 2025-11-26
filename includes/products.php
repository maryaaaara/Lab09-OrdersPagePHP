<?php

/// for products page

include 'connect.php';

function getAllProducts() {
    $query = "SELECT * FROM product";
    $conn = ConnectDB();

    $result = $conn->query($query);
    
    $data = [];
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    return $data;
}

function getFilteredProducts($name = "") {
    $conn = ConnectDB();

    $query = "SELECT * FROM product";
    if (!empty($name)) {
        $query .= " WHERE p_descript LIKE" . "'%" . $name . "%';";
    }

    $result = $conn->query($query);
    
    $data = [];
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    return $data;
}

?>