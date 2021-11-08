<?php
namespace app\controller\globals;

class consts extends cleaner
{
    const url = 'url';
    const author = 'Patrício Andrdae';
    const app = 'php_for_server';

    public static function _defined(): void
    {
        define('url', cleaner::filter(cleaner::get, self::url, cleaner::sanitize_url));
    }
}