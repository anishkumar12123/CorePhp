<?php
header("Content-Type: application/json");
include "db.php";

if(isset($_POST['id'])) {
    $id = $_POST['id'];

    $sql = "DELETE FROM users WHERE id='$id'";

    if ($conn->query($sql)) {
        echo json_encode(["message" => "User Deleted Successfully"]);
    } else {
        echo json_encode(["error" => "Delete Failed"]);
    }
} else {
    echo json_encode(["error" => "Invalid Request"]);
}
?>
