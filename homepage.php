<?php
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: Login.html');
    exit();
}
include 'home.html';
include 'save_password.php';
// include 'show_passwords.php';