<?php

/***
 * @author Patricio Bento Andrade
 * @copyright tricioandrde - Patrício Andrade All Rights Reserved
 * @license  Propriety
 * @since 2020
 * @class Query
 */

namespace app\model\splitesql;

class  Query extends SGBD
{

    const fetch = 'fetch';
    const count = 'count';
    const create = 'CREATE';
    const update = 'UPDATE';
    const delete = 'DELETE';
    const select = 'SELECT';
    const insert = 'insert';
    const where = 'WHERE';
    const set = 'SET';
    const limit = 'LIMIT';
    const equal = '=';

    private static $sql;
    private static $stmt;

    private static $rows;
    private static $values;
    private static $table;
    
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
     * @return bool
     */
    public static function is_true(){
        return self::$check_query_result;
    }

    /**
     * @param bool $state
     */
    private static function setQueryResult(bool $state){
        self::$check_query_result = $state;
    }

    private static $check_query_result = false;

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

    public static function sql_insert(string $table, $param){
        self::setRows($param); self::setValues($param);
        self::$sql = self::insert." into {$table} (".self::getRows().") values (".self::getValues().")";

        self::$stmt = Connection::connect()->prepare(self::$sql);
        if (self::$stmt->execute()):
            self::setQueryResult(true);
        endif;
    }

  
    /**
     * @Model static function
     * @param string $ddl
     * @param array $rows
     * @param array $values
     * @param string|null $table
     * @param string|null $return
     * @return array|bool|int
     */

    public static function sql_query(string $SQL, string $return = null){
        self::$sql = $SQL;
        self::$stmt = Connection::connect()->prepare(self::$sql);
        if (self::$stmt->execute()):
            if (false !== stripos($SQL, self::create)) self::setQueryResult(true);
            if (false !== stripos($SQL, self::update)) self::setQueryResult(true);
            if (false !== stripos($SQL, self::delete)) self::setQueryResult(true);
            if (false !== stripos($SQL, self::select)):
                if ($return == self::fetch || $return == null):
                    self::setQueryResult(true);
                    return self::$stmt->fetchAll(\PDO::FETCH_OBJ);
                elseif ($return == self::count):
                    self::setQueryResult(true);
                    return self::$stmt->rowCount();
                endif;
            endif;
        else:
            self::setQueryResult(false);    
        endif;
    }
}