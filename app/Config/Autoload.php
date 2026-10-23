<?php

namespace Config;

use CodeIgniter\Config\AutoloadConfig;

class Autoload extends AutoloadConfig
{
    // WAJIB DITARUH DI PALING ATAS
    public $composerAutoload = true;


    public $psr4 = [
        APP_NAMESPACE => APPPATH,
        'Config'      => APPPATH . 'Config',
    ];

    public $classmap = [];

    public $files = [];

    public $helpers = ['session'];
}
