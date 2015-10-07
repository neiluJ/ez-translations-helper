<?php
namespace neiluJ\TranslationsHelper\Xml;

use Fwk\Xml\Map;
use Fwk\Xml\Path;

class LegacyTsXmlMap extends Map
{
    public function __construct()
    {
        $newLinesFilters = function($line) {
            return str_replace("\n", " ", $line);
        };

        $this->add(
            Path::factory('/TS/context', 'contexts', array())
            ->addChildren(
                Path::factory('message', 'messages', array())
                    ->addChildren(Path::factory('source', 'source', null, $newLinesFilters))
                    ->addChildren(Path::factory('translation', 'translation', null, $newLinesFilters))
                ->loop(true)
            )
            ->loop(true, 'name')
        );
    }
}