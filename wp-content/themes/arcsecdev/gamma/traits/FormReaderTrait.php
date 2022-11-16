<?php

namespace gamma\traits;


trait FormReaderTrait
{
    private static $METHOD_POST = 'post';

    private static $METHOD_GET = 'get';

    protected $method = 'post';

    protected $data = [];

    public function __get($key)
    {
        if(isset($this->data[$key]))
            return $this->data[$key];

        return null;
    }

    public function __isset($key): bool
    {
        return isset($this->data[$key]);
    }

    public function getData(){
        return $this->data;
    }

    public function setMethod($method){
        if($method != self::$METHOD_GET || $method != self::$METHOD_POST)
            throw new \Exception("FormReader method $method do not exist", 2);

        $this->method = $method;

        return $this;
    }

    public function readData(){

        if($this->method == self::$METHOD_GET)
            $this->readGet();
        elseif ($this->method == self::$METHOD_POST)
            $this->readPost();
    }


    public function readGet(){
        $this->writeData($_GET);
    }

    public function readPost(){
        $this->writeData($_POST);

        if(count($_FILES))
            $this->readFiles();
    }

    public function readFiles(){
        foreach ($_FILES as $key => $file) {
            //Записываем только не пустые файлы
            if($file['size'])
                $this->data[$key] = $file;
        }
    }

    protected function writeData($requestData){
        foreach ($requestData as $key => $value) {
            $this->data[$key] = $value;
        }
    }
}
