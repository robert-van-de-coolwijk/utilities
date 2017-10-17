<?php

require_once __DIR__ . '/vendor/autoload.php';

error_reporting(E_ALL);

set_error_handler(function($errno, $errstr, $errfile, $errline){
    print_r([
        'error' => $errno,
        'message' => $errstr,
        'file' => $errfile,
        'line' => $errline
    ]);
});
