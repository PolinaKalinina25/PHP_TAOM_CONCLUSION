<?php
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !==true){
    header('Location: Login.html');
    exit();
}

require 'password_validation.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $new_password = $_POST['new_password'];

    if (empty($new_password)) {
    die('Пароль не может быть пустым!');
    }

    if (!check_min_length($new_password)){
        die('Пароль должен быть не менее 8 символов!');
    }

    if (!contains_letter($new_password)){
        die('Пароль должен содержать хотя бы одну букву!');
    }

    if (!contains_digit($new_password)){
        die('Пароль должен содержать хотя бы одну цифру!');
    }

    if (!contains_special_char($new_password)){
        die('Пароль должен содержать хотя бы один специальный символ!');
    }

    $encrypted_password = base64_encode($new_password);

    file_put_contents('passwords.txt', $encrypted_password.PHP_EOL, FILE_APPEND);

    echo 'Пароль успешно сохранен!';
    header('Location: homepage.php');
    exit();
}
