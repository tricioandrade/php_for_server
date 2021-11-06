<?php


namespace app\model\splitesql;
use PDO;
use PDOException;

abstract class Connection
{
    /***
     * @param Connection $Proprietie
     */

    protected static $host;
    protected static $user;
    protected static $charset;
    protected static $database;
    protected static $password;
    private static $sql;

    /**@param Setters $database*/
    protected static function setDatabase(string $database){   self::$database = $database;}
    protected static function setHost(string $host){   self::$host = $host;}
    protected static function setUser(string $user){   self::$user = $user;}
    protected static function setPassword(string $password){   self::$password = $password;}
    protected static function setCharset(string $charset){     self::$charset = $charset;}

    /**@return Getters*/
    private static function getDatabase(){ return self::$database;  }
    private static function getHost(){     return self::$host;  }
    private static function getUser(){     return self::$user;  }
    private static function getPassword(){ return self::$password;  }
    private static function getCharset(){  return self::$charset;   }

    /**
     * @return \PDO
     */
    public static function connect(){
        try {
            self::$sql = new \PDO("mysql:host=" . self::getHost() . ";dbname=" .self::getDatabase(). ";charset=".self::getCharset().";", self::getUser(), self::getPassword(), [
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                PDO::ATTR_EMULATE_PREPARES => false
            ]);
            self::$sql->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_OBJ);
            self::$sql->setAttribute(\PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
            self::$sql->setAttribute(\PDO::PARAM_STR_CHAR, 'UTF8');

            return self::$sql;
        }
        catch (PDOException $e){
            echo $e->getMessage();
            die();
        }
    }
}