<?php

class FileUtility
{
    public static function writeToFile($filename, $data)
    {
        $handle = fopen($filename, 'w');
        if ($handle === false) {
            throw new Exception('Could not open file for writing');
        }
        fwrite($handle, $data);
        fclose($handle);
    }

    public static function readFromFile($filename)
    {
        $handle = fopen($filename, 'r');
        if ($handle === false) {
            throw new Exception('Could not open file for reading');
        }
        $data = stream_get_contents($handle);
        fclose($handle);
        return $data;
    }
}