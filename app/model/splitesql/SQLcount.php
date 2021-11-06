<?php

namespace app\model\splitesql;


class SQLcount extends SQLselect
{
    /*count all in table*/
    public static function rowCount(string $table){
        return self::SELECT_ALL("$table", self::count);
    }

    /*count 1*/

    public static function count_by_1_row(string $table, string $row1, string $value){
        return SQLselect::SELECT("$row1", "$table", "$row1", "$value", self::count);
    }

    /*count 1 by row limit*/
    public static function count_1_row_limit( $row1, $table, $where_row, $value , $limit){
        return  SQLselect::SELECT_WHERE_LIMIT("$row1", "$table", "$where_row", "$value", $limit,self::count);
    }
}