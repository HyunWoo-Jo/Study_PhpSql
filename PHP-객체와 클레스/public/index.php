    <?php 
        function loadTemplates($templateFileName, $variables = []){
            extract($variables);
            ob_start();
            include __DIR__ . '/../templates/'. $templateFileName;
            return ob_get_clean();
        }

        try{
            include __DIR__ . '/../includes/DatabaseConnection.php';
            include __DIR__ . '/../classes/DatabaseTable.php';
            include __DIR__ . '/../controllers/JokeController.php';

            $jokesTable = new DatabaseTable($pdo, 'joke', 'id');
            $authorsTable = new DatabaseTable($pdo, 'author', 'id');

            $jokeController = new JokeController($jokesTable, $authorsTable);

            $action = $_GET['action'] ?? 'home';
            $page = $jokeController->$action();
            $title = $page['title'];
            
            if(isset($page['variables'])){
                $output = loadTemplates($page['template'], $page['variables']);
            } else {
                $output = loadTemplates($page['template']);
            }

        } catch(PDOException $e){
            $title = '오류 발생';
            $output = $e->getMessage();
        }
        include __DIR__ . '/../templates/layout.html.php';
    ?>
