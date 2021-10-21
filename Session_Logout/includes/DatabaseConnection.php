<?php 
try {
    $pdo = new PDO('mysql:host=localhost;dbname=ijdb;charset=utf8','ijuser','mypassword');
    $pdo->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    $title = '오류 발생';

    $output = '데이터 베이스 오류: '. $e->getMessage(). ', 위치: '. $e->getFile() . ':' . $e->getLine();
}
?>