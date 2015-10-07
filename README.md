# TranslationsHelper

This is a small utility that helps to migrate eZ Publish Legacy (4.x) translations files (.ts) into Symfony-compatibles ones.

Note: Generated files should ALWAYS be checked by the developer as some errors are possible depending on the complexity of the original translations, CDATAs and Html entities.
You can check the validity of your file within your eZ/Symfony installation:

```
php ezpublish/console debug:translation <language code> <your bundle name>
```

## Installation

``` 
php composer.phar require neiluj/ez-translations-helper
```

## Usage

``` 
php bin/tr-helper.php migrate <legacy_file.ts> --lang=<language code> >> <output file>
```

Note: If you have ```short_open_tag``` set to ```On``` (which is deprecated btw) you might run the script like this:

```
php -dshort_open_tag=Off migrate <legacy_file.ts> --lang=<language code> >> <output file>
```

### Examples

``` 
php bin/tr-helper.php migrate /path/to/ezpublish_legacy/extension/mysite/translations/fre-FR/translation.ts --lang=fr >> src/MySite/SiteBundle/Resources/translations/messages.fr.xliff
```

or with Phar:

``` 
php tr-helper.phar migrate /path/to/ezpublish_legacy/extension/mysite/translations/fre-FR/translation.ts --lang=fr >> src/MySite/SiteBundle/Resources/translations/messages.fr.xliff
```

## Parameters

Output format:
```
--format (xliff default, yaml or php)
```
Note that XLIFF is recommended as it'll prevent a lot of conversion errors (duplicate keys for example).

Defines the input language (2 chars: fr, de, en ...). Mostly required for XLIFF.
```
--lang (language identifier - 2 chars)
```

## Build a Phar

You can compile this tool into a simple Phar archive to be executed wherever you need it:

``` 
php -dphar.readonly=0 vendor/neiluj/phactory/bin/phactory.phar make . tr-helper  --vendors --stub=src/neiluJ/TranslationsHelper/stub.php
```


