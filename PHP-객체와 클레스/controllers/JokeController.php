<?php
class JokeController{
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
        header('Location:jokes.php');
        
    }

    public function edit(){
        if(isset($_POST['joketext'])){
            $joke = $_POST['joke'];
            $joke['jokedate'] = new DateTime();
            $joke['authorid'] = 1;
            
            $this->jokeTable->save($joke);
    
            header('Location: jokes.php');
        } else {
            if(isset($_GET['id'])){
                $joke = $this->jokesTable->findById($_GET['id']);
                $title = '유머 글 수정';
                return ['template' => 'editjoke.html.php', 'title' => $title];
            } else {
                $title = '유머 글 등록';
                return ['template' => 'addjoke.html.php', 'title' => $title];
            }
        }
    }

}