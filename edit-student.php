<?php
include "db.php";

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM users WHERE id=$id");
$student = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">Website</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="dasboard.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="addStudent.php">Add Student</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.html">View All Students</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="card shadow-lg p-4" style="width: 100%; max-width: 500px; border-radius: 10px;">
        <h2 class="text-center mb-4 text-primary">Edit Student</h2>
        <form id="editStudentForm">
            <input type="hidden" name="id" value="<?php echo $student['id']; ?>">

            <div class="mb-3">
                <label class="form-label fw-bold">Name:</label>
                <input type="text" name="name" class="form-control" value="<?php echo $student['name']; ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Email:</label>
                <input type="email" name="email" class="form-control" value="<?php echo $student['email']; ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Mobile:</label>
                <input type="text" name="mobile" class="form-control" value="<?php echo $student['mobile']; ?>" required>
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="index.php" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $("#editStudentForm").submit(function(e){
        e.preventDefault();

        $.ajax({
            url: "api-update.php",
            type: "POST", 
            data: $(this).serialize(), 
            dataType: "json",
            success: function(response){
                alert(response.message);
                if(response.success) {
                    window.location.href = "index.html";
                }
            },
            error: function(xhr, status, error){
                console.error("Error:", xhr.responseText);
                alert("Update failed!");
            }
        });
    });
</script>

</body>
</html>
