<!DOCTYPE html>
<html>
<head>
</head>
    <meta charset='utf-8'>
    <link rel="stylesheet" href="jokes.css">
    <title><?=$title?></title>
<body>
    <header>
    <h1>인터넷 유머 세상</h1>    
</header>
<nav>
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="index.php?action=list">유머 글 목록</a></li>
        <li><a href="index.php?action=edit">유머 글 등록</a></li>
</ul>
</nav>

<main>
    <?=$output?>
</main>
<fotter>
    &copy; IJDB 2021
</footer>
</body>

</hmtl>