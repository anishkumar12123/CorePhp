<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: DELETE");
header("Access-Control-Allow-Headers: Content-Type");
include 'db.php';

// Read JSON Input
$data = json_decode(file_get_contents("php://input"), true);

// Debugging: Check received data
if (!$data) {
    echo json_encode(["error" => "Invalid JSON Data"]);
    exit;
}

if (isset($data['id']) && !empty($data['id'])) {
    $id = mysqli_real_escape_string($conn, $data['id']);

    // First check if user exists
    $checkSql = "SELECT * FROM users WHERE id = '$id'";
    $checkResult = $conn->query($checkSql);

    if ($checkResult->num_rows > 0) {
        // If user exists, delete
        $sql = "DELETE FROM users WHERE id='$id'";
        if ($conn->query($sql)) {
            echo json_encode(["message" => "User Deleted Successfully"]);
        } else {
            echo json_encode(["error" => "User Deletion Failed", "sql_error" => $conn->error]);
        }
    } else {
        echo json_encode(["error" => "No User Found"]);
    }
} else {
    echo json_encode(["error" => "ID Required"]);
}
?>
