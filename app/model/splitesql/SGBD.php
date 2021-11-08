<?php


namespace app\model\splitesql;

class SGBD extends Connection
{
    /***
     * @author Patricio Bento Andrade
     * @copyright tricioandarade - Patrício Andrade All Rights Reserved
     * @license  MIT
     * @since 2020
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
}