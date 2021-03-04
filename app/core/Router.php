<?php

// namespace App\Core;
use app\core\Registry;
class Router{

    private static $routers = [];
    private $basePath;
    function __construct($basePath)
    {
        $this->basePath = $basePath;
    }

    private function getRequestURL()
    {
        // Registry::getInstance()->config = $this->basePath;
        // $basePath = Registry::getInstance()->config['basePath'];
        $url = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '/' ;
        $url = str_replace($this->basePath, '', $url);
        $url = $url === '' || empty($url) ? '/' : $url;
        return $url;
        // echo '<pre>';
        // print_r($_SERVER);
    }

    private function getRequestMethod()
    {
        $method = isset($_SERVER['REQUEST_METHOD']) ? $_SERVER['REQUEST_METHOD'] : 'GET' ;
        return $method;
    }

    private static function addRouter($method,$url, $action){
        self::$routers[] = [$method, $url, $action];
    } 

    public static function get($url, $action)
    {
        self::addRouter('GET',$url, $action);
    }

    public static function post($url, $action)
    {
        self::addRouter('POST',$url, $action);
    }

    public static function any($url, $action)
    {
        self::addRouter('GET|POST',$url, $action);
    }

    public function map(){

        // biến kiểm tra ROUTE
        $checkRoute = FALSE;
        // Biến 
        $params = [];

        $requestURL = $this->getRequestURL();
        $requestMethod = $this->getRequestMethod();
        $routers = self::$routers;

        foreach($routers as $route){
            list($method,$url,$action) = $route;

            // kiểm tra phương thức của method của APP có trùng với phương thức method của Router hay không? 
            if(strpos($method,$requestMethod) === FALSE){
                continue;
            }

            // khi đường dẫn không tồn tại
            if($url === '*')
            {

                $checkRoute = TRUE;

            }
            // kiểm tra nó ID ở phía sau không
            elseif(strpos($url,'{',  ) === FALSE){
                // kiểm tra URL tồn tại 
                if(strcmp(strtolower($url),strtolower($requestURL)) === 0)
                {
                    // kiểm tra hành động có phải là 1 funtion hay không?
                    $checkRoute = true;
                }else{
                    continue;
                }
            }elseif(strpos($url,'}',  ) === FALSE){
                continue;
            }else{
                // phân tách các giá trị trong URL
                $routeParams = explode('/',$url);
                $requestParams = explode('/',$requestURL);

                if(count($routeParams) !== count($requestParams) ){
                    continue;
                }
                
                foreach($routeParams as $k => $rp)
                {
                    if(preg_match('/^{\w+}$/',$rp)){
                        $params[] = $requestParams[$k];
                    }
                }
                $checkRoute = TRUE;
            }


            // kiểm tra đường dẫn có tồn tại hay không 
            if($checkRoute === TRUE)
            {
                // kiểm tra action 
                if(is_callable($action)){
                    
                    call_user_func_array($action,$params);
                    
                }elseif(is_string($action)){
                    $this->compieRoute($action,$params);
                }
                return;
            }else{
                continue;
            }
        }
        return;
    }

    private function compieRoute($action, $params)
    {
        if(count(explode('@', $action)) !== 2){
            die('Router error');
        }

        $className = explode('@', $action)[0];
        $methodName = explode('@', $action)[1];
        $classNameSpace = 'app\\controllers\\'.$className;

        if(class_exists($classNameSpace)){
            Registry::getInstance()->controller = $className;
            $object = new $classNameSpace;
            if(method_exists($classNameSpace,$methodName)){
                Registry::getInstance()->action = $methodName;
                call_user_func_array([$object,$methodName], $params);
               
            }else{
                die('Method "'.$methodName.'" not found');
            }

        }else{
            die('Class "'.$classNameSpace.'" not found');
        }
       
    }
    function run()
    {
        $this->map();
    }
}

?>