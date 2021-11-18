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
        header("Content-Type: application/json, charset=utf8");
        switch ($_SERVER['REQUEST_METHOD']):
            case 'POST':
                    $this->setConnection();
                    $json = file_get_contents('php://input'); 
                    var_dump($json);
                    $obj = json_decode($json, JSON_OBJECT_AS_ARRAY);

                    function arrayKey($obj, $param){
                        if(!empty($param) && is_array($obj)):
                            Query::sql_insert("${param}", $obj);
                            if(Query::is_true()) 
                                print_r('true');
                                    exit;
                        endif;
                    }
                    
                    arrayKey($obj[0], $param);
                    var_dump($json);
                break;
        endswitch;
    }

    public function blank()
    {
        header('Content-type: application/json');
        print_r(null);
    }

}