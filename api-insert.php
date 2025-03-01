<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-methods:Post");
include 'db.php';

$data = json_decode(file_get_contents("php://input"), true);

if (isset($data['name']) && isset($data['email']) && isset($data['mobile'])) {
    $name = $data['name'];
    $email = $data['email'];
    $mobile = $data['mobile'];

    $sql = "INSERT INTO users (name, email, mobile) VALUES ('$name', '$email', '$mobile')";
    if ($conn->query($sql)) {
        echo json_encode(["message" => "User Created Successfully"]);
    } else {
        echo json_encode(["error" => "User Creation Failed"]);
    }
} else {
    echo json_encode(["error" => "Invalid Data"]);
}
?>
