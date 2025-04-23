<?php
// Simulação de banco de dados com arquivo JSON
$arquivo = 'usuarios.json';

$usuarios = file_exists($arquivo) ? json_decode(file_get_contents($arquivo), true) : [];

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

if (isset($usuarios[$username])) {
    echo "<script>alert('Usuário já existe!'); window.location.href='signup.html';</script>";
    exit;
}

$usuarios[$username] = password_hash($password, PASSWORD_DEFAULT);
file_put_contents($arquivo, json_encode($usuarios));

echo "<script>alert('Cadastro realizado com sucesso!'); window.location.href='index.html';</script>";
