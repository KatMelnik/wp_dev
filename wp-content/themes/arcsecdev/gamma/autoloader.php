<?php



final class GammaAutoloader {

    protected $namespaceMap = array();

    public function addNamespace($namespace, $rootDir){

        if (is_dir($rootDir)){
            $this->namespaceMap[$namespace] = $rootDir;
            return true;
        }
        return false;
    }

    public function register(){
        spl_autoload_register(array($this, 'autoload'));
    }

    protected function autoload($class){

        $pathParts = explode('\\', $class);

        if (is_array($pathParts)){

            $namespace = array_shift($pathParts);

            if (!empty($this->namespaceMap[$namespace])) {

                $filePath = $this->namespaceMap[$namespace].'/'.implode('/', $pathParts).'.php';

                if(file_exists($filePath)){

                    require_once $filePath;

                    return true;
                }
                else
                    return false;


            }
        }
        return false;
    }
}

$autoloader = new GammaAutoloader();

// Register Namespace
$autoloader->addNamespace('gamma', INC_PATH);
$autoloader->register();
