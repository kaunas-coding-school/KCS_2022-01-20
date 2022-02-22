<?php

// Visuomet pirma startuojam sesija
session_start();

if (!empty($_POST) &&
    isset($_POST['username']) &&
    isset($_POST['password']) &&
    $_POST['username'] === 'admin' &&
    $_POST['password'] === 'admin'
) {
    $_SESSION['username'] = $_POST['username'];

    header('location: admin.php');
} else {
    header('location: login.html');
}
