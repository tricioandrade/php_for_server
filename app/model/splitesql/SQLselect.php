<?php

namespace app\model\splitesql;


class SQLselect extends consts
{
    protected static $stmt;
    protected static $sql;
    protected static $Return;
    protected static $Table;
    protected static $Value;

    protected static function SplitValues($return){
        try {
            self::$stmt = Connection::connect()->prepare(self::$sql);
            self::$stmt->execute();
            switch($return):
                case self::count: 
                     self::setReturn(self::$stmt->rowCount()); 
                     break;
                case self::fetch:
                     self::setReturn(self::$stmt->fetchAll(\PDO::FETCH_OBJ));;
                    break;
            endswitch;
            return self::getReturn();
        }
        catch (\Throwable $exception) {
             echo $exception->getMessage();
        }
    }

    private static function setReturn($return){
        self::$Return = $return;
    }
    private static function getReturn(){
        return self::$Return;
    }
    #SELECT_ALL_WHERE_LIKE
    public static function SELECT_ALL_WHERE_LIKE(string $TABLE, string $ROW, string $LIKE,  string $return){
        self::$sql = "SELECT * FROM $TABLE WHERE $ROW LIKE '$LIKE%'";
        self::$stmt = Connection::connect()->prepare(self::$sql);
        self::$stmt->execute();

        return self::SplitValues($return);
    }

    #SELECT_ALL_WHERE_AND_LIKE
    public static function SELECT_ALL_WHERE_AND_LIKE(string $TABLE, string $ROW, string $ROW2, string $LIKE, string $EQUAL2,  string $return){
        self::$sql = "SELECT * FROM $TABLE WHERE $ROW AND $ROW2 = '$EQUAL2' LIKE '$LIKE%'";
        self::$stmt = Connection::connect()->prepare(self::$sql);
        self::$stmt->execute();

        return self::SplitValues($return);
    }

    #SELECT_ALL_WHERE_AND_1
    public static function SELECT_ALL_WHERE_AND_1( string $TABLE, string $ROW,
                                                   string $EQUAL, string $ROW2, string $EQUAL2,  string $return){
        self::$sql = "SELECT * FROM $TABLE WHERE $ROW = '$EQUAL' AND $ROW2 = '$EQUAL2'";
        self::$stmt = Connection::connect()->prepare(self::$sql);
        self::$stmt->execute();

        return self::SplitValues($return);
    }

    #SELECT_ALL_WHERE_AND_2
    public static function SELECT_ALL_WHERE_AND_2( string $TABLE, string $ROW,
                                                   string $EQUAL, string $ROW2, string $EQUAL2,  string $ROW3, string $EQUAL3,  string $return){
        self::$sql = "SELECT * FROM $TABLE WHERE $ROW = '$EQUAL' AND $ROW2 = '$EQUAL2' AND $ROW3 = '$EQUAL3'";
        self::$stmt = Connection::connect()->prepare(self::$sql);
        self::$stmt->execute();

        return self::SplitValues($return);
    }

    public static function SELECT_1_ROW(string $ROW, string $TABLE, string $return){
        self::$sql = "SELECT $ROW FROM $TABLE";
        self::$stmt = Connection::connect()->prepare(self::$sql);
        self::$stmt->execute();

        return self::SplitValues($return);
    }

    public static function SELECT_ALL_WHERE(string $FROM, string $WHERE, string $EQUAL, string $return){
        self::$sql = "SELECT * FROM $FROM WHERE $WHERE = '$EQUAL'";
        self::$stmt = Connection::connect()->prepare(self::$sql);
        self::$stmt->execute();

        return self::SplitValues($return);
    }

    public static function SELECT_ALL_WHERE_LIMIT(string $FROM, string $WHERE, string $EQUAL, string $limit, string $return){
        self::$sql = "SELECT * FROM $FROM WHERE $WHERE = '$EQUAL' LIMIT $limit";


        return self::SplitValues($return);
    }


    public static function SELECT_WHERE_LIMIT(string $ref, string $FROM, string $WHERE, string $EQUAL, string $limit, string $return){
        self::$sql = "SELECT $ref FROM $FROM WHERE $WHERE = '$EQUAL' LIMIT $limit";
        self::$stmt = Connection::connect()->prepare(self::$sql);
        self::$stmt->execute();

        return self::SplitValues($return);
    }

    public static function SELECT_3_WHERE(string $ref1, string $ref2, string $ref3, string $FROM, string $WHERE, string $EQUAL, string $return){
        self::$sql = "SELECT $ref1, $ref2, $ref3 FROM $FROM WHERE $WHERE = '$EQUAL'";
        self::$stmt = Connection::connect()->prepare(self::$sql);
        self::$stmt->execute();

        return self::SplitValues($return);
    }

    public static function SELECT_2_WHERE(string $ref1, string $ref2, string $FROM, string $WHERE, string $EQUAL1, string $AND, string $EQUAL2, string $return){
        self::$sql = "SELECT $ref1, $ref2 FROM $FROM WHERE $WHERE = '$EQUAL1' AND $AND = '$EQUAL2'";
        self::$stmt = Connection::connect()->prepare(self::$sql);

        return self::SplitValues($return);
    }

    public static function SELECT_ALL_WHERE_2(string $table, string $WHERE, string $EQUAL1, string $AND, string $EQUAL2, string $return){
        self::$sql = "SELECT * FROM $table WHERE $WHERE = '$EQUAL1' AND $AND = '$EQUAL2'";
        self::$stmt = Connection::connect()->prepare(self::$sql);

        self::$stmt->execute();

        return self::SplitValues($return);
    }

    public static function SELECT_1_WHERE_2(string $ref1, string $FROM, string $WHERE, string $EQUAL1, string $AND, string $EQUAL2, string $return){
        self::$sql = "SELECT $ref1 FROM $FROM WHERE $WHERE = '$EQUAL1' AND $AND = '$EQUAL2'";
        self::$stmt = Connection::connect()->prepare(self::$sql);

        return self::SplitValues($return);
    }

    public static function SELECT_ALL(string $FROM, string $return){
        self::$sql = "SELECT * FROM $FROM";
        self::$stmt = Connection::connect()->prepare(self::$sql);

        return self::SplitValues($return);
    }

    public static function SELECT_ALL_ORDER_DESC(string $table, string $row, string $return){
        self::$sql = "SELECT * FROM $table ORDER BY $row DESC";
        self::$stmt = Connection::connect()->prepare(self::$sql);

        return self::SplitValues($return);
    }


    public static function SELECT_ALL_ORDER_DESC_LIMIT(string $table, string $row, string $limit, string $return){
        self::$sql = "SELECT * FROM $table ORDER BY $row DESC LIMIT $limit";
        self::$stmt = Connection::connect()->prepare(self::$sql);

        return self::SplitValues($return);
    }

    public static function SELECT_ALL_ORDER_ASC(string $table, string $row, string $return){
        self::$sql = "SELECT * FROM $table ORDER BY $row ASC";
        self::$stmt = Connection::connect()->prepare(self::$sql);

        return self::SplitValues($return);
    }

    public static function SELECT_ALL_ORDER_ASC_WHERE(string $table, $row_ref, string $equal, string $order_row, string $return){
        self::$sql = "SELECT * FROM $table WHERE $row_ref = '$equal' ORDER BY $order_row ASC";
        self::$stmt = Connection::connect()->prepare(self::$sql);

        return self::SplitValues($return);
    }

    public static function SELECT_ALL_ORDER_DESC_WHERE(string $table, string $ref, string $ref1, string $row, string $return){
        self::$sql = "SELECT * FROM {$table} WHERE {$ref} = {$ref1} ORDER BY {$row} DESC";
        self::$stmt = Connection::connect()->prepare(self::$sql);

        return self::SplitValues($return);
    }

    public static function SELECT_ALL_ORDER_DESC_WHERE_LIMIT(string $table, string $WHERE, string $Equal, string $row, string $limit, string $return){
        self::$sql = "SELECT * FROM $table WHERE $WHERE = $Equal ORDER BY $row DESC LIMIT $limit";
        self::$stmt = Connection::connect()->prepare(self::$sql);

        return self::SplitValues($return);
    }
    public static function SELECT(string $ref, string $FROM, string $WHERE, string $EQUAL, string $return){
        self::$sql = "SELECT $ref FROM $FROM WHERE $WHERE = '$EQUAL'";
        self::$stmt = Connection::connect()->prepare(self::$sql);
        return self::SplitValues($return);
    }

}