<?php

try{
    $pdo = new PDO('mysql:host=localhost;dbname=ijdb;chaset=utf8','ijdbuser','test123123123');
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    $sql = 'SELECT `id`, `joketext` FROM `joke`';
    $result = $pdo->query($sql);

    while($row = $result->fetch()){
        $jokes[] = array('id' => $row['id'], 'joketext' => $row['joketext']);
    }
    $title = '유머 글 목록';

    ob_start();

    include __DIR__ . '/../templates/jokes.html.php';

    $output = ob_get_clean();
}catch(PDOException $e){
    $title = '오류가 발생했습니다';

    $output = '데이터베이스 오류 : ' . $e->getMessage() . ', 위치: '. $e->getFile() . ' : ' . $e->getLine();
}

include __DIR__ . '/../templates/layout.html.php';