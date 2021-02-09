<?php
try{
    $pdo = new PDO("mysql:host=localhost;dbname=ijdb","ijdbuser","test123123123");
    $output = "접속 성공";
}catch(PDOException $e){
    $output = "접속 실패" . $e;
}

include __DIR__ . '/../templates/output.html.php';