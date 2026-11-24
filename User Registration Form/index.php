<?php

$errors = [];
$submitted = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    

    $last_name = trim($_POST["last_name"]);
    $first_name = trim($_POST["first_name"]);
    $date_of_birth = trim($_POST["date_of_birth"]);
    $place_of_birth = trim($_POST["place_of_birth"]);
    $address = trim($_POST["address"]);
    $city = trim($_POST["city"]);
    $province = trim($_POST["province"]);
    $postal_code = trim($_POST["postal_code"]);
    $phone = trim($_POST["phone"]);
    $email = trim($_POST["email"]);
    $tax_code = trim($_POST["tax_code"]);

    $password = $_POST["password"];
    $password_confirmation = $_POST["password_confirmation"];

    

    if ($last_name == "") {
        $errors[] = "Enter last name.";
    }

    

    if ($first_name == "") {
        $errors[] = "Enter first name.";
    }

    

    if ($date_of_birth == "") {
        $errors[] = "Enter date of birth.";
    }

   

    if ($place_of_birth == "") {
        $errors[] = "Enter place of birth.";
    }



    if ($address == "") {
        $errors[] = "Enter address.";
    }

   

    if ($city == "") {
        $errors[] = "Enter city.";
    }

    

    if ($province == "") {
        $errors[] = "Enter province.";
    }

    

    if ($postal_code == "") {
        $errors[] = "Enter postal code.";
    }

 

    if ($phone == "") {
        $errors[] = "Enter phone number.";
    } elseif (!preg_match("/^[0-9+ ]+$/", $phone)) {
        $errors[] = "Invalid phone number.";
    }

    

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email.";
    }

    

    if (!preg_match("/^[A-Za-z0-9]{16}$/", $tax_code)) {
        $errors[] = "Tax code must contain 16 characters.";
    }

    

    if (strlen($password) < 8) {
        $errors[] = "Password must contain at least 8 characters.";
    }

    if (!preg_match("/[0-9]/", $password)) {
        $errors[] = "Password must contain at least 1 number.";
    }

    if (!preg_match("/[A-Z]/", $password)) {
        $errors[] = "Password must contain at least 1 capital letter.";
    }

    if (!preg_match("/[a-z]/", $password)) {
        $errors[] = "Password must contain at least 1 lowercase letter.";
    }

    if (!preg_match("/[^a-zA-Z0-9]/", $password)) {
        $errors[] = "Password must contain at least 1 special character.";
    }

   

    if ($password != $password_confirmation) {
        $errors[] = "Passwords do not match.";
    }

   

    if (!isset($_POST["privacy"])) {
        $errors[] = "Accept the privacy option.";
    }

    

    if (empty($errors)) {

        $password = password_hash($password, PASSWORD_DEFAULT);
        $submitted = true;

    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>User registration form</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container">

    <h1>User registration form</h1>

    <form action="" method="POST">

        <label>Last Name:</label>
        <input type="text" name="last_name" required>

        <label>First Name:</label>
        <input type="text" name="first_name" required>

        <label>Date of Birth:</label>
        <input type="date" name="date_of_birth" required>

        <label>Place of Birth:</label>
        <input type="text" name="place_of_birth" required>

        <label>Address:</label>
        <input type="text" name="address" required>

        <label>City:</label>
        <input type="text" name="city" required>

        <label>Province:</label>
        <input type="text" name="province" required>

        <label>Postal Code:</label>
        <input type="text" name="postal_code" required>

        <label>Phone Number:</label>
        <input type="text" name="phone" required>

        <label>Email:</label>
        <input type="email" name="email" required>

        <label>Tax Code:</label>
        <input type="text" name="tax_code" maxlength="16" required>

        <label>Password:</label>
        <input type="password" name="password" required>

        <label>Password Confirmation:</label>
        <input type="password" name="password_confirmation" required>

        <label>
            <input type="checkbox" name="privacy" value="yes" required>
            Privacy and consent option
        </label>

        <input type="submit" value="Submit">

    </form>

    <?php

    // Show errors

    if (!empty($errors)) {

        foreach ($errors as $error) {
            echo "<p class='error'>" . htmlspecialchars($error) . "</p>";
        }

    }

    ?>

</div>

<?php



if ($submitted == true) {

?>

<div class="container">

    <h2>Submitted Information</h2>

    <h2>User registration data:</h2>

    <p>Last Name: <?php echo htmlspecialchars($last_name); ?></p>

    <p>First Name: <?php echo htmlspecialchars($first_name); ?></p>

    <p>Date of Birth: <?php echo htmlspecialchars($date_of_birth); ?></p>

    <p>Place of Birth: <?php echo htmlspecialchars($place_of_birth); ?></p>

    <p>Address: <?php echo htmlspecialchars($address); ?></p>

    <p>City: <?php echo htmlspecialchars($city); ?></p>

    <p>Province: <?php echo htmlspecialchars($province); ?></p>

    <p>Postal Code: <?php echo htmlspecialchars($postal_code); ?></p>

    <p>Phone: <?php echo htmlspecialchars($phone); ?></p>

    <p>Email: <?php echo htmlspecialchars($email); ?></p>

    <p>Tax Code: <?php echo htmlspecialchars($tax_code); ?></p>

    <p>Password: Protected</p>

    <p>Password confirmation: Protected</p>

    <p>Privacy option: OK</p>

</div>

<?php
}
?>

</body>
</html>
