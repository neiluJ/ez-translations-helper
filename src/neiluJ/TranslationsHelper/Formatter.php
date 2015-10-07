<?php
namespace neiluJ\TranslationsHelper;



class Formatter
{
    const FORMAT_XLIFF  = 'xliff';
    const FORMAT_YAML   = 'yaml';
    const FORMAT_PHP    = 'php';

    protected $format   = self::FORMAT_XLIFF;

    public function __construct($format = null)
    {
        if (null === $format) {
            $format = self::FORMAT_XLIFF;
        }

        $formats = array(self::FORMAT_XLIFF, self::FORMAT_PHP, self::FORMAT_YAML);
        if (!in_array(strtolower($format), $formats)) {
            throw new \RuntimeException(
                sprintf('Invalid translation format. Should be one of: %s', implode(', ', $formats))
            );
        }

        $this->format = strtolower($format);
    }

    public function execute($results, $sourceLanguage)
    {
        $tpl = __DIR__ . DIRECTORY_SEPARATOR .'templates'. DIRECTORY_SEPARATOR . $this->format .'.template.php';
        if (!is_file($tpl)) {
            throw new \RuntimeException(sprintf('Format template not found: %s', $tpl));
        }

        ob_start();
        include $tpl;
        $contents = ob_get_contents();
        ob_end_clean();

        return $contents;
    }
}
