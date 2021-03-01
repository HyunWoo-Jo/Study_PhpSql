<?php

try{
    include_once __DIR__ . '/../includes/DatabaseFunctions.php';

    include __DIR__ . '/../includes/DatabaseConnection.php';

    $jokes = allJokes($pdo);
   
    $totalJokes = totalJokes($pdo);

    $title = '유머 글 목록';
    ob_start();

    include __DIR__ . '/../templates/jokes.html.php';

    $output = ob_get_clean();
}catch(PDOException $e){
    $title = '오류가 발생했습니다';

    $output = '데이터베이스 오류 : ' . $e->getMessage() . ', 위치: '. $e->getFile() . ' : ' . $e->getLine();
}

include __DIR__ . '/../templates/layout.html.php';