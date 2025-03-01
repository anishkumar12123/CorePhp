<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, POST");  
header("Access-Control-Allow-Headers: Content-Type");
include 'db.php';

// Check request type
$method = $_SERVER['REQUEST_METHOD'];

if ($method == "POST") { // Allow POST request
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];

} else { // If JSON data is sent (PUT method)
    $json = file_get_contents("php://input");
    $data = json_decode($json, true);

    if (!$data) {
        echo json_encode(["error" => "Invalid JSON Data", "received_json" => $json]);
        exit;
    }

    $id = $data['id'];
    $name = $data['name'];
    $email = $data['email'];
    $mobile = $data['mobile'];
}

// Update Query
$sql = "UPDATE users SET name='$name', email='$email', mobile='$mobile' WHERE id=$id";
if ($conn->query($sql)) {
    echo json_encode(["success" => true, "message" => "User Updated Successfully"]);
} else {
    echo json_encode(["success" => false, "error" => "User Update Failed", "sql_error" => $conn->error]);
}
?>
