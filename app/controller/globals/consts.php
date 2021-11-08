<?php
namespace app\controller\globals;

use app\controller\globals\cleaner;

class consts extends cleaner
{
    const url = 'url';
    const author = 'Patrício Andrdae';
    const app = 'Outono';
    const icon = 'app/view/img/icon/outono.png';
    const img_url = 'app/view/img/';
    const server = 'http://localhost/outonob1/';
    const dashboard_link = self::server.'request/';

    const sale = 'sales/';
    const invoice = 'invoice/';

    public static function _defined(): void
    {
        define('server', self::server);
        define('img_url', server.self::img_url);
        define('url', cleaner::filter(cleaner::get, self::url, cleaner::sanitize_url));
        define('author', 'Patrício Andrade');
        define('loginlink', self::server.'_blank/login/');
        define('outonologo', img_url.'icon/outonologo.png');
        define('carouselimages', img_url.'carousel/');
        define('dashlink', self::dashboard_link);
        define('icon', self::icon);
        define('sale', self::sale);
        define('invoice', self::invoice);
        #define('icon', self::icon);
        #define('icon', self::icon);
    }
}