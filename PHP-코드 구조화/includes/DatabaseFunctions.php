<?php

function totalJokes($pdo){
    $query = query($pdo,'SELECT COUNT(*) FROM `joke`');
    $row = $query->fetch();
    return $row[0];
}

function getJokes($pdo, $id){
    $parameters = [':id' => $id];

    $query = query($pdo,'SELECT * FROM `joke` WHERE `id`=:id', $parameters);
    return $query->fetch();
}
/// <param = $pdo> database </param>
/// <param = $sql> SQL 문 </param>
/// <param = $parameters> bind할 parameter들 </param>
function query($pdo, $sql, $parameters = []){
    $query = $pdo->prepare($sql);

    foreach($parameters as $name => $value){
        $query->bindValue($name, $value);
    }
    $query->execute();
    return $query;

}

function insertJoke($pdo, $joketext, $authorId){
    $query = 'INSERT INTO `joke` (`joketext`,`jokedate`,`authorId`)VALUES (:joketext, CURDATE(), :authorId)';
    $parameters = [':joketext' => $joketext, ':authorId' => $authorId];
    query($pdo, $query, $parameters);
}

function updateJoke($pdo, $jokeId, $joketext, $authorId){
    $parameters = [':joketext' => $joketext, ':authorId' => $authorId, ':id' => $jokeId];
    query($pdo, 'UPDATE `joke` SET `authorId` = :authorId, `joketext` = :joketext WHERE `id` = :id', $parameters);

}

function deleteJoke($pdo, $jokeId){
    $parameter = [":id" => $jokeId];
    query($pdo, 'DELETE FROM `joke` WHERE `id` = :id', $parameter);
}

function allJokes($pdo){
    $jokes = query($pdo, 'SELECT `joke`.`id`, `joketext`, `name`, `email` FROM `joke` INNER JOIN `author` ON `authorid` = `author`.`id`');
    return $jokes->fetchAll();
}