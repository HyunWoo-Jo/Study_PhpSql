<?php
namespace Ijdb\Controllers;
use \Hanbit\DatabaseTable;

class Joke{
    private $jokesTable;
    private $authorsTable;

    public function __construct(DatabaseTable $jokesTable, DatabaseTable $authorsTable)
    {
        $this->jokesTable = $jokesTable;
        $this->authorsTable = $authorsTable;
    }
    
    public function list(){
        $result = $this->jokesTable->findAll();

        $jokes = [];
        foreach($result as $joke){
            $author = $this->authorsTable->findById($joke['authorid']);
            $jokes[] = [
                'id' => $joke['id'],
                'joketext' => $joke['joketext'],
                'jokedate' => $joke['jokedate'],
                'name' => $author['name'],
                'email' => $author['email']
            ];
        }
        $title = "유머 글 목록";
        
        $totaljoke = $this->jokesTable->total();
        return ['template' => 'jokes.html.php', 'title' => $title, 'variables' => ['jokes' => $jokes, 'totaljoke' => $totaljoke]];
    }

    public function home(){
        $title = "인터넷 유머 세상";
        return ['template' => 'home.html.php', 'title' => $title];
    }

    public function delete(){
        $this->jokeTable->delete($_POST['id']);
        header('Location: /joke/list');
        
    }

    public function saveEdit(){
        $joke = $_POST['joke'];
        $joke['jokedate'] = new \DateTime();
        $joke['authorid'] = 1;
        
        $this->jokesTable->save($joke);

        header('location: /joke/list');
    }

    public function edit(){
        if(isset($_GET['id'])){
            $joke = $this->jokesTable->findById($_GET['id']);
        }
        
        $title = '유머 글 수정';

        return ['template' => 'editjoke.html.php', 'title' => $title, 'variables' => ['joke' => $joke ?? null]];
    }

}