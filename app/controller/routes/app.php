<?php


namespace app\controller\routes;

use app\controller\access\rules;

class app extends controller
{
    public function __construct()
    {

        $this->parseURL();
        if(rules::createSession()):
            $this->setNamespace($this->getDefaultNamespace());
            $this->setFile($this->getDefaultRoute().$this->getController().'.php');

            if(file_exists('./'.$this->getFile())):
                $this->setClass($this->getController());
                if(!empty($this->getMethod())):
                    if(method_exists($this->getClass(), $this->getMethod())):
                        $this->setClass($this->getController());
                        call_user_func_array([$this->getClass(), $this->getMethod()], $this->getParam());
                    else:
                        $this->_default();
                        call_user_func_array([$this->getClass(), $this->getMethod()], $this->getParam());
                    endif;
                else:
                    call_user_func_array([$this->getClass(), $this->getMethod()], $this->getParam());
                endif;
            else:
                $this->_default();
                call_user_func_array([$this->getClass(), $this->getMethod()], $this->getParam());
            endif;    
        endif;
    }
}