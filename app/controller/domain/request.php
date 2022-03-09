<?php


namespace app\controller\domain;


use app\controller\access\authentication;
use app\model\splitesql\Query;
use app\model\splitesql\SGBD;

class request extends authentication
{
    public function setConnection(): void
    {      
        new SGBD(host, user, charset, database, password);
    }

    public function jsdata($param = '')
    {
        function arrayKey($obj, $param){
            if(!empty($param) && is_array($obj)):
                Query::sql_insert("${param}", $obj);
                if(Query::is_true())
                    print_r('true');
                exit;
            endif;
        }

        header("Content-Type: application/json, charset=utf8");

        switch ($_SERVER['REQUEST_METHOD']):
            case 'POST':
                    $this->setConnection();
                    $json = file_get_contents('php://input');
                    if(!empty($json)):
                        $obj = json_decode($json);
                        arrayKey($obj, $param);
                    endif;

                echo(json_encode($json));
                break;
            case 'GET':

                break;
        endswitch;
    }

    public function blank()
    {
        header('Content-type: application/json');
        print_r(null);
    }

}