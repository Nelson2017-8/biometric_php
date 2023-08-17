<?php


function ErrorHandler($errno, $errstr, $errfile, $errline) {
    //$mensaje = "Error [$errno]: $errstr en $errfile línea $errline";
    //error_log($mensaje, 0);

    if (!file_exists('logs/log.txt')) {
        mkdir(__DIR__.'/logs', 0777, true);
        touch(__DIR__.'/logs/log');
    }

    $mensaje = "Error [$errno]: $errstr en $errfile línea $errline";
    error_log($mensaje . "\n", 3, __DIR__."/logs/log");
}