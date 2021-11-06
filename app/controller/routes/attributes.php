<?php

namespace app\controller\routes;
 

use app\controller\modules\invoice;

abstract class attributes
{
    private object $class;
    private string $controller;
    private  $method;
    private  $param = [];
    private  $optionalUrl = [];
    private  $file;

    private string $namespace;
    private string $defaultNamespace = "app\\controller\\domain\\";
    private string $defaultRoute = "app/controller/domain/";
    private string $defaultController = "login";
    const defaultController = "login";
    const default = array(
        
    );
    private string $defaultClass  = "app\\controller\\domain\\".self::defaultController;
    private string $defaultMethod = "blank";
    
    protected function setClass(string $className){
        $class = $this->getNamespace().$className; 
        $this->class = new $class;
    }
    protected function setNamespace(string $namespace){    
        $this->namespace = $namespace;
    }
    protected function setFile(string $file){
        $this->file = $file;
    }


    protected function getFile(){                      return $this->file;}

    protected function getClass(): object{             return $this->class;}
    protected function getNamespace(): string{         return $this->namespace;}

    protected function getDefaultRoute():string{       return $this->defaultRoute;}
    protected function getDefaultClass(): object{      $this->setClass($this->defaultClass); return $this->getClass();}
    protected function getDefaultController(): string{ return $this->defaultController;}
    protected function getDefaultMethod():string{      return $this->defaultMethod;}
    protected function getDefaultNamespace(): string{  return $this->defaultNamespace;}

    protected function setController($controller): void{$this->controller = $controller;}
    protected function setMethod($method): void{        $this->method = $method;}
    protected function setParam($param): void{          $this->param[] = $param;}
    protected function setOptionalUrl($optionalUrl): void{          $this->optionalUrl = $optionalUrl;}
    
    protected function getController(){ return $this->controller;}
    protected function getMethod(){     return $this->method;}
    protected function getParam(){      return $this->param;}
    protected function getOptionalUrl(){      return $this->optionalUrl;}
}