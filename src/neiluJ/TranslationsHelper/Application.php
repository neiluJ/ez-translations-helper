<?php
namespace neiluJ\TranslationsHelper;

use neiluJ\TranslationsHelper\Commands\MigrateCommand;
use Symfony\Component\Console\Application as BaseConsoleApp;

/**
 */
class Application extends BaseConsoleApp
{
    const APP_NAME = 'TranslationsHelper';
    const APP_VERSION = '1.0';

    /**
     * Constructor wrapper
     *
     * @return void
     */
    public function __construct($name = self::APP_NAME, $version = self::APP_VERSION)
    {
        parent::__construct($name, $version);
        $this->add(new MigrateCommand());
    }

    /**
     * Shortcut method
     *
     * @return integer
     */
    public static function autorun()
    {
        $class = new self;
        return $class->run();
    }
}