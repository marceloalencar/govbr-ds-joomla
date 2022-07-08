<?php
defined('_JEXEC') or die;

use Joomla\CMS\Factory;

$app = Factory::getApplication();
$wa  = $this->getWebAssetManager();

$wa->registerAndUseStyle('font-rawline', 'media/templates/site/govbr-ds/css/rawline.css');
$wa->registerAndUseStyle('dsgov-core-css', 'media/templates/site/govbr-ds/css/core.css');
$wa->useStyle("fontawesome");
$wa->registerAndUseScript('dsgov-core-js', 'media/templates/site/govbr-ds/js/core-init.js');

$largura = $this->params->get('largura') ? 'container-fluid' : 'container-lg';
?>
<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
    <head>
    <jdoc:include type="metas" />
        <jdoc:include type="styles" />
        <jdoc:include type="scripts" />
    </head>
    <body>
        <div class="template-base">

            <jdoc:include type="modules" name="top" />
            <jdoc:include type="component" />
            <jdoc:include type="modules" name="footer" />
            <footer class="br-footer pt-3" id="footer">
                <div class="<?php echo $largura ?>">
                    <div class="info">
                        <div class="text-down-01 text-medium pb-3">
                            <?php echo $this->params->get('texto_licenca', 'Desenvolvido com o CMS de c&oacute;digo aberto <strong><a aria-label="Desenvolvido por Comunidade Joomla" href="https://www.joomla.org">Joomla</a></strong>.'); ?>
                        </div>
                    </div>
                </div>
            </footer>
            <jdoc:include type="modules" name="debug" style="none" />
        </div>
    </body>
</html>