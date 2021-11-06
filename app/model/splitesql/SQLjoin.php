<?php

namespace app\model\splitesql;

class SQLjoin extends SQLselect
{
    #Inner Join
    public static function JOIN_TABLES_2(string $table1, string $row1, string $table2, string $row2, string $row3, string $row4, string $return){
        self::$sql = "SELECT {$table1}.{$row1}, {$table2}.{$row2} FROM {$table1} JOIN {$table2} ON {$table2}.{$row3} =  {$table1}.{$row4}";
 
        self::$stmt = Connection::connect()->prepare(self::$sql);
        self::$stmt->execute();

        self::SplitValues($return);
    }
    public static function JOIN_TABLES_3(string $table1, string $row1, string $table2, string $row2, string $table3, string $row3, string $rowref1, string $rowref2, string $return){
        self::$sql = "SELECT $table1.$row1, $table2.$row2, $table3.$row3 FROM $table1 JOIN $table2 ON $table2.$rowref1 =  $table1.$rowref2";
        self::$stmt = Connection::connect()->prepare(self::$sql);
        self::$stmt->execute();
        var_dump($return);
        self::SplitValues($return);
    }
    public static function INNER_JOIN_1_WHERE(string $table1, string $row1, string $table2, string $row2, string $row3, string $row4, $WHERE, string $return){
        self::$sql = "SELECT $table1.$row1, $table2.$row2 FROM $table1 INNER JOIN $table2 ON $table2.$row3 =  $table1.$row4 WHERE $table1.$row1 = $WHERE";
        self::$stmt = Connection::connect()->prepare(self::$sql);
        self::$stmt->execute();

        self::SplitValues($return);
    }
    public static function INNER_JOIN_1_WHERE_Like(string $table1, string $row1, string $table2, string $row2, string $row3, string $row4, $ref, string $return){
        self::$sql = "SELECT $table1.$row1, $table2.$row2 FROM $table1 INNER JOIN $table2 ON $table2.$row3 =  $table1.$row4 WHERE $table1.$row1 LIKE '$ref%'\"";
        self::$stmt = Connection::connect()->prepare(self::$sql);
        self::$stmt->execute();

        self::SplitValues($return);
    }
}