<?php


namespace app\model\splitesql;


class SQLdrop
{
    protected static $stmt;
    protected static $sql;
    protected static $SQL;
    protected static $Row;
    protected static $Table;
    protected static $Value;

    public static function setRow($row){self::$Row = $row;}
    public static function setTable($table){self::$Table = $table;}
    public static function setValue($value){self::$Value = $value;}

    public static function getRow(){    return self::$Row;}
    public static function getTable(){  return self::$Table;}
    public static function getValue(){  return self::$Value;}


    //DeleteWhere
    public static function DeleteWhere(){
            self::$SQL = "DELETE FROM `".self::getTable()."` WHERE `".self::getRow()."` = '".self::getValue()."'";
            self::$SQL = Connection::connect()->prepare(self::$SQL);
            self::$SQL->execute();
    }
}