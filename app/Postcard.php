<?php


namespace App;


class Postcard
{
    protected static function resolveFacade($name)
    {
        return app()[$name];
    }

    public static function __callStatic( $method, $arguments )
    {
        $instance = self::resolveFacade('Postcard');
        return dd($instance->$method(...$arguments));
    }
}