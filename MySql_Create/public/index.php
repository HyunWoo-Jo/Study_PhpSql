<?php
try{
    $pdo = new PDO("mysql:host=localhost;dbname=ijdb","ijdbuser","test123123123");
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    $sql = 'CREATE TABLE joke1(
        id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        joketext TEXT,
        jokedate DATE NOT NULL
        ) DEFAULT CHARACTER SET utf8 ENGINE=InnoDB'; 
        
        $pdo->exec($sql);

    $output = "joke 테이블 생성 완료";

}catch(PDOException $e){
    $output = '데이터 베이스 오류' . $e->getMessage() . '위치 :' . $e->getFile() . ' : ' . $e->getLine();
}

include __DIR__ . '/../templates/output.html.php';