<p><?=$totaljoke?>개 유머 글이 있습니다.</p>
<?php foreach ($jokes as $joke): ?>
    <blockquote>
        <p>
            <?=htmlspecialchars($joke['joketext'], ENT_QUOTES, 'UTF-8')?>
            (작성자: <a href="mailto:<?=htmlspecialchars($joke['email'], ENT_QUOTES, 'UTF-8');?>"><?=htmlspecialchars($joke['name'],ENT_QUOTES , 'UTF-8');?></a>)
            <a href="/joke/edit?id=<?=$joke['id']?>">수정</a>
            <form action="/joke/delete" method="post">
            <input type="hidden" name="id" value="<?=$joke['id']?>">
            <input type="submit" value="삭제">
        </form>
        </p>
    </blockquote>
<?php endforeach; ?>
