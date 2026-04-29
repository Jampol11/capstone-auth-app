<?php
session_start();
require_once 'database/db.php';
require_once 'controllers/AuthController.php';

$auth = new AuthController();
$action = $_GET['action'] ?? 'login';
$errors = [];

if ($action === 'register' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $result = $auth->register($_POST);
    if ($result['success']) {
        header('Location: index.php?action=login&status=registered');
        exit;
    }
    $errors[] = $result['message'];
}

if ($action === 'login' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $result = $auth->login($_POST);
    if ($result['success']) {
        header('Location: index.php?action=home');
        exit;
    }
    $errors[] = $result['message'];
}

if ($action === 'logout') {
    $auth->logout();
    header('Location: index.php?action=login');
    exit;
}

if ($action === 'home') {
    if (!isset($_SESSION['user'])) {
        header('Location: index.php?action=login');
        exit;
    }
    include 'views/home.php';
    exit;
}

if ($action === 'register') {
    include 'views/register.php';
    exit;
}

include 'views/login.php';
?>
