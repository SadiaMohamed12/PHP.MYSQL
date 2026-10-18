<?php
$submitted = isset($_GET["submit"]);
$errMsg = "";
$fullname = trim($_GET["fullname"] ?? "");
$email = trim($_GET["email"] ?? "");
$pob = trim($_GET["pob"] ?? "");
$gender = $_GET["gender"] ?? "";
$faculty = $_GET["faculty"] ?? "";
$languages = $_GET["languages"] ?? [];
$comment = trim($_GET["comment"] ?? "");

if ($submitted) {
    if ($fullname === "") {
        $errMsg .= "Please enter your full name.<br>";
    }
    if ($email === "") {
        $errMsg .= "Please enter your email address.<br>";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errMsg .= "Please enter a valid email address.<br>";
    }
}

function escapeHtml($value)
{
    return htmlspecialchars((string) $value, ENT_QUOTES, "UTF-8");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>
</head>
<body>

<?php if ($submitted && $errMsg === ""): ?>
    <h2>Student Information</h2>
    Fullname: <?= escapeHtml($fullname) ?><br>
    Email: <?= escapeHtml($email) ?><br>
    Place of Birth: <?= escapeHtml($pob) ?><br>
    <?php if ($gender !== ""): ?>
        Gender: <?= escapeHtml($gender) ?><br>
    <?php endif; ?>
    Faculty: <?= escapeHtml($faculty) ?><br>
    Languages: <?= escapeHtml(implode(", ", $languages)) ?><br>
    Comment: <?= nl2br(escapeHtml($comment)) ?><br>
<?php endif; ?>
    
<form method="get" action="">

<h1 >Student Registration Form</h1>

<fieldset>
    <legend>Personal Info </legend>

    <?php if ($errMsg !== ""): ?>
        <p style="color: red;"><?= $errMsg ?></p>
    <?php endif; ?>

<label for="fullname">Fullname: </label>
<input type="text" id="fullname" name="fullname" value="<?= escapeHtml($fullname) ?>" required><br><br>

<label for="email">Email: </label>
<input type="email" id="email" name="email" value="<?= escapeHtml($email) ?>" required><br><br>

<label for="pob">Place of Birth: </label>
<input type="text" name="pob" id="pob" value="<?= escapeHtml($pob) ?>"> <br><br>

<label>Gender: </label>
<input type="radio" name="gender" value="male" <?= $gender === "male" ? "checked" : "" ?>> Male
<input type="radio" name="gender" value="female" <?= $gender === "female" ? "checked" : "" ?>> Female <br><br>

<label for="faculty">Faculty: </label>
<select name="faculty" id="faculty">
    <option value="computer">Computer and IT</option>
    <option value="medicine">Medicine and Health Science</option>
    <option value="engineering">Engineering</option>
    <option value="ecom">Business</option>
</select> <br><br>

<label>Languages: </label>
<input type="checkbox" name="languages[]" value="Somali" <?= in_array("Somali", $languages, true) ? "checked" : "" ?>>Somali
<input type="checkbox" name="languages[]" value="English" <?= in_array("English", $languages, true) ? "checked" : "" ?>>English
<input type="checkbox" name="languages[]" value="Arabic" <?= in_array("Arabic", $languages, true) ? "checked" : "" ?>>Arabic
<input type="checkbox" name="languages[]" value="Chinese" <?= in_array("Chinese", $languages, true) ? "checked" : "" ?>>Chinese <br><br>

<label for="comment">Comment: </label>
<textarea name="comment" id="comment" rows="4" cols="30"><?= escapeHtml($comment) ?></textarea><br><br>

<input type="submit" name="submit" value="Register">
<input type="reset" name="reset" value="Clear">

</fieldset>

</form>

</body>
</html>


