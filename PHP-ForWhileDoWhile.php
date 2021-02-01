<!DOCTYPE html>
<hmtl lang="ko">
    <head>
        <meta charset="utf-8">
        <title>테스트 페이지</title>
    </head>
    <body>
        <p>
            <?php 
            for($count = 1; $count < 10; $count++){
                echo '<p>' . $count . '</p>';
            }
            while($count <= 20){
                echo $count;
                $count++;
            }
            do{
                echo $count;
            }while($count < 20);
            
            do{
                $rand = rand(1,6);
                if($rand == 6){
                    echo '<p>이겼다</p>' . $rand;
                } else {
                    echo '<p>졌다.</p>' . $rand;
                }
            }while($rand != 6);
            ?> 
        </p>
    </body>
</hmtl>