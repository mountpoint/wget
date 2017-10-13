<?php

require_once __DIR__ . '/../vendor/autoload.php';

$wget = new \Mountpoint\Wget\Wget();
echo $wget
    ->help()
    ->exec()
    ->getOutput()
;
