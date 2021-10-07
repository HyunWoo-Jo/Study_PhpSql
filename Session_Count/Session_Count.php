<?php
session_start();
if(!isset($_SESSION['visits'])){
    $_SESSION['visits'] = 0;
}
$_SESSION['visits'] = $_SESSION['visits'] + 1;

if($_SESSION['visits'] > 1){
    echo $_SESSION['visits'] . " 번째 방문하셨습니다.";
} else {
    echo '웹사이트에 오신 걸 환영합니다! 둘러보시려면 여기를 클릭하세요!';
}