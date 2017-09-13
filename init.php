<?php
// diretório base da aplicação
define('BASE_PATH', dirname(__FILE__));

// credenciais de acesso ao MySQL
define('MYSQL_HOST', 'localhost');
define('MYSQL_USER', 'root');
define('MYSQL_PASS', '!Lucas15345216');
define('MYSQL_DBNAME', 'php_crud');

// configurações do PHP
ini_set('default_charset','UTF-8');
error_reporting(E_ALL);
date_default_timezone_set('America/Sao_Paulo');
