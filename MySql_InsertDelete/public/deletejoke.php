<?php
if (isset($_POST['id'])){
    try{
        $pdo = new PDO('mysql:host=localhost;dbname=ijdb;charset=utf8','ijdbuser','test123123123');
        $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
        $sql = 'DELETE FROM `joke` WHERE `id` = :id';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id',$_POST['id']);

        $stmt->execute();
        header("location: index.php");
    }
    catch(PDOException $e) {
        $output = '데이터베이스 오류 : ' . $e->getMessage() . ', 위치: '. $e->getFile() . ' : ' . $e->getLine();
    }

} else {
    $output = "입력 없음";
}
include __DIR__ . '/../templates/layout.html.php';

