<?php


namespace app\controller\globals;

class cleaner
{
    public static $var;
    
    const validate_int = 1;
    const validate_email = 2;
    const sanitize_email = 3;
    const sanitize_string = 4;
    const sanitize_url = 5;
    const special_chars_sanitize = 6;

    #http const
    const post = 1;
    const get = 2;

    #Array Filter
    private const filters = array(
        self::validate_int => FILTER_VALIDATE_INT,
        self::validate_email => FILTER_VALIDATE_EMAIL,
        self::sanitize_email => FILTER_SANITIZE_EMAIL,
        self::sanitize_string => FILTER_SANITIZE_STRING,
        self::sanitize_url => FILTER_SANITIZE_URL,
        self::special_chars_sanitize => FILTER_SANITIZE_FULL_SPECIAL_CHARS
        );

    private static $http_type = array(self::post => INPUT_POST, self::get => INPUT_GET);
    private static $validation_type;
    private static $filterType;
    private static $true;

    #Certification Of Anny Operation
    public static function is_true(){
        return self::$true;
    }

    #getting boolean states for Verification
    private static function get_bool_state(bool $e){
        if ($e): self::$true = $e;
        else: self::$true = $e;
        endif;
    }

    #setting var for filter || validation
    protected static function FilterType($filterType){
        self::$filterType = $filterType;
    }
    #setting validation type
    protected static function setValidationType($validation_type){
        self::$validation_type = $validation_type;
    }

    #getting var for filter || validation
    protected static function getFilterType(){
        return self::$filterType;
    }
    #getting validation type
    protected static function getValidationType(){
        return self::$validation_type;
    }
    #getting array Http type
    protected static function getHttpType(){
        return self::$http_type;
    }

    #Filter Method
    public static function filter($http_type, $var, $validation_type){
        self::setValidationType($validation_type);
        self::FilterType($var);
        if (self::not_empty(array($http_type, self::getFilterType(), self::getValidationType(), self::getHttpType()))):
            if (array_key_exists($validation_type, self::filters) && array_key_exists($http_type, self::getHttpType())):
                self::get_bool_state(true);
                return filter_input(self::getHttpType()[$http_type], self::getFilterType(), self::filters[self::getValidationType()]);
            else:
                self::get_bool_state(false);
            endif;
        else:
            self::get_bool_state(false);
        endif;
    }
    
    #Array and Null Variables Verifying
    public static function not_empty(array $variaveis):  bool{
        for ($i = 0; $i < count($variaveis); $i++):
            if (in_array( '', $variaveis) || empty($variaveis[$i]) || $variaveis[$i] == null):
                return false;
            else:
                return true;
            endif;
        endfor;
    }
}