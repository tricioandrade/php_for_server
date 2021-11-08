<?php


namespace app\controller\domain;

use app\controller\layout\view;

class _blank extends view
{
    public function blank()
    {
        $this->view();  
    }
    public function echo()
    {
        echo 'arroz';
    }
}