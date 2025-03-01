<h1>fetchSingle</h1>


<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-methods:Post");
include'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM users WHERE id = $id";
    $result = $conn->query($sql);
    echo json_encode($result->fetch_assoc());
} else {
    echo json_encode(["error" => "ID Required"]);
}
?>
