<?php
/**
 * Recibe las imágenes subidas por medio de la app móvil y las guarda en el
 * servidor
 */

require('imports.php');

// Permite peticiones por el método POST
header('Access-Control-Allow-Origin: *');

$logger = new Logger();
$uploads_path = 'uploads';
$new_path = $uploads_path . DIRECTORY_SEPARATOR
    . basename($_FILES['file']['name']);

function bytesToMegabytes($bytes)
{
    return round($bytes / 1024 / 1024, 2) . 'M';
}

$logger->putLog('Received size: ' . bytesToMegabytes($_FILES['file']['size']));

// Crea el directorio uploads en caso de que no exista
if (!file_exists($uploads_path)) {
    mkdir($uploads_path, 0777, true);
}

$tmp_name = $_FILES['file']['tmp_name'];

// Mueve el archivo a la carpeta uploads en caso de que se haya subido
if ($tmp_name) {
    if (move_uploaded_file($_FILES['file']['tmp_name'], $new_path)) {
        $logger->putLog('Upload and move success');
    } else {
        trigger_error('There was an error uploading the file');
    }
} else {
    trigger_error('The tmp_name is empty');
}
