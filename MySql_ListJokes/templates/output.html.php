<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title> 출력 내용 </title>
    </head>
    <body>
        <?php if (isset($error)): ?>
            <p>
                <?php echo $error; ?>
            </p>
            <?php else: ?>
            <?php foreach($jokes as $joke): ?>
            <blockquote>
                <p>
                    <?php echo htmlspecialchars($joke,ENT_QUOTES,'UTF-8') ?>
                </p>
            </blockquote>
            <?php endforeach; ?>
            <?php endif; ?>
    </body>
</html>