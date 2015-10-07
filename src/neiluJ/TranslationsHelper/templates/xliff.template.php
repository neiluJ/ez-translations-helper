<?xml version="1.0" ?>
<xliff version="1.2" xmlns="urn:oasis:names:tc:xliff:document:1.2">
    <file source-language="<?php echo $sourceLanguage; ?>" datatype="plaintext" original="file.ext">
        <!-- Generated by ez-translations-helper on <?php echo date('Y-m-d'); ?> at <?php echo date('H:i:s'); ?> -->
        <body>
<?php foreach ($results['contexts'] as $ctxName => $data): ?>

                <!-- Context: <?php echo $ctxName; ?> -->
    <?php foreach ($data['messages'] as $idx => $msg): ?>
            <trans-unit id="<?php echo $ctxName .'_'. $idx; ?>">
                    <source><?php echo $msg['source'] ?></source>
                    <target><?php echo $msg['translation'] ?></target>
                </trans-unit>
    <?php endforeach; ?>
<?php endforeach; ?>
        </body>
    </file>
</xliff>
