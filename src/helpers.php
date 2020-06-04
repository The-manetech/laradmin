<?php

use Laradmin\Laradmin;


if (!function_exists('clean_path')){

    function clean_path(string $path )
    {

        $path = str_replace('\\', '/', $path);

        $path = preg_replace('~//+~', '/', $path );

        $path = str_replace('/', DIRECTORY_SEPARATOR, $path);

        return $path;

    }

}


if (!function_exists('laradmin')){

    function laradmin()
    {

        return Laradmin::instance();

    }

}