<?php
try{
    $pdo = new PDO("mysql:host=localhost;dbname=ijdb","ijdbuser","test123123123");
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    $sql = 'UPDATE joke SET jokedate="2012-04-01" WHERE joketext LIKE "%프로그래머%"';
    
    $affectedRows = $pdo->exec($sql);

    $output = '갱신된 row :' . $affectedRows;

}catch(PDOException $e){
    $output = '데이터 베이스 오류' . $e->getMessage() . '위치 :' . $e->getFile() . ' : ' . $e->getLine();
}

include __DIR__ . '/../templates/output.html.php';