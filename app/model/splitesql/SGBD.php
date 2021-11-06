<?php


namespace app\model\splitesql;

class SGBD extends Connection
{
    /***
     * @author Patricio Bento Andrade
     * @copyright tricioandarade - Patrício Andrade All Rights Reserved
     * @license  MIT
     * @since 2020
     * @Updated 6, 2021
     * @class SGBD START
     */

    #SGBD Proprietes

    private static $nts_value;
    private static $x_value;
    private static $y_value;
    private static $query;

    /**
     * SGBD constructor. Set Connection Proprieties
     */
    public function __construct(string $host, string $user, string $charset, string $database, string $password)
    {
        self::setHost($host);
        self::setUser($user);
        self::setCharset($charset);
        self::setDatabase($database);
        self::setPassword($password);
        self::connect();
    }

    #Set Query Result
    private static function setQuery($query){
        self::$query = $query;
    }
    #Get Query Return
    private static function getQuery(){
        return self::$query;
    }

    #Certification Of Anny Operation
    public static function is_true(){
        return self::$nts_value;
    }

    #getting boolean states for Verification
    private static function get_bool_state(bool $state){
        if ($state): self::$nts_value = $state;
        else: self::$nts_value = $state;
        endif;
    }

    #set x Verification Value
    private static function set_x_check(string $table){
        self::$x_value = SQLcount::rowCount("$table");
    }
    #set y Verification Value
    private static function set_y_check(string $table){
        self::$y_value = SQLcount::rowCount("$table");
    }

    #get x Verification Value
    private static function get_x(){
        return self::$x_value;
    }
    #get y Verification Value
    private static function get_y(){
        return self::$y_value;
    }

    #get x,y boolean values and Verify
    private static function resul_z(int $first, int $second){
        if ($first < $second):
            self::get_bool_state(true);
        else:
            self::get_bool_state(false);
        endif;
    }

    public static function create_table(){

    }
    #count_method
    public static function sql_count_by_1_row($table, $row1, $value){
        return SQLselect::SELECT("$row1", "$table", "$row1", "$value", SQLcount::count);
    }
    
    #select
    /*one*/
    public static function select_one_row(string $row, string $table){
        if(SQLcount::rowCount("$table")):
            self::get_bool_state(true);
            return SQLselect::SELECT_1_ROW("$row", "$table",consts::fetch);
        else:
            self::get_bool_state(false);
        endif;
    }
    /*all*/
    public static function select_all(string $table){
        if(SQLcount::rowCount("$table")):
            self::get_bool_state(true);
            return SQLselect::SELECT_ALL("$table", consts::fetch);
        else:
            self::get_bool_state(false);
        endif;
    }
    
    /*all by one Reference*/
    public static function select_all_by_row_where_value(string $table, string $row, string $ref){
        if(SQLcount::count_by_1_row("{$table}", "{$row}", "{$ref}")):
            self::get_bool_state(true);
            return SQLselect::SELECT_ALL_WHERE("$table", "$row", "$ref", consts::fetch);
        else:
            self::get_bool_state(false);
        endif;
    }
    
    /*all select order by asc */
    public static function select_all_asc(string $table, string $row){
        if(SQLcount::rowCount("$table")):
            self::setQuery(SQLselect::SELECT_ALL_ORDER_ASC("$table","$row",  consts::fetch));
            if (self::getQuery()):
                self::get_bool_state(true);
                return self::getQuery();
            else:
                self::get_bool_state(false);
            endif;
        else:
            self::get_bool_state(false);
        endif;
    }
    /*all select order by desc */
    public static function select_all_desc_limit(string $table, string $row, string $limit){
        if(SQLcount::rowCount("$table")):
            self::setQuery(SQLselect::SELECT_ALL_ORDER_DESC_LIMIT("$table","$row",  "$limit",consts::fetch));
            if (self::getQuery()):
                self::get_bool_state(true);
                return self::getQuery();
            else:
                self::get_bool_state(false);
            endif;
        else:
            self::get_bool_state(false);
        endif;
    }
    /*all select order by asc Where*/
    public static function select_all_asc_where(string $table, string $row, string $equal, string $order_by){
        if(SQLcount::rowCount("{$table}")):
            self::setQuery(SQLselect::SELECT_ALL_ORDER_ASC_WHERE("$table","$row",  "$equal", "$order_by", consts::fetch));
            if (self::getQuery()):
                self::get_bool_state(true);
                return self::getQuery();
            else:
                self::get_bool_state(false);
            endif;
        else:
            self::get_bool_state(false);
        endif;
    }
    /*all select Where Like*/
    public static function select_all_where_like(string $table, string $row, string $like){
        if(SQLcount::rowCount("$table")):
            self::setQuery(SQLselect::SELECT_ALL_WHERE_LIKE("$table","$row",  "$like", consts::fetch));
            if (self::getQuery()):
                self::get_bool_state(true);
                return self::getQuery();
            else:
                self::get_bool_state(false);
            endif;
        else:
            self::get_bool_state(false);
        endif;
    }
    /*all select Where Like
    public static function select_all_where_like_and(string $table, string $row, string $like){
        if(Inspection::sql_count_all_in_table("$table")):
            self::setQuery(SQLselect::SELECT_ALL_WHERE_AND_LIKE("$table","$row",  "$like", consts::fetch));
            if (self::getQuery()):
                self::get_bool_state(true);
                return self::getQuery();
            else:
                self::get_bool_state(false);
            endif;
        else:
            self::get_bool_state(false);
        endif;
    }*/
    /*one select where limit */
    public static function select_one_where_limit(string $row, string $table, string $where, string $equal, string $limit){
        if(SQLcount::rowCount("$table")):
            self::setQuery(SQLselect::SELECT_WHERE_LIMIT("$row", "$table", "$where", "$equal", "$limit", consts::fetch));
            if (self::getQuery()):
                self::get_bool_state(true);
                return self::getQuery();
            else:
                self::get_bool_state(false);
            endif;
        else:
            self::get_bool_state(false);
        endif;
    }
    /*all select order by desc limit*/
    public static function select_all_desc_where_limit(string $table, string $row,string $equal, string $order_by, string $limit){
        if(SQLcount::rowCount("$table")):
            self::setQuery(SQLselect::SELECT_ALL_ORDER_DESC_WHERE_LIMIT("$table","$row", "$equal", "$order_by", $limit, consts::fetch));
            if (self::getQuery()):
                self::get_bool_state(true);
                return self::getQuery();
            else:
                self::get_bool_state(false);
            endif;
        else:
            self::get_bool_state(false);
        endif;
    }
    /*all select order by desc limit*/
    public static function select_all_desc_where(string $table, string $row,string $equal, string $order_by){
        if(SQLcount::rowCount("$table")):
            self::setQuery(SQLselect::SELECT_ALL_ORDER_DESC_WHERE("$table","$row", "$equal", "$order_by", consts::fetch));
            if (self::getQuery()):
                self::get_bool_state(true);
                return self::getQuery();
            else:
                self::get_bool_state(false);
            endif;
        else:
            self::get_bool_state(false);
        endif;
    }

    /*one*/
    public static function select_one(string $row, string $table, string $where, string $ref){
        if(SQLcount::count_by_1_row("$table", "$where", "$ref")):
            self::setQuery(SQLselect::SELECT("$row", "$table","$where", "$ref", consts::fetch)[0]);
            if (self::getQuery()):
                self::get_bool_state(true);
                return self::getQuery();
            else:
                self::get_bool_state(false);
            endif;
        else:
            self::get_bool_state(false);
        endif;
    }

    /*one -> bytwo*/
    public static function select_one_where_2(string $row, string $table, string $where_row1, string $equal1, string $where_row2, string $equal2, string $data){
        if(Inspection::sql_count_by_1_row("$table", "$where_row1", "$equal1")):
            self::setQuery(SQLselect::SELECT_1_WHERE_2("$row", "$table","$where_row1","$equal1", "$where_row2", "$equal2", consts::fetch)[0]);
            if (self::getQuery()):
                self::get_bool_state(true);
                return self::getQuery();
            else:
                self::get_bool_state(false);
            endif;
        else:
            self::get_bool_state(false);
        endif;
    }


    /*all -> bytwo*/
    public static function select_all_where_2( string $table, string $where_row1, string $equal1, string $where_row2, string $equal2){
        if(Inspection::sql_count_by_1_row("$table", "$where_row1", "$equal1")):
            self::setQuery(SQLselect::SELECT_ALL_WHERE_2("$table", "$where_row1","$equal1", "$where_row2", "$equal2", consts::fetch));
            if (self::getQuery()):
                self::get_bool_state(true);
                return self::getQuery();
            else:
                self::get_bool_state(false);
            endif;
        else:
            self::get_bool_state(false);
        endif;
    }

    #Select by a limit
    /*Select all Limit[]*/
    public static function select_all_where_limit(string $table, string $row, string $equal_value, string $limit){
        if(Inspection::sql_count_by_1_row("$table", "$row", "$equal_value")):
            self::get_bool_state(true);
            self::setQuery(SQLselect::SELECT_ALL_WHERE_LIMIT("$table", "$row", "$equal_value", "$limit", consts::fetch));
            if (self::getQuery()):
                self::get_bool_state(true);
                return self::getQuery();
            else:
                self::get_bool_state(false);
            endif;
        else:
            self::get_bool_state(false);
        endif;
    }

    #update
    /*one*/
    public static function set_update_one(string $table, string $row, string $value, string $where_row, string $equal_value){
        if (Inspection::is_not_empty(array($table, $row, $value, $where_row, $equal_value))):
            SQLupdate::UPDATE_SET_1("$table", "$row", "$value", "$where_row", "$equal_value");
            if (Inspection::sql_count_by_1_row($table, $row, $value)):
                self::get_bool_state(true);
            else:
                self::get_bool_state(false);
            endif;
        endif;
    }
    /*two*/
    public static function set_update_two(string $table, string $row1, string $value1, string $row2, string $value2,  string $where_row, string $equal_value){
        if (Inspection::is_not_empty(array($table, $row1, $row2, $value1, $value2, $where_row, $equal_value))):
            SQLupdate::UPDATE_SET_2("$table", "$row1", "$value1", "$row2", "$value2", "$where_row", "$equal_value");
            if (Inspection::sql_count_by_1_row($table, $row1, $value1)):
                self::get_bool_state(true);
            else:
                self::get_bool_state(false);
            endif;
        endif;
    }
    /*five*/
    public static function set_update_five(string $table, string $row1, string $value1, string $row2, string $value2,  string $row3, string $value3,  string $row4, string $value4,   string $row5, string $value5, string $where_row, string $equal_value){
        if (Inspection::is_not_empty([$table, $row1, $row2, $value1, $value2, $where_row, $equal_value])):
            SQLupdate::UPDATE_SET_5("{$table}", "{$row1}", "{$value1}", "{$row2}", "{$value2}", "{$row3}", "{$value3}", "{$row4}", "{$value4}", "{$row5}", "{$value5}", "{$where_row}", "{$equal_value}");
            if (Inspection::sql_count_by_1_row($table, $row1, $value1)):
                self::get_bool_state(true);
            else:
                self::get_bool_state(false);
            endif;
        endif;
    }

    #insert
    /*one*/
    public static function insert_1(string $table, string $row, string $value){
        if (Inspection::is_not_empty(array($table, $row, $value))):
            self::set_x_check($table);
            SQLinsert::INSERT_IN_1($table, $row, $value);
            self::set_y_check($table);

            if (self::get_x() != null && self::get_y() != null):
                self::resul_z(self::get_x(), self::get_y());
            else:
                self::get_bool_state(false);
            endif;
        else:
            self::get_bool_state(false);
        endif;
    }
    /*two*/
    public static function insert_2(string $table, string $row1, string $row2,  string $value1,string $value2){
        if (Inspection::is_not_empty(array($table, $row1, $value1, $row2, $value2))):
            self::set_x_check($table);
            SQLinsert::INSERT_IN_2($table, $row1, $row2, $value1, $value2);
            self::set_y_check($table);

            if (self::get_x() != null && self::get_y() != null):
                self::resul_z(self::get_x(), self::get_y());
            else:
                self::get_bool_state(false);
            endif;
        else:
            self::get_bool_state(false);
        endif;
    }
    /*tree*/
    public static function insert_3(string $table, string $row1, string $row2, string $row3, string $value1, string $value2, string $value3){
        if (Inspection::is_not_empty(array($table, $row1, $value1, $row2, $value2, $row3, $value3))):
            self::set_x_check($table);
            SQLinsert::INSERT_IN_3($table, $row1, $row2, $row3, $value1, $value2, $value3);
            self::set_y_check($table);

            if (self::get_x() != null && self::get_y() != null):
                self::resul_z(self::get_x(), self::get_y());
            else:
                self::get_bool_state(false);
            endif;
        else:
            self::get_bool_state(false);
        endif;
    }
    /*four*/
    public static function insert_4(string $table, string $row1, string $row2, string $row3,  string $row4, string $value1, string $value2, string $value3, string $value4){
        if (Inspection::is_not_empty(array($table, $row1, $value1, $row2, $value2, $row3, $value3, $row4, $value4))):
            self::set_x_check($table);
                SQLinsert::INSERT_IN_4($table, $row1, $row2, $row3, $row4, $value1, $value2, $value3, $value4);
            self::set_y_check($table);

            if (self::get_x() != null && self::get_y() != null):
                self::resul_z(self::get_x(), self::get_y());
            else:
                self::get_bool_state(false);
            endif;
        else:
            self::get_bool_state(false);
        endif;
    }
    /*five*/
    public static function insert_5(string $table, string $row1, string $row2, string $row3,  string $row4,  string $row5, string $value1, string $value2, string $value3, string $value4, string $value5){
        if (Inspection::is_not_empty(array($table, $row1, $value1, $row2, $value2, $row3, $value3, $row4, $value4, $row5, $value5))):
            self::set_x_check($table);
                SQLinsert::INSERT_IN_5($table, $row1, $row2, $row3, $row4, $row5, $value1, $value2, $value3, $value4, $value5);
            self::set_y_check($table);

            if (self::get_x() != null && self::get_y() != null):
                self::resul_z(self::get_x(), self::get_y());
            else:
                self::get_bool_state(false);
            endif;
        else:
            self::get_bool_state(false);
        endif;
    }
    /*seven*/
    public static function insert_7(string $table, string $row1, string $row2, string $row3,  string $row4,  string $row5, string $row6,  string $row7, string $value1, string $value2, string $value3, string $value4, string $value5, string $value6, string $value7){
        if (Inspection::is_not_empty(array($table, $row1, $value1, $row2, $value2, $row3, $value3, $row4, $value4, $row5, $row6,  $row7, $value5,$value6, $value7))):
            self::set_x_check($table);
                SQLinsert::INSERT_IN_7($table, $row1, $row2, $row3, $row4, $row5, $row6,  $row7,  $value1, $value2, $value3, $value4, $value5, $value6, $value7);
            self::set_y_check($table);

            if (self::get_x() != null && self::get_y() != null):
                self::resul_z(self::get_x(), self::get_y());
            else:
                self::get_bool_state(false);
            endif;
        else:
            self::get_bool_state(false);
        endif;
    }
    /*eight*/
    public static function insert_8(string $table, string $row1, string $row2, string $row3,  string $row4,  string $row5, string $row6,  string $row7,  string $row8, string $value1, string $value2, string $value3, string $value4, string $value5, string $value6, string $value7, string $value8){
        if (Inspection::is_not_empty(array($table, $row1, $value1, $row2, $value2, $row3, $value3, $row4, $value4, $row5, $row6,  $row7,  $row8, $value5,$value6, $value7, $value8))):
            self::set_x_check($table);
                SQLinsert::INSERT_IN_8($table, $row1, $row2, $row3, $row4, $row5, $row6,  $row7,  $row8, $value1, $value2, $value3, $value4, $value5, $value6, $value7, $value8);
            self::set_y_check($table);

            if (self::get_x() != null && self::get_y() != null):
                self::resul_z(self::get_x(), self::get_y());
            else:
                self::get_bool_state(false);
            endif;
        else:
            self::get_bool_state(false);
        endif;
    }
    /*nine*/
    public static function insert_9(string $table, string $row1, string $row2, string $row3,  string $row4,  string $row5, string $row6,  string $row7,  string $row8, string $row9, string $value1, string $value2, string $value3, string $value4, string $value5, string $value6, string $value7, string $value8, string $value9){
        if (Inspection::is_not_empty(array($table, $row1, $value1, $row2, $value2, $row3, $value3, $row4, $value4, $row5, $row6,  $row7,  $row8, $row9, $value5, $value6, $value7, $value8,$value9))):
            self::set_x_check($table);
                SQLinsert::INSERT_IN_9($table, $row1, $row2, $row3, $row4, $row5, $row6,  $row7,  $row8,$row9, $value1, $value2, $value3, $value4, $value5, $value6, $value7, $value8, $value9);
            self::set_y_check($table);

            if (self::get_x() != null && self::get_y() != null):
                self::resul_z(self::get_x(), self::get_y());
            else:
                self::get_bool_state(false);
            endif;
        else:
            self::get_bool_state(false);
        endif;
    }
    /*ten*/
    public static function insert_10(string $table, string $row1, string $row2, string $row3,  string $row4,  string $row5, string $row6,  string $row7,  string $row8, string $row9, string $row10, string $value1, string $value2, string $value3, string $value4, string $value5, string $value6, string $value7, string $value8, string $value9, string $value10){
        if (Inspection::is_not_empty(array($table, $row1, $value1, $row2, $value2, $row3, $value3, $row4, $value4, $row5, $row10, $row6,  $row7,  $row8, $row9, $value5, $value6, $value7, $value8,$value9, $value10))):
            self::set_x_check($table);
                SQLinsert::INSERT_IN_10($table, $row1, $row2, $row3, $row4, $row5, $row6,  $row7,  $row8,$row9, $row10, $value1, $value2, $value3, $value4, $value5, $value6, $value7, $value8, $value9, $value10);
            self::set_y_check($table);

            if (self::get_x() != null && self::get_y() != null):
                self::resul_z(self::get_x(), self::get_y());
            else:
                self::get_bool_state(false);
            endif;
        else:
            self::get_bool_state(false);
        endif;
    }
    /*eleven*/
    public static function insert_11(string $table, string $row1, string $row2, string $row3,  string $row4,  string $row5, string $row6,  string $row7,  string $row8, string $row9, string $row10, string $row11, string $value1, string $value2, string $value3, string $value4, string $value5, string $value6, string $value7, string $value8, string $value9, string $value10, string $value11){
        if (Inspection::is_not_empty(array($table, $row1, $value1, $row2, $value2, $row3, $value3, $row4, $value4, $row5, $row10, $row6,  $row7,  $row8, $row9, $row11, $value5, $value6, $value7, $value8,$value9, $value10, $value11))):
            self::set_x_check($table);
                SQLinsert::INSERT_IN_11($table, $row1, $row2, $row3, $row4, $row5, $row6,  $row7,  $row8, $row9, $row10, $row11, $value1, $value2, $value3, $value4, $value5, $value6, $value7, $value8, $value9, $value10, $value11);
            self::set_y_check($table);

            if (self::get_x() != null && self::get_y() != null):
                self::resul_z(self::get_x(), self::get_y());
            else:
                self::get_bool_state(false);
            endif;
        else:
            self::get_bool_state(false);
        endif;
    }
    /*twelve*/
    public static function insert_12(string $table, string $row1, string $row2, string $row3,  string $row4,  string $row5, string $row6, string  $row7, string  $row8, string  $row9, string  $row10, string  $row11, string  $row12, string $value1, string $value2, string $value3, string $value4, string $value5, $value6, string $value7, string $value8, string $value9, string $value10, string $value11, string $value12){
        if (Inspection::is_not_empty(array($table, $row1, $value1, $row2, $value2, $row3, $value3, $row4, $value4, $row5,$row6, $row7, $row8, $row9, $row10, $row11, $row12, $value5, $value6, $value7, $value8, $value9, $value10, $value11, $value12))):
            self::set_x_check($table);
                SQLinsert::INSERT_IN_12($table, $row1, $row2, $row3, $row4, $row5, $row6, $row7, $row8, $row9, $row10, $row11, $row12, $value1, $value2, $value3, $value4, $value5, $value6, $value7, $value8, $value9, $value10, $value11, $value12);
            self::set_y_check($table);

            if (self::get_x() != null && self::get_y() != null):
                self::resul_z(self::get_x(), self::get_y());
            else:
                self::get_bool_state(false);
            endif;
        else:
            self::get_bool_state(false);
        endif;
    }
    /*thirteen*/
    public static function insert_13(string $table, string $row1, string $row2, string $row3,  string $row4,  string $row5, string $row6, string  $row7, string  $row8, string  $row9, string  $row10, string  $row11, string  $row12,  string  $row13, string $value1, string $value2, string $value3, string $value4, string $value5, $value6, string $value7, string $value8, string $value9, string $value10, string $value11, string $value12,  string  $value13){
        if (Inspection::is_not_empty(array($table, $row1, $value1, $row2, $value2, $row3, $value3, $row4, $value4, $row5,$row6, $row7, $row8, $row9, $row10, $row11, $row12, $value5, $value6, $value7, $value8, $value9, $value10, $value11, $value12, $value13, $row13))):
            self::set_x_check($table);
                SQLinsert::INSERT_IN_13($table, $row1, $row2, $row3, $row4, $row5, $row6, $row7, $row8, $row9, $row10, $row11, $row12, $row13, $value1, $value2, $value3, $value4, $value5, $value6, $value7, $value8, $value9, $value10, $value11, $value12, $value13);
            self::set_y_check($table);

            if (self::get_x() != null && self::get_y() != null):
                self::resul_z(self::get_x(), self::get_y());
            else:
                self::get_bool_state(false);
            endif;
        else:
            self::get_bool_state(false);
        endif;
    }
    /*fifteen*/
    public static function insert_15(string $table, string $row1, string $row2, string $row3,  string $row4, string $row5, string $row6, string  $row7, string  $row8, string  $row9, string  $row10, string  $row11, string  $row12, string  $row13, string  $row14, string $row15, string $value1, string $value2, string $value3, string $value4, string $value5, string $value6, string $value7, string $value8, string $value9, string $value10, string $value11, string $value12, string  $value13, string $value14, string $value15 ){
        if (Inspection::is_not_empty(array($table, $row1, $row2, $row3, $row4, $row5, $row6, $row7, $row8, $row9, $row10, $row11, $row12, $row13, $row14, $row15,   $value1, $value2, $value3, $value4, $value5, $value6, $value7, $value8, $value9, $value10, $value11, $value12, $value13,$value14, $value15))):
            self::set_x_check($table);
                SQLinsert::INSERT_IN_15($table, $row1, $row2, $row3, $row4, $row5, $row6, $row7, $row8, $row9, $row10, $row11, $row12, $row13, $row14, $row15,   $value1, $value2, $value3, $value4, $value5, $value6, $value7, $value8, $value9, $value10, $value11, $value12, $value13,$value14, $value15 );
            self::set_y_check($table);

            if (self::get_x() != null && self::get_y() != null):
                self::resul_z(self::get_x(), self::get_y());
            else:
                self::get_bool_state(false);
            endif;
        else:
            self::get_bool_state(false);
        endif;
    }
    /*sixteen*/
    public static function insert_16(string $table, string $row1, string $row2, string $row3,  string $row4, string $row5, string $row6, string  $row7, string  $row8, string  $row9, string  $row10, string  $row11, string  $row12, string  $row13, string  $row14, string $row15, string $row16, string $value1, string $value2, string $value3, string $value4, string $value5, string $value6, string $value7, string $value8, string $value9, string $value10, string $value11, string $value12, string  $value13, string $value14, string $value15, string $value16){
        if (Inspection::is_not_empty(array($table, $row1, $value1, $row2, $value2, $row3, $value3, $row4, $value4, $row5,$row6, $row7, $row8, $row9, $row10, $row11, $row12, $value5, $value6, $value7, $value8, $value9, $value10, $value11, $value12, $value13, $row13))):
            self::set_x_check($table);
                SQLinsert::INSERT_IN_16($table, $row1, $row2, $row3, $row4, $row5, $row6, $row7, $row8, $row9, $row10, $row11, $row12, $row13, $row14, $row15, $row16, $value1, $value2, $value3, $value4, $value5, $value6, $value7, $value8, $value9, $value10, $value11, $value12, $value13,$value14, $value15, $value16);
            self::set_y_check($table);

            if (self::get_x() != null && self::get_y() != null):
                self::resul_z(self::get_x(), self::get_y());
            else:
                self::get_bool_state(false);
            endif;
        else:
            self::get_bool_state(false);
        endif;
    }
    /*eighteen*/
    public static function insert_18(string $table, string $row1, string $row2, string $row3,  string $row4, string $row5, string $row6, string  $row7, string  $row8, string  $row9, string  $row10, string  $row11, string  $row12, string  $row13, string  $row14, string $row15, string $row16, string  $row17, string  $row18, string $value1, string $value2, string $value3, string $value4, string $value5, string $value6, string $value7, string $value8, string $value9, string $value10, string $value11, string $value12, string  $value13, string $value14, string $value15, string $value16, string $value17, string $value18){
        if (Inspection::is_not_empty(array($table, $row1, $value1, $row2, $value2, $row3, $value3, $row4, $value4, $row5,$row6, $row7, $row8, $row9, $row10, $row11, $row12, $value5, $value6, $value7, $value8, $value9, $value10, $value11, $value12, $value13, $row13))):
            self::set_x_check($table);
                SQLinsert::INSERT_IN_18($table, $row1, $row2, $row3, $row4, $row5, $row6, $row7, $row8, $row9, $row10, $row11, $row12, $row13, $row14, $row15, $row16, $row17, $row18, $value1, $value2, $value3, $value4, $value5, $value6, $value7, $value8, $value9, $value10, $value11, $value12, $value13,$value14, $value15, $value16, $value17, $value18);
            self::set_y_check($table);

            if (self::get_x() != null && self::get_y() != null):
                self::resul_z(self::get_x(), self::get_y());
            else:
                self::get_bool_state(false);
            endif;
        else:
            self::get_bool_state(false);
        endif;
    }
    /*twenty-four*/
    public static function insert_24(string $table, string $row1, string $row2, string $row3,  string $row4, string $row5, string $row6, string  $row7, string  $row8, string  $row9, string  $row10, string  $row11, string  $row12, string  $row13, string  $row14, string $row15, string $row16, string  $row17, string  $row18, string  $row19, string  $row20, string  $row21, string  $row22, string  $row23, string  $row24, string $value1, string $value2, string $value3, string $value4, string $value5, string $value6, string $value7, string $value8, string $value9, string $value10, string $value11, string $value12, string  $value13, string $value14, string $value15, string $value16, string $value17, string $value18, string $value19, string $value20, string $value21, string $value22, string  $value23, string $value24
    ){
        if (Inspection::is_not_empty(array($table, $row1, $value1, $row2, $value2, $row3, $value3, $row4, $value4, $row5,$row6, $row7, $row8, $row9, $row10, $row11, $row12, $value5, $value6, $value7, $value8, $value9, $value10, $value11, $value12, $value13, $row13))):
            self::set_x_check($table);
                SQLinsert::INSERT_IN_24("{$table}", "{$row1}", "{$row2}", "{$row3}", "{$row4}", "{$row5}", "{$row6}", "{$row7}", "{$row8}", "{$row9}", "{$row10}", "{$row11}", "{$row12}", "{$row13}", "{$row14}", "{$row15}", "{$row16}", "{$row17}", "{$row18}", "{$row19}", "{$row20}", "{$row21}", "{$row22}", "{$row23}", "{$row24}", "{$value1}", "{$value2}", "{$value3}", "{$value4}", "{$value5}", "{$value6}", "{$value7}", "{$value8}", "{$value9}", "{$value10}", "{$value11}", "{$value12}", "{$value13}", "{$value14}", "{$value15}", "{$value16}", "{$value17}", "{$value18}", "{$value19}","{$value20}", "{$value21}", "{$value22}", "{$value23}",  "{$value24}");
            self::set_y_check($table);

            if (self::get_x() != null && self::get_y() != null):
                self::resul_z(self::get_x(), self::get_y());
            else:
                self::get_bool_state(false);
            endif;
        else:
            self::get_bool_state(false);
        endif;
    }

    #JOINs
    public static function join_tables_2(string $table1, string $row1, string $table2, string $row2, string $row3, string $row4){
        if(SQLcount::rowCount("$table1") && SQLcount::rowCount("$table2")):
            self::setQuery(SQLjoin::JOIN_TABLES_2($table1, $row1, $table2, $row2, $row3,  $row4, consts::fetch));
            if (self::getQuery()):
                self::get_bool_state(true);
                return self::getQuery();
            else:
                self::get_bool_state(false);
            endif;
        else:
            self::get_bool_state(false);
        endif;
    }
    public static function join_tables_3(string $table1, string $row1, string $table2, string $row2, string $table3, string $row3, string $rowref1, string $rowref2){
        if(SQLcount::rowCount("$table1") && SQLcount::rowCount("$table2") && SQLcount::rowCount("$table3")):
            self::setQuery(SQLjoin::JOIN_TABLES_3($table1, $row1, $table2, $row2, $table3, $row3, $rowref1,  $rowref2, consts::fetch));
            if (self::getQuery()):
                self::get_bool_state(true);
                return self::getQuery();
            else:
                self::get_bool_state(false);
            endif;
        else:
            self::get_bool_state(false);
        endif;
    }
    #delete
    #get x,y boolean values and Verify drop
    private static function drop_result(int $first, int $second){
        if ($first > $second):
            self::get_bool_state(true);
        else:
            self::get_bool_state(false);
        endif;
    }
    #delete
    /*one*/
    public static function delete_from_1(string $table, string $row, string $value){
        SQLdrop::setTable($table);
        SQLdrop::setRow($row);
        SQLdrop::setValue($value);
        if (Inspection::is_not_empty(array(SQLdrop::getTable(), SQLdrop::getRow(), SQLdrop::getValue()))):
            self::set_x_check(SQLdrop::getTable());
                SQLdrop::DeleteWhere();
            self::set_y_check(SQLdrop::getTable());

            if (self::get_x() != null && self::get_y() != null):
                self::drop_result(self::get_x(), self::get_y());
            else:
                self::get_bool_state(false);
            endif;
        else:
            self::get_bool_state(false);
        endif;
    }
}