<?php
/**
 * Created by PhpStorm.
 * User: teppy
 * Date: 8/3/15
 * Time: 12:38 AM
 */


namespace Cascadeo\UserMessage;

/**
 * Class UserMessage
 * @package Cascadeo\UserMessage
 */
class UserMessage {

    // Error msgs start at 1000
    const GENERIC_ERROR = 1000;

    // Warning msgs start at 2000

    // Info msgs start at 3000

    private static $msgs = array(
        self::GENERIC_ERROR => "We're sorry but there was an error.  Please contact the administrator."
    );

    /**
     *
     * @param $msgKey
     * @param array $args
     * @return string
     */
    public static function getUserMessage($msgKey, array $args = array()) {
        return vsprintf(self::$msgs[$msgKey], $args);
    }
}