<?php
namespace neiluJ\TranslationsHelper\Commands;

use Fwk\Xml\Exception;
use Fwk\Xml\XmlFile;
use neiluJ\TranslationsHelper\Formatter;
use neiluJ\TranslationsHelper\Xml\LegacyTsXmlMap;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class MigrateCommand extends Command
{
    protected function configure()
    {
        $this->setDescription('Migrates an eZ publish legacy translation file to a Symfony one.');
        $this->setName('migrate');
        $this->addArgument(
            'from',
            InputArgument::REQUIRED,
            'eZ Publish Legacy translation file (.ts)'
        );

        $this->addOption('lang', null, InputOption::VALUE_REQUIRED, 'Source language code (2 letters - ie: en, fr, de ...)');
        $this->addOption('format', null, InputOption::VALUE_OPTIONAL, 'Choose the output format: xliff, yaml or php', 'xliff');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $xmlFile    = new XmlFile($input->getArgument('from'));
        $map        = new LegacyTsXmlMap();
        $results    = $map->execute($xmlFile);
        $formatter  = new Formatter($input->getOption('format'));
        echo $formatter->execute($results, $input->getOption('lang'));
    }
}