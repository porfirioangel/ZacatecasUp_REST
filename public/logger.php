<?php
/**
 * Class Logger
 * Permite registrar y obtener mensajes en un archivo de texto
 */
class Logger
{
    private $file;

    public function __construct()
    {
        $this->file = 'log';
    }

    private function getDate()
    {
        return '[' . date('d/m/Y H:i:s') . '] ';
    }

    public function putLog($insert)
    {
        $myfile = fopen($this->file, "a+");
        fwrite($myfile, PHP_EOL . $this->getDate() . $insert);
        fclose($myfile);
    }

    public function getLog()
    {
        $content = @file_get_contents($this->file);
        return $content;
    }
}
