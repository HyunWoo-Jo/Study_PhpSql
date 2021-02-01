<!DOCTYPE html>
<hmtl lang="ko">
    <head>
        <meta charset="utf-8">
        <title>테스트 페이지</title>
    </head>
    <body>
        <p>
            <?php 
            $myArr = [1 => '하나',2 , '3',4,5,6];
            
            for($count = 1; $count < 7; $count++){
                echo $myArr[$count];
            }
            $birthdats['Kevin'] = '1979-04-12';
            $birthdats['Stephanie'] = '1973-02-12';
            echo $birthdats['Kevin'];
            echo $birthdats['Stephanie'];
            ?> 
        </p>
    </body>
</hmtl>