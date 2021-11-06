<?php

namespace app\controller\routes;

abstract class controller extends attributes
{
    protected array $url;
    protected string $pageInclude;
    protected array $param;

    protected function parseURL(){
        $this->setNamespace($this->getDefaultNamespace());
        if (!empty(url)):
            $this->url = explode('/',rtrim(url, '/'));
        
            $this->setController(strtolower($controller = array_key_exists(0, $this->url) ? $this->url[0] : $this->getDefaultController()));
            $this->setMethod(strtolower($method = array_key_exists(1, $this->url) ? $this->url[1] : $this->getDefaultMethod()));
            $this->setParam($param = array_key_exists(2, $this->url) ? $this->url[2] : '');
            $this->setOptionalUrl($param = array_key_exists(3, $this->url) ? $this->url[3] : '');
        else:
            $this->_default();
        endif;
    }

    public function _default()
    {
        $this->setController($this->getDefaultController());
        $this->setClass($this->getDefaultController());  
        $this->setMethod($this->getDefaultMethod());
    }

}
