<?php
session_start();

require 'password_validation.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $mastert_password = $_POST['mastert_password'];
    if (empty($mastert_password)){
        die('Мастер-пароль не может быть пустым!');
    }
    if (!check_min_length($mastert_password)){
        die('Пароль должен быть не менее 8 символов!');
    }

    if (!contains_letter($mastert_password)){
        die('Пароль должен содержать хотя бы одну букву!');
    }

    if (!contains_digit($mastert_password)){
        die('Пароль должен содержать хотя бы одну цифру!');
    }

    if (!contains_special_char($mastert_password)){
        die('Пароль должен содержать хотя бы один специальный символ!');
    }
    $encrypted_password = base64_encode($mastert_password);
    file_put_contents('master_password.txt', $encrypted_password . PHP_EOL, FILE_APPEND);
    
    $_SESSION['logged_in'] = true;
    header('Location: homepage.php');
    exit();
}
include 'index.html';