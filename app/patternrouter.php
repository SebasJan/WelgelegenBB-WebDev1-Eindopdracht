<?php
class PatternRouter
{
    private function stripParameters($uri)
    {
        # remove parameters from uri
        if (str_contains($uri, '?')) {
            $uri = substr($uri, 0, strpos($uri, '?'));
        }
        return $uri;
    }

    public function route($uri)
    {
        # check if uri is an api call
        $api = false;
        if (str_starts_with($uri, 'api/')) {
            $uri = substr($uri, 4);
            $api = true;
        }

        # if there is no uri, set it to home/index
        $deaultcontroller = 'homecontroller';
        $defaultmethod = 'index';

        $uri = $this->stripParameters($uri);

        # get controllers/methods from the URI
        $explodedUri = explode('/', $uri);

        # set the default controller and method if the exploided uri is empty
        if (!isset($explodedUri[0]) || empty($explodedUri[0])) {
            $explodedUri[0] = $deaultcontroller;
        }
        $controllerName = $explodedUri[0] . "controller";

        if (!isset($explodedUri[1]) || empty($explodedUri[1])) {
            $explodedUri[1] = $defaultmethod;
        }
        $methodName = $explodedUri[1];

        // get the right file path for the controller
        //$filename = __DIR__ . '/controllers/' . $controllerName . '.php';
        $filename = __DIR__ . "/controllers/$controllerName.php";

        if ($api) {
            //$filename = __DIR__ . '/api/controllers/' . $controllerName . '.php';
            $filename = __DIR__ . "/api/controllers/$controllerName.php";
        }
        if (file_exists($filename)) {
            require $filename;
        } else {
            http_response_code(404);
            die();
        }

        // call the controller method
        try {
            $controllerObj = new $controllerName;
            $controllerObj->{$methodName}();
        } catch (Exception $e) {
            http_response_code(404);
            die();
        }
    }
}