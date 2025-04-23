<?php
session_start();

$arquivo = 'usuarios.json';
$usuarios = file_exists($arquivo) ? json_decode(file_get_contents($arquivo), true) : [];

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

if (isset($usuarios[$username]) && password_verify($password, $usuarios[$username])) {
    $_SESSION['user'] = $username;
    header("Location: painel.html");
    exit;
} else {
    echo "<script>alert('Usuário ou senha inválidos.'); window.location.href='index.html';</script>";
}
