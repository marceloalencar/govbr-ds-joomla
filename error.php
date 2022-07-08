<?php
defined('_JEXEC') or die;
?>
<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
    <head>
    <jdoc:include type="metas" />
        <jdoc:include type="styles" />
        <jdoc:include type="scripts" />
    </head>
    <body>
        <jdoc:include type="modules" name="top" />
        <jdoc:include type="component" />
        <jdoc:include type="modules" name="footer" />

        <jdoc:include type="modules" name="debug" style="none" />
    </body>
</html>