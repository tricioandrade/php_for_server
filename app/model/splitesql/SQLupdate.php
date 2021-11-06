<?php


namespace app\model\splitesql;


class SQLupdate
{
    protected static $stmt;
    protected static $sql;
    protected static $SQL;
    protected static $Row;
    protected static $Table;
    protected static $Value;

    /*update 1*/
    public static function UPDATE_SET_1(string $table, string $row,string $update_value_1, string $row_where_reference, string $reference_value){
        self::$sql = "UPDATE $table SET $row = ? WHERE $row_where_reference = ?";
        self::$stmt = Connection::connect()->prepare(self::$sql);
        self::$stmt->bindParam(1, $update_value_1);
        self::$stmt->bindParam(2, $reference_value);

        self::$stmt->execute();
    }

    /*update 2*/
    public static function UPDATE_SET_2(string $table, string $row1, string $update_value_1 , string $row2,string $update_value_2, string $row_where_reference, string $reference_value){
        self::$sql = "UPDATE $table SET $row1 = ?, $row2 = ? WHERE $row_where_reference = ?";
        self::$stmt = Connection::connect()->prepare(self::$sql);
        self::$stmt->bindParam(1, $update_value_1);
        self::$stmt->bindParam(2, $update_value_2);
        self::$stmt->bindParam(3, $reference_value);

        self::$stmt->execute();
    }

    /*update 5*/
    public static function UPDATE_SET_5(string $table, string $row1, string $update_value_1 , string $row2, string $update_value_2 , string $row3, string $update_value_3, string $row4, string $update_value_4 , string $row5, string $update_value_5 , string $row_where_reference, string $reference_value){
        self::$sql = "UPDATE $table SET $row1 = ?, $row2 = ?, $row3 = ?, $row4 = ?, $row5 = ? WHERE $row_where_reference = ?";
        self::$stmt = Connection::connect()->prepare(self::$sql);
        self::$stmt->bindParam(1, $update_value_1);
        self::$stmt->bindParam(2, $update_value_2);
        self::$stmt->bindParam(3, $update_value_3);
        self::$stmt->bindParam(4, $update_value_4);
        self::$stmt->bindParam(5, $update_value_5);
        self::$stmt->bindParam(6, $reference_value);

        self::$stmt->execute();
    }
}