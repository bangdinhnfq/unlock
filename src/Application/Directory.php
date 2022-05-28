<?php

namespace Bangdinhnfq\Unlock\Application;

class Directory
{
    public static function getViewDir(): string
    {
        return __DIR__ . '/../View/';
    }

    public static function getLogDir(): string
    {
        return __DIR__ . '/../../var/log/';
    }
}
