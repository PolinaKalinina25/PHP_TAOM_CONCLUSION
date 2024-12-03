<?php
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true){
    header('Location: Login.html');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_passwords'])){
    $input_password = $_POST['master_password'];
    $saved_password = file('master_password.txt', FILE_IGNORE_NEW_LINES);

    $password_valid = false;
    foreach ($saved_password as $decode_password){
        if ($input_password === base64_decode($decode_password)){
            $password_valid = true;
            break;
        }
    }

    if ($password_valid){
        file_put_contents('passwords.txt', '');
        $message = 'Все пароли успешно удалены!';
    }
    else{
        $message = 'Неверный мастер-пароль! Пароли не удалены.';
    }
}

$passwords = file('passwords.txt', FILE_IGNORE_NEW_LINES);
array_shift($passwords);

include 'show_passwords.html';