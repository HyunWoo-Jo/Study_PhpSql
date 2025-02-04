<!DOCTYPE html>
<html>
<head>
</head>
    <meta charset='utf-8'>
    <link rel="stylesheet" href="/jokes.css">
    <title><?=$title?></title>
<body>
    <header>
    <h1>인터넷 유머 세상</h1>    
</header>
<nav>
    <ul>
        <li><a href="/">Home</a></li>
        <li><a href="/joke/list">유머 글 목록</a></li>
        <?php if ($loggedIn) : ?>
            <li><a href="/joke/edit">유머 글 등록</a></li>
            <li><a href="/logout">로그아웃</a></li>
        <?php else: ?>
            <li><a href="/login">유머 글 등록</a></li>
            <li><a href="/login">로그인</a></li>
        <?php endif; ?>    
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