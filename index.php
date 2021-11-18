<?php

require_once __DIR__.'/vendor/autoload.php';

use app\controller\globals\consts;
use app\controller\routes\app as RoutesApp;

#ini_set('allow_url_include', 'On');
#ini_set('display_errors',1);
#error_reporting(E_ALL);

session_start();
        
const host = 'localhost:3306';
const user = 'root';
const database = 'test';
const password = '';
const charset = 'utf8';

consts::_defined();

new RoutesApp();

