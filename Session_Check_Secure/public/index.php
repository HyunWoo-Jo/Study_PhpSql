    <?php 
        try{
            include __DIR__ . '/../includes/autoload.php';

            $route = ltrim(strtok($_SERVER['REQUEST_URI'], '?'), '/');
            $entryPoint = new \Hanbit\EntryPoint($route, $_SERVER['REQUEST_METHOD'] ,new \Ijdb\IjdbRoutes);
            $entryPoint->run();
        } catch(PDOException $e){
            $title = '오류 발생';
            $output = $e->getMessage();
            include __DIR__ . '/../templates/layout.html.php';
        }
 ?>

