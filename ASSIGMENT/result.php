
<?php
session_start();

if (!isset($_SESSION["student"], $_SESSION["image"])) {
    header("Location: index.php");
    exit;
}

$student = $_SESSION["student"];
$image = $_SESSION["image"];

function safe($value) {
    return htmlspecialchars((string)$value, ENT_QUOTES, "UTF-8");
}

$personal = [
    "Name", "Place of Birth", "Date of Birth",
    "Address", "Gender", "Telephone", "Email"
];

$parent = [
    "Parent Name", "Parent Telephone", "Relationship"
];

$academic = [
    "Student ID", "Faculty", "Department",
    "Class", "Registration Date"
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Information</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>

<body class="bg-light">

<div class="container py-5">
    <div class="card shadow">

        <div class="card-header bg-success text-white text-center">
            <h2>Student Registered Successfully!</h2>
        </div>

        <div class="card-body">

            <div class="text-center mb-4">
                <img src="<?= safe($image) ?>"
                     alt="Student Image"
                     width="150" height="150"
                     class="rounded-circle border"
                     style="object-fit: cover;">

                <h3 class="mt-3">
                    <?= safe($student["Name"]) ?>
                </h3>
            </div>

            <?php
            $sections = [
                "Personal Information" => $personal,
                "Parent Information" => $parent,
                "Academic Information" => $academic
            ];

            foreach ($sections as $title => $fields):
            ?>

                <h4 class="text-primary mt-4">
                    <?= safe($title) ?>
                </h4>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>Field</th>
                                <th>Information</th>
                            </tr>
                        </thead>

                        <tbody>
                        <?php foreach ($fields as $field): ?>
                            <tr>
                                <td><?= safe($field) ?></td>
                                <td><?= safe($student[$field]) ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

            <?php endforeach; ?>

            <a href="index.php" class="btn btn-primary">
                Register Another Student
            </a>

        </div>
    </div>
</div>

</body>
</html>
