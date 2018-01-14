<?php
/**
 * Redirige los errores de php al logger
 */

function customError($errno, $errstr, $errfile, $errline)
{
    $logger = new Logger();
    $logger->putLog('Error: [' . $errfile . ': ' . $errline . '] ' . $errstr);
}

set_error_handler("customError");