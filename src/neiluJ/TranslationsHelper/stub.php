<?php

/**
 * This file is the stub used for tr-helper.phar
 */
Phar::mapPhar('tr-helper.phar');
include 'phar://tr-helper.phar/vendor/autoload.php';
$app = \neiluJ\TranslationsHelper\Application::autorun();
__HALT_COMPILER();