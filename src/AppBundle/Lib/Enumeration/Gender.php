<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10.04.2018
 * Time: 17:22
 */

namespace AppBundle\Lib\Enumeration;


class Gender
{
    const MAN = 1;
    const WOMAN = 0;
    public static function getALL($array_flip=false)
    {
        $result = [
            self::MAN   => "М",
            self::WOMAN => "Ж"
        ];
        if ($array_flip){
            $result = array_flip($result);
        }
        return $result;
    }
}