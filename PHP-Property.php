<!DOCTYPE html>
<hmtl lang="ko">
    <head>
        <meta charset="utf-8">
        <title>테스트 페이지</title>
    </head>
    <body>
        <p>
            <?php 
            $var1 = 'PHP';
            $var2 = 5;
            $var3 = $var2 + 1;
            $var2 = $var1;
            $var4 = rand(1,12);
            echo $var1;
            echo $var2;
            echo $var3;
            echo $var4;
            echo $var1 . ' 규칙!';
            echo '$var1 규칙!';
            echo "$var1 규칙!";
            ?> 
        </p>
    </body>
</hmtl>