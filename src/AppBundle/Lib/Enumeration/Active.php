<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10.04.2018
 * Time: 17:24
 */

namespace AppBundle\Lib\Enumeration;


class Active
{
    const ACTIVE    = 1;
    const NO_ACTIVE = 0;
    public static function getALL($array_flip=false)
    {
        $result = [
            self::ACTIVE    => "Да",
            self::NO_ACTIVE => "Нет"
        ];
        if ($array_flip){
            $result = array_flip($result);
        }
        return $result;
    }
}