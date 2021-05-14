<?php

class Router {

    private $routes;

    public function __construct() {
        // Указываем путь к Роутам. Путь к базовой директории
        //  + путь к созданному файлу с роутами
        $routesPath = ROOT.'/config/routes.php';
        // Присваиваем свойству routes массив, хранящийся в файле routes
        $this->routes = include($routesPath);
    }

    private function getURI()
    {
        // Через суперглобальный массив СЕРВЕР
        // возвращаем строку запроса
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
            //trim - удаляет пробелы или другие символы из конца и начала строки
            // echo $uri;
        }

    }

    public function run() 
    {
        // Получаем строку запроса
        $uri = $this->getURI();
        // echo $uri;

        // Проверить наличие такого запроса в routes.php
        foreach ($this->routes as $uriPattern => $path) {
            // echo "<br>$uriPattern -> $path";
        
                //Сравниваем  uriPattern и uri
                //Тильда в регулярном выражении потому что строка запроса содержит "/"
                if (preg_match("~$uriPattern~", $uri)) {
                    // echo '+';
                    // echo $path;
                
                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);
            // Если есть совпадение, определить какой контроллер 
            // и action обрабатывает запрос
            $segments = explode('/', $path);
                //explode - разделяет строку на две части

            //получаем имя контроллера
            $controllerName = array_shift($segments).'Controller';
                //array_shift удаляет первый элемент массива
            $controllerName = ucfirst ($controllerName);
                //ucfirst = UpperCaseFirst - первая буква строки - заглавная
                // echo $controllerName;
                
            
            $actionName = 'action' . ucfirst(array_shift($segments));
            
            $parameters = $segments;
            // echo "<br> Класс: " .$controllerName;
            // echo "<br> Метод: " .$actionName;
                

        // Подключить файл класса контроллера
            $controllerFile = ROOT . '/controllers/' . 
            $controllerName . '.php';

            // echo "<br>$controllerFile";

        if (file_exists($controllerFile)) {
            include_once($controllerFile);
        }


        // Создать объект, вызвать метод (action)
        $controllerObject = new $controllerName;
        //     // используем переменную, которая содержит строку нашего метода
        // $result = $controllerObject->$actionName();

        $result = call_user_func_array(array($controllerObject, $actionName), $parameters);

        if ($result != null) {
            break;
        }


    }
        
    }

}
}