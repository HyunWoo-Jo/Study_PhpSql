<?php
if (isset($_POST['id'])){
    try{
        include_once __DIR__ . '/../includes/DatabaseFunctions.php';
        include __DIR__ . '/../includes/DatabaseConnection.php';
    
        deleteJoke($pdo, $_POST['id']);

        header("location: index.php");
    }
    catch(PDOException $e) {
        $output = '데이터베이스 오류 : ' . $e->getMessage() . ', 위치: '. $e->getFile() . ' : ' . $e->getLine();
    }

} else {
    $output = "입력 없음";
}
include __DIR__ . '/../templates/layout.html.php';

