<?php
    if(!isset($_COOKIE['visits'])){
        $_COOKIE['visits'] = 0;
    }
    $visits = $_COOKIE['visits'] + 1;
    setcookie('visits', $visits, time() + 3600);

    if($visits > 1){
        echo "$visits 번째 방문하셨습니다.";
    } else {
        echo '웹 사이트에 오신 걸 환영합니다! 둘러보려면 여기를 클릭하세요!';
    }