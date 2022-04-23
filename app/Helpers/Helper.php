<?php

namespace App\Helpers;

class Helper
{

    /**
     * Get client ip address
     *
     * @return string
     * @author Ankit Patel
     */
    public static function getClientIp()
    {
        return getenv('HTTP_CLIENT_IP') ?:
            getenv('HTTP_X_FORWARDED_FOR') ?:
                getenv('HTTP_X_FORWARDED') ?:
                    getenv('HTTP_FORWARDED_FOR') ?:
                        getenv('HTTP_FORWARDED') ?:
                            getenv('REMOTE_ADDR');

    }

    /**
     * Get user agent by using $_SERVER['HTTP_USER_AGENT']
     *
     * @return string
     * @author Ankit Patel
     */
    public static function userAgent()
    {
        return $_SERVER['HTTP_USER_AGENT'] ?? '';
    }

    /**
     * Sanitize input
     * Allows for static calling to allow simple validation.
     *
     * @return bool
     * @author Ankit Patel
     */
    public function sanitizeInput($data)
    {
        $data = trim($data);
        $data = strip_tags($data);
        $data = stripslashes($data);
        $data = trim($data);
        return $data;
    }

    /**
     * Sanitize array input
     * Allows for static calling to allow simple validation.
     *
     * @return array
     * @author Ankit Patel
     */
    public function sanitizeDeep($value)
    {
        return is_array($value) ? array_map(array($this, 'sanitizeDeep'), $value) : $this->sanitizeInput($value);
    }


    /**
     * Create dropdown
     *
     * @param  array   $arrayOfOptions
     * @param  string  $attributeName
     * @return string
     * @author Ankit Patel
     */
    public static function makeDropdown(array $arrayOfOptions, string $attributeName): string
    {
        $options = '<option>Select Option</option>';
        foreach ($arrayOfOptions as $singleOption) {
            $options .= "<option value='{$singleOption['id']}'>".$singleOption['val']."</option>";
        }
        return "<select class='form-select' id='ddlb_$attributeName' name ='ddlb_$attributeName'>
                    $options
                </select>";
    }
}
