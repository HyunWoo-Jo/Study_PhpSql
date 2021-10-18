<?php
namespace Hanbit;
class EntryPoint {
    private $route;
    private $routes;
    private $method;

    public function __construct($route, $method , $routes) {
        $this->route = $route;
        $this->method = $method;
        $this->routes = $routes;
        $this->checkUrl();
    }

    private function checkUrl(){
        if($this->route !== strtolower($this->route)){
            http_response_code(301);
            header('Location: '. strtolower($this->route));
        }
    }

    private function loadTemplates($templateFileName, $variables = []){
        extract($variables);
        ob_start();
        include __DIR__ . '/../../templates/'. $templateFileName;
        return ob_get_clean();
    }
    public function run(){  
        $routes = $this->routes->getRoutes();

        $authentication = $this->routes->getAuthentication();

		if (isset($routes[$this->route]['login']) && isset($routes[$this->route]['login']) && !$authentication->isLoggedIn()) {
			header('location: /login/error');
		}
		else {
			$controller = $routes[$this->route][$this->method]['controller'];
			$action = $routes[$this->route][$this->method]['action'];
            echo $action;
			$page = $controller->$action();

			$title = $page['title'];

			if (isset($page['variables'])) {
				$output = $this->loadTemplates($page['template'], $page['variables']);
			}
			else {
				$output = $this->loadTemplates($page['template']);
			}

			include  __DIR__ . '/../../templates/layout.html.php';

		}
    }
}