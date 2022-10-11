<?php


include_once  dirname(__DIR__) . '/vendor/autoload.php';


use Mercat\Core\conf\MercatConfig;
use Cose\persistence\PersistenceContext;
use Mercat\Core\notificaciones\backupBBDD\BackupBBDD;

//inicializamos cuentas core.
MercatConfig::getInstance()->initialize();
MercatConfig::getInstance()->initLogger( dirname(__FILE__).  "/log4php.xml");
				
$persistenceContext =  PersistenceContext::getInstance();


$notificacion = new BackupBBDD();
$notificacion->send();

//cerramos la conexión a la base.
$persistenceContext->close();
    



?>