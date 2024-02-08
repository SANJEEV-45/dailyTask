<?php
if (isset($_POST['submit'])) {
    $emailPattern = '/^([a-z\d\.-]{1,64})@([a-z\d]+)\.([a-z]{2,3})(\.[a-z]{2,3})?$/m';
    $passwordPattern = '/^(?=.*\d)(?=.*[A-Z])(?=.*[a-z])(?=.*[^\w\d\s])([^\s]){8,20}$/m';
    //  echo print_r($_POST);
    $email = $_POST["email"];
    $password = $_POST["password"];
    if (!preg_match($emailPattern, $email)) {
        echo "email is wrong";
    } elseif (!preg_match($passwordPattern, $password)) {
        echo "password is wrong";
    } else {
        echo "login successful";
    }
}
?>