<?php

/***
 * @author Patricio Bento Andrade
 * @copyright tricioandrde - Patrício Andrade All Rights Reserved
 * @license  Propriety
 * @since 2020
 * @class Query
 */

namespace app\model\splitesql;

class  Query extends SGBD implements consts
{

    private static $sql;
    private static $stmt;

    private static $rows;
    private static $values;
    
    private static $check_query_result = false;
    
    /**
     * @return bool
     */
    public static function is_true(){
        return self::$check_query_result;
    }


    /**
     * @return mixed
     */
    private static function getRows(){
        return self::$rows;
    }

    /**
     * @return mixed
     */
    private static function getValues(){
        return self::$values;
    }

    /**
     * @param array $rows
     */
    private static function setRows( $rows): void {
        if (is_object($rows)) $rows = get_object_vars($rows);
        self::$rows = str_replace(['[',']', '{','}', '"' ,'"'],  '', self::encode_json(array_keys($rows)));
    }

    /**
     * @param array $values
     */
    private static function setValues( $values): void {
        if (is_object($values)) $values = get_object_vars($values);
        self::$values = str_replace('"', '\'' , str_replace(['[',']', '{','}'],  '', self::encode_json(array_values($values))));
    }
    
    /**
     * @param bool $state
     */
    private static function setQueryResult(bool $state){
        self::$check_query_result = $state;
    }

    /*
     * @encode array to Json
     * @return json array
     */
    private static function encode_json(array $array){
        $array = str_replace('\\',' ',json_encode($array, JSON_UNESCAPED_UNICODE));
        $array = str_replace('  ', '/', $array);
        $array = str_replace(' /', '/', $array);
        return $array;
    }


    public static function sql_insert(string $table, $param){
        self::setRows($param); self::setValues($param);
        self::$sql = consts::insert." into {$table} (".self::getRows().") values (".self::getValues().")";

        self::$stmt = Connection::connect()->prepare(self::$sql);
        if (self::$stmt->execute()):
            self::setQueryResult(true);
        endif;
    }

  
    /**
     * @Model static function
     * @param string $SQL
     * @param string|null $return
     * @return array|bool|int|null
     */

    public static function sql_query(string $SQL, string $return = null){
        self::$sql = $SQL;
        self::$stmt = Connection::connect()->prepare(self::$sql);
        if (self::$stmt->execute()):
            if (false !== stripos($SQL, consts::create)) self::setQueryResult(true);
            if (false !== stripos($SQL, consts::update)) self::setQueryResult(true);
            if (false !== stripos($SQL, consts::delete)) self::setQueryResult(true);
            if (false !== stripos($SQL, consts::select)):
                if ($return == consts::fetch || $return == null):
                    self::setQueryResult(true);
                    return self::$stmt->fetchAll(\PDO::FETCH_OBJ);
                elseif ($return == consts::count):
                    self::setQueryResult(true);
                    return self::$stmt->rowCount();
                endif;
            endif;
        else:
            self::setQueryResult(false);    
        endif;
    }
}