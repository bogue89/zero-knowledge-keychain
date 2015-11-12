<?php
class ZKKSecurity 
{
    public $name = "Security";

    protected static $hash = "";
    protected static $error = false;
    protected static $error_description = "Error: string key needed";

	function _construct()
	{
		$this->initialize();
	}
    protected static function asciiFromString($string = ""){
        $ascii_values = "";
        $string = str_split($string);
        shuffle($string);
    
        foreach($string as $key => $value){
            $ascii_values .= ord($value);
        }
        

        return $ascii_values;
    }
    
    static public function hash($key = null){
        $time = time();
        if(is_string($key)){
            self::$hash = base64_encode(hash_hmac('md5', self::asciiFromString($key), self::asciiFromString("{$time}")));   
        } else {
            self::$error = true;
        }
        
        
        return self::$error ? self::$error_description : self::$hash;
    }
}
?>