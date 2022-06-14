<?php

namespace Bangdinhnfq\Unlock\Service;

use Bangdinhnfq\Unlock\Application\Directory;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class LoggerService
{
    const DEFAULT_LOGGER_FILE_NAME = 'app.log';
    const DEFAULT_LOGGER_CHANNEL = 'app';

    /**
     * @var Logger
     */
    private static Logger $logger;

    /**
     * @param string $channel
     * @return Logger
     */
    public static function getLogger(string $channel = self::DEFAULT_LOGGER_CHANNEL): Logger
    {
        if (empty(static::$logger)) {
            static::$logger = new Logger($channel);
            $logFilePath = Directory::getLogDir() . static::DEFAULT_LOGGER_FILE_NAME;
            static::$logger->pushHandler(new StreamHandler($logFilePath, Logger::DEBUG));
        }
        return static::$logger;
    }
}
