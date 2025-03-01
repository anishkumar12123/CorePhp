<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register User</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


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

<body class="bg-light">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg">
                    <div class="card-header bg-primary text-white text-center">
                        <h3>User Registration</h3>
                    </div>
                    <div class="card-body">
                        <form id="userForm">
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Mobile</label>
                                <input type="text" class="form-control" id="mobile" required>
                            </div>

                            <button type="submit" class="btn btn-primary w-100">Submit</button>
                        </form>
                    </div>
                </div>

                <div id="response" class="mt-3 text-center"></div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $("#userForm").submit(function(event) {
                event.preventDefault(); // Page reload na ho

                var formData = {
                    name: $("#name").val(),
                    email: $("#email").val(),
                    mobile: $("#mobile").val()
                };

                $.ajax({
                    url: "api.php", // API ka path
                    type: "POST",
                    contentType: "application/json",
                    data: JSON.stringify(formData),
                    success: function(response) {
                        $("#response").html('<div class="alert alert-success">' + response.message + '</div>');
                        $("#userForm")[0].reset(); // Form clear kare
                    },
                    error: function() {
                        $("#response").html('<div class="alert alert-danger">Error in registration</div>');
                    }
                });
            });
        });
    </script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>