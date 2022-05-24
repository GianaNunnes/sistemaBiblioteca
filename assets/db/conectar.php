<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'biblioteca';
// DSN
$dsn = "mysql:host=${host};dbname=${db}";

// PDO instance
$pdo = new PDO($dsn, $user, $pass);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);



function execute($sql, $dados){
    global $pdo;
    $stmt = $pdo->prepare($sql);
    $stmt->execute($dados);
    return $stmt;
}



// $posts = $stmt->fetchAll();
// var_dump($stmt->rowCount());

// Select one
// $post = $stmt->fetch();