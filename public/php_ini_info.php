<?php
/**
 * Muestra información acerca del archivo php.ini
 */

$inipath = php_ini_loaded_file();
$logger = new Logger();

if ($inipath) {
     $logger->putLog('Loaded php.ini: ' . $inipath);
} else {
    $logger->putLog('A php.ini file is not loaded');
}

$logger->putLog('Max upload filesize: ' . ini_get('upload_max_filesize'));