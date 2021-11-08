<?php


namespace app\model\splitesql;



class Inspection extends SGBD
{   /*count 1*/
    public static function sql_count_by_1_row($table, $row1, $value){
        return SQLselect::SELECT("$row1", "$table", "$row1", "$value", consts::count);
    }

    /*count 1 by row limit*/
     public static function sql_count_by_1_row_limit( $row1, $table, $where_row, $value , $limit){
        return  SQLselect::SELECT_WHERE_LIMIT("$row1", "$table", "$where_row", "$value", $limit,consts::count);
     }

    #Empty and Null Variables Verifying
    public static function is_not_empty(array $variaveis):  bool{
        for ($i = 0; $i < count($variaveis); $i++):
            if (in_array( '', $variaveis) || empty($variaveis[$i]) || $variaveis[$i] == null):
                return false;
            else:
                return true;
            endif;
        endfor;
    }

}