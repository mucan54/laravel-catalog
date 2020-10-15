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
        if (strpos($req->input('str'), '-') !== FALSE)
            {
            $val = explode("-",$req->input('str'));
            }
            else{
                array_push($val,$req->input('str'));
            }
        } 
        return $val;
    }
}