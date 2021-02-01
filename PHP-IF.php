<!DOCTYPE html>
<hmtl lang="ko">
    <head>
        <meta charset="utf-8">
        <title>테스트 페이지</title>
    </head>
    <body>
        <p>
            <?php 
            $roll = rand(1,6);

            echo '<p>주사위를 굴려 나온 숫자 :' . $roll . '</p>';

            if($roll == 6 || $roll == 5){
                echo '<p>이겼다!</p>';
            } else if ($roll > 3){
                echo '<p>비겼다!</p>';
            }
            else {
                echo '<p> 아쉽지만 \'꽝\'이네요. 다음 기회를 노려보세요!</p>';
            }
            echo '<p>게임에 참여해주셔서 감사합니다</p>';
            ?> 
        </p>
    </body>
</hmtl>