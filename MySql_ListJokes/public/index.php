<?php
try{
    $pdo = new PDO("mysql:host=localhost;dbname=ijdb","ijdbuser","test123123123");
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    $sql = 'SELECT `joketext` FROM `joke`'; 
    
    $result = $pdo->query($sql);

    while($row = $result->fetch()){
        $jokes[] = $row['joketext'];
    }

}catch(PDOException $e){
    $output = '데이터 베이스 오류' . $e->getMessage() . '위치 :' . $e->getFile() . ' : ' . $e->getLine();
}

include __DIR__ . '/../templates/output.html.php';