
<?php
require 'db_connection.php';
require 'check_login.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_SESSION['email'];
    $name = $_POST['name'];
    $newpassword = $_POST['password'];
    $newcpassword = $_POST['cpassword'];
    $newHashedPassword = password_hash($newpassword, PASSWORD_DEFAULT);
    if ($newpassword === $newcpassword) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
        $sqlquery = "UPDATE persons
            SET name = '$name', password = '$newHashedPassword',image='$target_file'
            WHERE email = '$email'";
        $conn->query($sqlquery);
        $_SESSION['successMessage'] = 'profile updated successfully';
        header('location:accuiel.php');
        exit;
    } else {
        echo "New password and confirm password do not match.";
    }
}
?>
