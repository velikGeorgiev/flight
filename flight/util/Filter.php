<?php
/**
 * Flight: An extensible micro-framework.
 *
 * @author Velik Georgiev Chelebiev
 * @version 0.0.1
 * @license MIT License
 */
 
namespace flight\util;

class Filter {
    /**
     * Applys htmlspecialchars and addslshed to the given parameter.
     * If the parameter is an array walks throw it and apply the changes
     * to all elements.
     * 
     * It can be used to filter $_POST or/and $_GET. Example:
     * Filter::htmlChars($_POST);
     * Filter::htmlChars($_GET);
     *
     * @param mixed $data Variable that must be "filtered" by using htmlspecialchars and addslashes
     * @return mixed
     */
    public static function htmlChars(&$data) {
        if(is_array($data)) {
            foreach ($data as $key => $value) {
                $data[$key] = self::htmlChars($value);
            }
        } else {
            $data = htmlspecialchars(addslashes($data));
        }   
        
        return $data;
    }
    
    /**
     * Casts the given parameter to integer.
     * If array is passed walk the array and cast all
     * the elements recursive.
     * 
     * @param mixed $data Variable to be cast to int
     * @author Velik Georgiev Chelebiev <bulter2005@gmail.com>
     * @return int|array
     */
    public static function castNumber(&$data) {
        if(is_array($data)) {
            foreach ($data as $key => $value) {
                $data[$key] = self::castNumber($value);
            }
        } else {
            $data = (int)$data;
        }   
        
        return $data;
    }
}
?>
