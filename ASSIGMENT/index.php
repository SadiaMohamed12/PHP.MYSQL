
<?php
session_start();

$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Personal Information
    $name = trim($_POST["name"] ?? "");
    $pob = trim($_POST["pob"] ?? "");
    $dob = trim($_POST["dob"] ?? "");
    $address = trim($_POST["address"] ?? "");
    $gender = trim($_POST["gender"] ?? "");
    $telephone = trim($_POST["telephone"] ?? "");
    $email = trim($_POST["email"] ?? "");

    // Parent Information
    $parent_name = trim($_POST["parent_name"] ?? "");
    $parent_telephone = trim($_POST["parent_telephone"] ?? "");
    $relationship = trim($_POST["relationship"] ?? "");

    // Academic Information
    $student_id = trim($_POST["student_id"] ?? "");
    $faculty = trim($_POST["faculty"] ?? "");
    $department = trim($_POST["department"] ?? "");
    $class = trim($_POST["class"] ?? "");
    $registration_date = trim($_POST["registration_date"] ?? "");

    // Check required fields
    $fields = [
        "Name" => $name,
        "Place of Birth" => $pob,
        "Date of Birth" => $dob,
        "Address" => $address,
        "Gender" => $gender,
        "Telephone" => $telephone,
        "Email" => $email,
        "Parent Name" => $parent_name,
        "Parent Telephone" => $parent_telephone,
        "Relationship" => $relationship,
        "Student ID" => $student_id,
        "Faculty" => $faculty,
        "Department" => $department,
        "Class" => $class,
        "Registration Date" => $registration_date
    ];

    foreach ($fields as $field => $value) {
        if ($value == "") {
            $errors[] = "$field is required.";
        }
    }

    // Validate name
    if ($name != "" && !preg_match("/^[\p{L} ]+$/u", $name)) {
        $errors[] = "Name must contain letters and spaces only.";
    }

    // Validate email
    if ($email != "" && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Please enter a valid email.";
    }

    // Validate image
    if (!isset($_FILES["image"]) ||
        $_FILES["image"]["error"] == UPLOAD_ERR_NO_FILE) {
        $errors[] = "Please upload a student image.";
    } elseif ($_FILES["image"]["error"] != UPLOAD_ERR_OK) {
        $errors[] = "Image upload failed.";
    } else {
        $allowed = ["image/jpeg", "image/png", "image/gif"];
        $fileInfo = new finfo(FILEINFO_MIME_TYPE);
        $imageType = $fileInfo->file($_FILES["image"]["tmp_name"]);

        if (!in_array($imageType, $allowed)) {
            $errors[] = "Only JPG, PNG and GIF images are allowed.";
        }

        if ($_FILES["image"]["size"] > 2 * 1024 * 1024) {
            $errors[] = "Image must be smaller than 2 MB.";
        }
    }

    // If no errors, save image and go to result page
    if (empty($errors)) {

        if (!is_dir("uploads")) {
            mkdir("uploads", 0755, true);
        }

        $extensions = [
            "image/jpeg" => "jpg",
            "image/png" => "png",
            "image/gif" => "gif"
        ];

        $imageName = uniqid("student_") . "." . $extensions[$imageType];
        $imagePath = "uploads/" . $imageName;

        if (move_uploaded_file(
            $_FILES["image"]["tmp_name"],
            $imagePath
        )) {

            $_SESSION["student"] = [
                "Name" => $name,
                "Place of Birth" => $pob,
                "Date of Birth" => $dob,
                "Address" => $address,
                "Gender" => $gender,
                "Telephone" => $telephone,
                "Email" => $email,
                "Parent Name" => $parent_name,
                "Parent Telephone" => $parent_telephone,
                "Relationship" => $relationship,
                "Student ID" => $student_id,
                "Faculty" => $faculty,
                "Department" => $department,
                "Class" => $class,
                "Registration Date" => $registration_date
            ];

            $_SESSION["image"] = $imagePath;

            header("Location: result.php");
            exit;

        } else {
            $errors[] = "Unable to save the uploaded image.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Registration</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>

<body class="bg-light">

<div class="container py-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-white text-center">
            <h2>Student Registration Form</h2>
        </div>

        <div class="card-body">

            <?php if (!empty($errors)): ?>
                <div class="alert alert-danger">
                    <strong>Please correct these errors:</strong>
                    <ul class="mb-0">
                        <?php foreach ($errors as $error): ?>
                            <li><?= htmlspecialchars($error) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form method="POST"
                  action="index.php"
                  enctype="multipart/form-data">

                <h4 class="text-primary">1. Personal Information</h4>
                <hr>

                <div class="row g-3">

                    <div class="col-md-6">
                        <label class="form-label">Full Name</label>
                        <input type="text" name="name"
                               class="form-control" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Place of Birth</label>
                        <input type="text" name="pob"
                               class="form-control" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Date of Birth</label>
                        <input type="date" name="dob"
                               class="form-control" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Address</label>
                        <input type="text" name="address"
                               class="form-control" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Gender</label>
                        <select name="gender" class="form-select" required>
                            <option value="">Choose Gender</option>
                            <option value="Female">Female</option>
                            <option value="Male">Male</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Telephone</label>
                        <input type="tel" name="telephone"
                               class="form-control" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Email</label>
                        <input type="email" name="email"
                               class="form-control" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Student Image</label>
                        <input type="file" name="image"
                               class="form-control"
                               accept=".jpg,.jpeg,.png,.gif"
                               required>
                    </div>

                </div>

                <h4 class="text-primary mt-4">2. Parent Information</h4>
                <hr>

                <div class="row g-3">

                    <div class="col-md-4">
                        <label class="form-label">Parent Name</label>
                        <input type="text" name="parent_name"
                               class="form-control" required>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Parent Telephone</label>
                        <input type="tel" name="parent_telephone"
                               class="form-control" required>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Relationship</label>
                        <select name="relationship"
                                class="form-select" required>
                            <option value="">Choose Relationship</option>
                            <option value="Father">Father</option>
                            <option value="Mother">Mother</option>
                            <option value="Guardian">Guardian</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>

                </div>

                <h4 class="text-primary mt-4">3. Academic Information</h4>
                <hr>

                <div class="row g-3">

                    <div class="col-md-6">
                        <label class="form-label">Student ID</label>
                        <input type="text" name="student_id"
                               class="form-control" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Faculty</label>
                        <input type="text" name="faculty"
                               class="form-control" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Department</label>
                        <input type="text" name="department"
                               class="form-control" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Class</label>
                        <input type="text" name="class"
                               class="form-control" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Registration Date</label>
                        <input type="date" name="registration_date"
                               class="form-control" required>
                    </div>

                </div>

                <button type="submit"
                        class="btn btn-primary w-100 mt-4">
                    Register Student
                </button>

            </form>
        </div>
    </div>
</div>

</body>
</html>
