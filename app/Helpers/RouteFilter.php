<?php // Code within app\Helpers\Helper.php

namespace App\Helpers;

class RouteFilter
{
    public static function routeGenerate(string $string, array $array)
    {
        return strtoupper($string);
    }

    public static function valGenerator($req){

        $val=[];
        if($req->input('str') !== null)
        {
            $val=unserialize(urldecode($req->input('str')));
        } 
        return $val;
    }


    public static function urlParameters($index, $parameter, $array){

            $pos = array_search($parameter, $array[$index]);
            unset($array[$index][$pos]);
        
        return urlencode(serialize($array));
    }

    public static function urlNewParameter($index, $parameter, $req){

        $array=[];
        if($req->input('str') !== null){

            $array=unserialize(urldecode($req->input('str')));
        } 
        $array[$index][]=$parameter;

        return urlencode(serialize($array));
    }
}