<?php

use Service\Helper\Registry;
use Service\Helper\PathURL;

/*
 * Arquivo de definição de constantes disponíveis em toda a aplicacao
 */
//use Service\
//anders
//retorna o dir do projeto 'public' - /home/vagrant/scripts/dagoba/public
$pathHTML = dirname(realpath($_SERVER['SCRIPT_FILENAME']));
//retorna o path do dir application dentro do projeto
$pathAPP  = __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'aplicacao';
//retorna path dir "dagoba" nome da pasta do projeto
$path     = __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR;
//retorna URL completa do projeto dagoba no servidor
$url      = dirname($_SERVER['REQUEST_SCHEME']."://".$_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF']);
//definindo path do dir "application" dentro do projeto
defined('DAGOBA_PATH') || define('DAGOBA_PATH', $path);
//define constante do path dir do projeto "dagoba"
defined('APPLICATION_PATH') || define('APPLICATION_PATH', $pathAPP);
//definindo os path public - /home/vagrant/scripts/dagoba/public
defined('PATH_HTML') || define('PATH_HTML', $pathHTML);
//recupera a URL public da Aplicacao
defined('URL_HTML') || define('URL_HTML', $url);
//var_dump($pathHTML, $pathAPP, APPLICATION_PATH);
//parse_ini_file('config.ini', true);
$ini      = parse_ini_file($path.'/config/application.ini', TRUE);
//var_dump($ini);
$registry = Registry::getInstance();
//add na requisicao web
$registry->set('config', $ini);

//var_dump(PathURL::getPathClientes());
//var_dump(app_path(), base_path(), public_path(), storage_path());
//var_dump(ParseIniMulti::parse($pathAPP.'/config/application.ini'));
//var_dump(realpath(base_path('/config')).'/application.ini');
//die();
