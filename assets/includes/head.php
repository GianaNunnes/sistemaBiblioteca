<?php
session_start();
define('__ROOT__', dirname(dirname(dirname(__FILE__))));

if (!isset($_SESSION['usuarioAtual']) && $paginaAtual != 'login'){
    header('Location: /login');
} else if (isset($_SESSION['usuarioAtual']) && !$_SESSION['usuarioAtual']['professor'] && isset($paginaAdmin) && $paginaAdmin){
    header('Location: /login');
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $tituloPagina ?></title>
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/style.css">
</head>