<?php


namespace app\controller\domain;


class send
{
    public string $obj;

    public function __construct($obj){
        $this->setObj($obj);
    }

    public function check(){

    }

    public function getObj(): string {
        return $this->obj;
    }

    public function setObj(string $obj): void {
        $this->obj = $obj;
    }
}