<?php
use app\core\Registry;

class Autoload{
    private $rootDir;
    function __construct($rootDir){
        $this->rootDir = $rootDir;
        spl_autoload_register([$this, 'autoload']);
        $this->autoloadFile();
    }
    private function autoload($class){
        // $root = Registry::getInstance()->rootDir['rootPath'];
        // // $root = $this->rootDir;
        // $rootPath = dirname($root);
        $tmp = explode('/', $class);
        // $className = end($tmp);
        
        // $pathName = str_replace($className, '', $class);

        // $filePath = $rootPath.'\\'.$pathName.$className.'.php';
        
        $fileName = end($tmp);
        $filePath = $this->rootDir.'/'.strtolower(str_replace($fileName,'',$class)).$fileName.'.php';

        // kiểm tra có file hay ko
        if(file_exists($filePath)){
            require_once($filePath);
        }else{
            echo 'no'.'<br/>';
        }
    }

    private function autoloadFile(){
        foreach($this->defaultFileLoad() as $file){
            require_once($this->rootDir.'/'.$file);
        }
    }

    private function defaultFileLoad(){
        return [
            'app/core/Router.php',
            'app/routers.php',
            'app/controllers/PHPMailer/src/Exception.php',
            'app/controllers/PHPMailer/src/PHPMailer.php',
            'app/controllers/PHPMailer/src/SMTP.php',
        ];
    }
}
?>