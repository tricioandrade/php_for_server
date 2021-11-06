<?php


namespace app\model\splitesql;


class SQLinsert
{
    protected static $stmt;
    protected static $sql;
    protected static $SQL;
    protected static $Row;
    protected static $Table;
    protected static $Value;

    public static function sql_execute($table){
        self::$stmt->execute();
    }

    //1
    public static function INSERT_IN_1(string $table, string $row, string $value){
        self::$sql = "INSERT INTO $table ($row) VALUE (?)";
        self::$stmt = Connection::connect()->prepare(self::$sql);
        self::$stmt->bindParam(1, $value);
        self::$stmt->execute();
    }
    //2
    public static function INSERT_IN_2(string $table, string $r1, string $r2, string $value1, string $value2){
        self::$sql = "INSERT INTO $table ($r1, $r2) VALUES (?, ?)";
        self::$stmt = Connection::connect()->prepare(self::$sql);
        self::$stmt->bindParam(1, $value1);
        self::$stmt->bindParam(2, $value2);
        self::$stmt->execute();
    }
    //3
    public static function INSERT_IN_3(string $table, string $r1, string $r2, string $r3, string $value1, string $value2, string $value3){
        self::$sql = "INSERT INTO $table ($r1, $r2, $r3) VALUES (?, ?, ?)";
        self::$stmt = Connection::connect()->prepare(self::$sql);
        self::$stmt->bindParam(1, $value1);
        self::$stmt->bindParam(2, $value2);
        self::$stmt->bindParam(3, $value3);
        self::$stmt->execute();
    }
    //4
    public static function INSERT_IN_4(string $table, string $r1, string $r2, string $r3, string $r4, string $value1, string $value2, string $value3, string $value4){
        self::$sql = "INSERT INTO $table ($r1, $r2, $r3, $r4) VALUES (?, ?, ?,?)";
        self::$stmt = Connection::connect()->prepare(self::$sql);
        self::$stmt->bindParam(1, $value1);
        self::$stmt->bindParam(2, $value2);
        self::$stmt->bindParam(3, $value3);
        self::$stmt->bindParam(4, $value4);
        self::$stmt->execute();
    }
    //5
    public static function INSERT_IN_5(string $table, string $r1, string $r2, string $r3, string $r4, string $r5, string $value1, string $value2, string $value3, string $value4, string $value5){
        self::$sql = "INSERT INTO $table ($r1, $r2, $r3, $r4, $r5) VALUES (?, ?, ?, ?, ?)";
        self::$stmt = Connection::connect()->prepare(self::$sql);
        self::$stmt->bindParam(1, $value1);
        self::$stmt->bindParam(2, $value2);
        self::$stmt->bindParam(3, $value3);
        self::$stmt->bindParam(4, $value4);
        self::$stmt->bindParam(5, $value5);
        self::$stmt->execute();
    }
    //6
    public static function INSERT_IN_6(string $table, string $r1, string $r2, string $r3, string $r4, string $r5, string $r6, string $value1, string $value2, string $value3, string $value4, string $value5, string $value6){
        self::$sql = "INSERT INTO $table ($r1, $r2, $r3, $r4, $r5, $r6) VALUES (?, ?, ?, ?, ?, ?)";
        self::$stmt = Connection::connect()->prepare(self::$sql);
        self::$stmt->bindParam(1, $value1);
        self::$stmt->bindParam(2, $value2);
        self::$stmt->bindParam(3, $value3);
        self::$stmt->bindParam(4, $value4);
        self::$stmt->bindParam(5, $value5);
        self::$stmt->bindParam(6, $value6);
        self::$stmt->execute();
    }
    //7
    public static function INSERT_IN_7(string $table,string $r1,string $r2,string $r3,string $r4,string $r5,string $r6,string $r7,string $value1,string $value2,string $value3,string $value4,string $value5,string $value6,string $value7){
        self::$sql = "INSERT INTO $table ($r1, $r2, $r3, $r4, $r5, $r6, $r7) VALUES (?, ?, ?, ?, ?, ?, ?)";
        self::$stmt = Connection::connect()->prepare(self::$sql);
        self::$stmt->bindParam(1, $value1);
        self::$stmt->bindParam(2, $value2);
        self::$stmt->bindParam(3, $value3);
        self::$stmt->bindParam(4, $value4);
        self::$stmt->bindParam(5, $value5);
        self::$stmt->bindParam(6, $value6);
        self::$stmt->bindParam(7, $value7);
        self::$stmt->execute();
    }
    //8
    public static function INSERT_IN_8(string $table, string $r1, string $r2, string $r3, string $r4, string $r5, string $r6, string $r7, string $r8, string $value1, string $value2, string $value3, string $value4, string $value5, string $value6, string $value7, string $value8){
        self::$sql = "INSERT INTO $table ($r1, $r2, $r3, $r4, $r5, $r6, $r7, $r8) VALUES ('$value1', '$value2', '$value3', '$value4', '$value5', '$value6', '$value7', '$value8')";
        self::$stmt = Connection::connect()->prepare(self::$sql);
        /*self::$stmt->bindParam(1, $value1);
        self::$stmt->bindParam(2, $value2);
        self::$stmt->bindParam(3, $value3);
        self::$stmt->bindParam(4, $value4);
        self::$stmt->bindParam(5, $value5);
        self::$stmt->bindParam(6, $value6);
        self::$stmt->bindParam(7, $value7);
        self::$stmt->bindParam(8, $value8);*/
        self::$stmt->execute();
    }
    //9
    public static function INSERT_IN_9(string $table, string $r1, string $r2, string $r3, string $r4, string $r5, string $r6, string $r7, string $r8, string $r9, string $value1, string $value2, string $value3, string $value4, string $value5, string $value6, string $value7, string $value8, string $value9){
        self::$sql = "INSERT INTO $table ($r1, $r2, $r3, $r4, $r5, $r6, $r7, $r8, $r9) VALUES ( ?, ?, ?, ?, ?, ?, ?,?, ?)";
        self::$stmt = Connection::connect()->prepare(self::$sql);
        self::$stmt->bindParam(1, $value1);
        self::$stmt->bindParam(2, $value2);
        self::$stmt->bindParam(3, $value3);
        self::$stmt->bindParam(4, $value4);
        self::$stmt->bindParam(5, $value5);
        self::$stmt->bindParam(6, $value6);
        self::$stmt->bindParam(7, $value7);
        self::$stmt->bindParam(8, $value8);
        self::$stmt->bindParam(9, $value9);
        self::$stmt->execute();
    }
    //10
    public static function INSERT_IN_10(string $table, string $r1, string $r2, string $r3, string $r4, string $r5, string $r6, string $r7, string $r8, string $r9, string $r10, string $value1,
                                        string $value2, string $value3, string $value4, string $value5, string $value6, string $value7, string $value8, string $value9, string $value10){
        self::$sql = "INSERT INTO $table ($r1, $r2, $r3, $r4, $r5, $r6, $r7, $r8, $r9, $r10) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        self::$stmt = Connection::connect()->prepare(self::$sql);
        self::$stmt->bindParam(1, $value1);
        self::$stmt->bindParam(2, $value2);
        self::$stmt->bindParam(3, $value3);
        self::$stmt->bindParam(4, $value4);
        self::$stmt->bindParam(5, $value5);
        self::$stmt->bindParam(6, $value6);
        self::$stmt->bindParam(7, $value7);
        self::$stmt->bindParam(8, $value8);
        self::$stmt->bindParam(9, $value9);
        self::$stmt->bindParam(10, $value10);
        self::$stmt->execute();
    }
    //11
    public static function INSERT_IN_11(string $table, string $r1, string $r2, string $r3, string $r4, string $r5, string $r6, string $r7, string $r8, string $r9, string $r10, string $r11, string $value1, string $value2, string $value3, string $value4, string $value5, string $value6, string $value7, string $value8, string $value9, string $value10, string $value11){
        self::$sql = "INSERT INTO $table ($r1, $r2, $r3, $r4, $r5, $r6, $r7, $r8, $r9, $r10, $r11) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?)";
        self::$stmt = Connection::connect()->prepare(self::$sql);
        self::$stmt->bindParam(1, $value1);
        self::$stmt->bindParam(2, $value2);
        self::$stmt->bindParam(3, $value3);
        self::$stmt->bindParam(4, $value4);
        self::$stmt->bindParam(5, $value5);
        self::$stmt->bindParam(6, $value6);
        self::$stmt->bindParam(7, $value7);
        self::$stmt->bindParam(8, $value8);
        self::$stmt->bindParam(9, $value9);
        self::$stmt->bindParam(10, $value10);
        self::$stmt->bindParam(11, $value11);
        self::$stmt->execute();

    }

    //12
    public static function INSERT_IN_12(string $table, string $r1, string $r2, string $r3, string $r4,
    string $r5, string $r6, string $r7, string $r8, string $r9, string $r10,string $r11, string $r12, string $value1,
    string $value2, string $value3, string $value4, string $value5, string $value6, string $value7,
    string $value8, string $value9, string $value10, string $value11, string $value12){

        self::$sql = "INSERT INTO $table ($r1, $r2, $r3, $r4, $r5, $r6, $r7, $r8, $r9, $r10, $r11, $r12) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?, ?)";
        self::$stmt = Connection::connect()->prepare(self::$sql);
        self::$stmt->bindParam(1, $value1);
        self::$stmt->bindParam(2, $value2);
        self::$stmt->bindParam(3, $value3);
        self::$stmt->bindParam(4, $value4);
        self::$stmt->bindParam(5, $value5);
        self::$stmt->bindParam(6, $value6);
        self::$stmt->bindParam(7, $value7);
        self::$stmt->bindParam(8, $value8);
        self::$stmt->bindParam(9, $value9);
        self::$stmt->bindParam(10, $value10);
        self::$stmt->bindParam(11, $value11);
        self::$stmt->bindParam(12, $value12);
        self::$stmt->execute();
    }

    public static function INSERT_IN_13(string $table, string $r1, string $r2, string $r3, string $r4,
    string $r5, string $r6, string $r7, string $r8, string $r9, string $r10, string $r11, string $r12, string $r13, string $value1,
                                        string $value2, string $value3, string $value4, string $value5, string $value6, string $value7,
                                        string $value8, string $value9, string $value10, string $value11, string $value12, string $value13){

        self::$sql = "INSERT INTO $table ($r1, $r2, $r3, $r4, $r5, $r6, $r7, $r8, $r9, $r10, $r11, $r12, $r13) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?, ?, ?)";
        self::$stmt = Connection::connect()->prepare(self::$sql);
        self::$stmt->bindParam(1, $value1);
        self::$stmt->bindParam(2, $value2);
        self::$stmt->bindParam(3, $value3);
        self::$stmt->bindParam(4, $value4);
        self::$stmt->bindParam(5, $value5);
        self::$stmt->bindParam(6, $value6);
        self::$stmt->bindParam(7, $value7);
        self::$stmt->bindParam(8, $value8);
        self::$stmt->bindParam(9, $value9);
        self::$stmt->bindParam(10, $value10);
        self::$stmt->bindParam(11, $value11);
        self::$stmt->bindParam(12, $value12);
        self::$stmt->bindParam(13, $value13);
        self::$stmt->execute();

    }


    public static function INSERT_IN_15(string $table, string $r1, string $r2, string $r3, string $r4, string $r5, string $r6, string $r7,
        string $r8, string $r9, string $r10, string $r11,string $r12, string $r13, string $r14, string $r15, string $value1,string $value2, string $value3, string $value4,
        string $value5, string $value6, string $value7,string $value8, string $value9, string $value10, string $value11,
        string $value12, string $value13, string $value14, string $value15 ){

        self::$sql = "INSERT INTO $table ($r1, $r2, $r3, $r4, $r5, $r6, $r7, $r8, $r9, $r10, $r11, 
                $r12, $r13, $r14, $r15 ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ? )";
        self::$stmt = Connection::connect()->prepare(self::$sql);
        self::$stmt->bindParam(1, $value1);
        self::$stmt->bindParam(2, $value2);
        self::$stmt->bindParam(3, $value3);
        self::$stmt->bindParam(4, $value4);
        self::$stmt->bindParam(5, $value5);
        self::$stmt->bindParam(6, $value6);
        self::$stmt->bindParam(7, $value7);
        self::$stmt->bindParam(8, $value8);
        self::$stmt->bindParam(9, $value9);
        self::$stmt->bindParam(10, $value10);
        self::$stmt->bindParam(11, $value11);
        self::$stmt->bindParam(12, $value12);
        self::$stmt->bindParam(13, $value13);
        self::$stmt->bindParam(14, $value14);
        self::$stmt->bindParam(15, $value15);
        self::$stmt->execute();

    }
    public static function INSERT_IN_16(string $table, string $r1, string $r2, string $r3, string $r4, string $r5, string $r6, string $r7,
        string $r8, string $r9, string $r10, string $r11,string $r12, string $r13, string $r14, string $r15,
        string $r16,string $value1,string $value2, string $value3, string $value4,
        string $value5, string $value6, string $value7,string $value8, string $value9, string $value10, string $value11,
        string $value12, string $value13, string $value14, string $value15,string $value16){

        self::$sql = "INSERT INTO $table ($r1, $r2, $r3, $r4, $r5, $r6, $r7, $r8, $r9, $r10, $r11, 
                $r12, $r13, $r14, $r15, $r16) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        self::$stmt = Connection::connect()->prepare(self::$sql);
        self::$stmt->bindParam(1, $value1);
        self::$stmt->bindParam(2, $value2);
        self::$stmt->bindParam(3, $value3);
        self::$stmt->bindParam(4, $value4);
        self::$stmt->bindParam(5, $value5);
        self::$stmt->bindParam(6, $value6);
        self::$stmt->bindParam(7, $value7);
        self::$stmt->bindParam(8, $value8);
        self::$stmt->bindParam(9, $value9);
        self::$stmt->bindParam(10, $value10);
        self::$stmt->bindParam(11, $value11);
        self::$stmt->bindParam(12, $value12);
        self::$stmt->bindParam(13, $value13);
        self::$stmt->bindParam(14, $value14);
        self::$stmt->bindParam(15, $value15);
        self::$stmt->bindParam(16, $value16);
        self::$stmt->execute();

    }
    public static function INSERT_IN_17(string $table, string $r1, string $r2, string $r3, string $r4, string $r5, string $r6, string $r7,
        string $r8, string $r9, string $r10, string $r11,string $r12, string $r13, string $r14, string $r15,
        string $r16, string $r17,string $value1,string $value2, string $value3, string $value4,
        string $value5, string $value6, string $value7,string $value8, string $value9, string $value10, string $value11,
        string $value12, string $value13, string $value14, string $value15,string $value16, string $value17){

        self::$sql = "INSERT INTO $table ($r1, $r2, $r3, $r4, $r5, $r6, $r7, $r8, $r9, $r10, $r11, 
                $r12, $r13, $r14, $r15, $r16, $r17) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        self::$stmt = Connection::connect()->prepare(self::$sql);
        self::$stmt->bindParam(1, $value1);
        self::$stmt->bindParam(2, $value2);
        self::$stmt->bindParam(3, $value3);
        self::$stmt->bindParam(4, $value4);
        self::$stmt->bindParam(5, $value5);
        self::$stmt->bindParam(6, $value6);
        self::$stmt->bindParam(7, $value7);
        self::$stmt->bindParam(8, $value8);
        self::$stmt->bindParam(9, $value9);
        self::$stmt->bindParam(10, $value10);
        self::$stmt->bindParam(11, $value11);
        self::$stmt->bindParam(12, $value12);
        self::$stmt->bindParam(13, $value13);
        self::$stmt->bindParam(14, $value14);
        self::$stmt->bindParam(15, $value15);
        self::$stmt->bindParam(16, $value16);
        self::$stmt->bindParam(17, $value17);
        self::$stmt->execute();

    }

    public static function INSERT_IN_18(string $table, string $r1, string $r2, string $r3,
                                        string $r4, string $r5, string $r6, string $r7,string $r8, string $r9, string $r10, string $r11,
                                        string $r12, string $r13, string $r14, string $r15,
                                        string $r16, string $r17, string $r18,
                                        string $value1,
                                        string $value2, string $value3, string $value4,
                                        string $value5, string $value6, string $value7,
                                        string $value8, string $value9, string $value10, string $value11,
                                        string $value12, string $value13, string $value14, string $value15,
                                        string $value16, string $value17, string $value18){

        self::$sql = "INSERT INTO $table ($r1, $r2, $r3, $r4, $r5, $r6, $r7, $r8, $r9, $r10, $r11, 
                $r12, $r13, $r14, $r15, $r16, $r17, $r18) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?,?,?,?,?,?,?,?)";
        self::$stmt = Connection::connect()->prepare(self::$sql);
        self::$stmt->bindParam(1, $value1);
        self::$stmt->bindParam(2, $value2);
        self::$stmt->bindParam(3, $value3);
        self::$stmt->bindParam(4, $value4);
        self::$stmt->bindParam(5, $value5);
        self::$stmt->bindParam(6, $value6);
        self::$stmt->bindParam(7, $value7);
        self::$stmt->bindParam(8, $value8);
        self::$stmt->bindParam(9, $value9);
        self::$stmt->bindParam(10, $value10);
        self::$stmt->bindParam(11, $value11);
        self::$stmt->bindParam(12, $value12);
        self::$stmt->bindParam(13, $value13);
        self::$stmt->bindParam(14, $value14);
        self::$stmt->bindParam(15, $value15);
        self::$stmt->bindParam(16, $value16);
        self::$stmt->bindParam(17, $value17);
        self::$stmt->bindParam(18, $value18);
        self::$stmt->execute();

    }

    //19
    public static function INSERT_IN_19(string $table, string $r1, string $r2, string $r3, string $r4, string $r5, string $r6, string $r7,string $r8, string $r9, string $r10, string $r11, string $r12, string $r13, string $r14, string $r15, string $r16, string $r17, string $r18,  string $r19, string $value1, string $value2, string $value3, string $value4, string $value5, string $value6, string $value7, string $value8, string $value9, string $value10, string $value11, string $value12, string $value13, string $value14, string $value15, string $value16, string $value17, string $value18, string $value19){

        self::$sql = "INSERT INTO $table ($r1, $r2, $r3, $r4, $r5, $r6, $r7, $r8, $r9, $r10, $r11, 
                $r12, $r13, $r14, $r15, $r16, $r17, $r18, $r19) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ? , ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        self::$stmt = Connection::connect()->prepare(self::$sql);
        self::$stmt->bindParam(1, $value1);
        self::$stmt->bindParam(2, $value2);
        self::$stmt->bindParam(3, $value3);
        self::$stmt->bindParam(4, $value4);
        self::$stmt->bindParam(5, $value5);
        self::$stmt->bindParam(6, $value6);
        self::$stmt->bindParam(7, $value7);
        self::$stmt->bindParam(8, $value8);
        self::$stmt->bindParam(9, $value9);
        self::$stmt->bindParam(10, $value10);
        self::$stmt->bindParam(11, $value11);
        self::$stmt->bindParam(12, $value12);
        self::$stmt->bindParam(13, $value13);
        self::$stmt->bindParam(14, $value14);
        self::$stmt->bindParam(15, $value15);
        self::$stmt->bindParam(16, $value16);
        self::$stmt->bindParam(17, $value17);
        self::$stmt->bindParam(18, $value18);
        self::$stmt->bindParam(19, $value19);
        self::$stmt->execute();

    }

    #24
    public static function INSERT_IN_24(string $table, string $r1, string $r2,
                                        string $r3, string $r4, string $r5, string $r6,
                                        string $r7,string $r8, string $r9, string $r10,
                                        string $r11, string $r12, string $r13, string $r14,
                                        string $r15, string $r16, string $r17, string $r18,
                                        string $r19,string $r20, string $r21, string $r22,
                                        string $r23, string $r24,
                                        string $value1, string $value2,
                                        string $value3, string $value4, string $value5,
                                        string $value6, string $value7, string $value8,
                                        string $value9, string $value10, string $value11,
                                        string $value12, string $value13, string $value14,
                                        string $value15, string $value16, string $value17,
                                        string $value18, string $value19,
                                        string $value20, string $value21,
                                        string $value22, string $value23,
                                        string $value24){
        self::$sql =
            "INSERT INTO $table ($r1, $r2, $r3, $r4, $r5, $r6, $r7, $r8, $r9, $r10, $r11, 
                $r12, $r13, $r14, $r15, $r16, $r17, $r18, $r19, $r20, $r21, $r22, $r23, $r24) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ? , ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        self::$stmt = Connection::connect()->prepare(self::$sql);
        self::$stmt->bindParam(1, $value1);
        self::$stmt->bindParam(2, $value2);
        self::$stmt->bindParam(3, $value3);
        self::$stmt->bindParam(4, $value4);
        self::$stmt->bindParam(5, $value5);
        self::$stmt->bindParam(6, $value6);
        self::$stmt->bindParam(7, $value7);
        self::$stmt->bindParam(8, $value8);
        self::$stmt->bindParam(9, $value9);
        self::$stmt->bindParam(10, $value10);
        self::$stmt->bindParam(11, $value11);
        self::$stmt->bindParam(12, $value12);
        self::$stmt->bindParam(13, $value13);
        self::$stmt->bindParam(14, $value14);
        self::$stmt->bindParam(15, $value15);
        self::$stmt->bindParam(16, $value16);
        self::$stmt->bindParam(17, $value17);
        self::$stmt->bindParam(18, $value18);
        self::$stmt->bindParam(19, $value19);
        self::$stmt->bindParam(20, $value20);
        self::$stmt->bindParam(21, $value21);
        self::$stmt->bindParam(22, $value22);
        self::$stmt->bindParam(23, $value23);
        self::$stmt->bindParam(24, $value24);
        self::$stmt->execute();

    }
}