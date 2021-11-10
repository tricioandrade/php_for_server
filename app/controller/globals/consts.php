<?php
namespace app\controller\globals;

use app\controller\globals\cleaner;

class consts extends cleaner
{
    const url = 'url';
    const author = 'Patrício Andrdae';
    const app = 'php_for_server';
    const server = 'http://localhost/';
    const dashboard_link = self::server.'request/';

    const sale = 'sales/';
    const invoice = 'invoice/';

    public static function _defined(): void
    {
        define('server', self::server);
        define('url', cleaner::filter(cleaner::get, self::url, cleaner::sanitize_url));
    }
}