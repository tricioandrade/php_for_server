<?php


namespace app\controller\globals;

class time
{
    private static $month = array( '01' => 'Janeiro', '02' => 'Fevereiro', '03' => 'Março', '04' => 'Abril', '05' => 'Maio', '06' => 'Junho', '07' => 'Julho', '08' => 'Agosto', '09' => 'Setembro', '10' => 'Outubro', '11' => 'Novembro', '12' => 'Dezembro');
    private static $week = array( 'Sunday' => 'Domingo', 'Monday' => 'Segunda-feira', 'Tuesday' => 'Terça-feira', 'Wednesday' => 'Quarta-feira', 'Thursday' => 'Quinta-feira', 'Friday' => 'Sexta-feira', 'Saturday' => 'Sábado');
    private static $date;
    private static $timezone;

    public static function TimezoneCountry(string $zone, $city = 0){
        if ($zone):
            $timeZones = \DateTimeZone::listIdentifiers(\DateTimeZone::PER_COUNTRY, $zone);
            self::setTimezones($timeZones[$city]);
            var_dump($timeZones);
        endif;
    }

    public static function CountryCode($country = null){
            $timeZones = \DateTimeZone::listIdentifiers(\DateTimeZone::AFRICA, $country);
            foreach ( $timeZones as $key => $zoneName ):
                $tz = new \DateTimeZone($zoneName);
                $loc = $tz->getOffset('');
                #print($zoneName . " = " . $loc['comments'] . "<br>");
               # var_dump($loc);
            endforeach;
    }

    public  static function DateTime(){
        return new \DateTime('now', self::getTimezone());
    }
    /**
     * @param string $timezone Set Timezone
     */
    private static function setTimezones(string $timezone){
        self::$timezone = $timezone;
    }

    /**
     * @return mixed Get Timezone
     */
    public static function getTimezone(){
        return  self::$timezone;
    }

    /**
     * @return false|string All Date
     */
    public static function get_complete_date(){
        self::getTimezone();
        return self::$date = date('d','m');
    }

    /**
     * @return false|string DateTime
     */
    public static function get_date_and_time(){
        self::getTimezone();
        $Time = new \DateTimeZone("Africa/Luanda");

        // Create two DateTime objects that will contain the same Unix timestamp, but
        // have different timezones attached to them.
        $Angola = new \DateTime("now", $Time);

        // Calculate the GMT offset for the date/time contained in the $dateTimeTaipei
        // object, but using the timezone rules as defined for Tokyo
        // ($dateTimeZoneJapan).
        // Should show int(32400) (for dates after Sat Sep 8 01:00:00 1951 JST).
        $month = date("m");
        $year = date("Y");
        $currDay =  date("d");
        return date("dmy", mktime(0,0,0,  $currDay, $month,$year));
    }

    /**
     * @return false|string Date
     */
    public static function getDate(string $opt = null){
        self::getTimezone();
        switch ($opt):
            case '-':
                return self::$date = date('Y-m-d');
                break;
            case '/':
                return self::$date = date('d/m/Y');
                break;
            default:
                return self::$date = date('Y-m-d');
        endswitch;
    }

    /**
     * @return false|string Day
     */
    public static function get_Day(){
        self::getTimezone();
        #return self::$date = date('d');
        $dateTime = new \DateTime('now', self::getTimezone());
        var_dump($dateTime);
    }

    /**
     * @return mixed Week
     */
    public static function get_Week(){
        self::getTimezone();
        return self::$week[self::$date = date('l')];
    }

    /**
     * @return false|string Year
     */
    public static function get_Year(){
        self::getTimezone();
        return self::$date = date('Y');
    }

    /**
     * @param string|null $opt
     * @return false|mixed|string Month
     */
    public static function get_Month(string $opt = null){
        self::getTimezone();
        switch ($opt):
            case 'm': return self::$date = date('m');
                break;
            case 'M': return self::$month[self::$date = date('m')];
                break;
            default:
                return self::$month[self::$date = date('m')];
        endswitch;
    }

    /**
     * @param $dias
     * @param $data
     * @return false|string Get date by Days
     */
    public static function get_date_by_days(int $dias, string $data){
        self::getTimezone();
        return self::$date = date('Y-m-d', strtotime("+$dias days", strtotime("$data")));
    }

    /**
     * @param string $opt
     * @param string $data
     * @return false|string Convert Date and Time From DB
     */
    public static function convert_date_from_db(string $opt, string $data){
        self::getTimezone();
        switch ($opt):
            case '/':
                return self::$date = date('d/m/Y', strtotime($data));
                break;
            case '-':
                return self::$date = date('Y-m-d', strtotime($data));
                break;
        endswitch;
    }

}