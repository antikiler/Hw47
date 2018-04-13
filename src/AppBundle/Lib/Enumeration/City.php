<?php
namespace AppBundle\Lib\Enumeration;

class City
{
    public static function getALL($array_flip=false)
    {
        $result = [
            1 => 'Бишкек' ,
            2 => 'Ош',
            3  => 'Нарын',
            4 => 'Баткен',
        ];
        if ($array_flip){
            $result = array_flip($result);
        }
        return $result;
    }
}