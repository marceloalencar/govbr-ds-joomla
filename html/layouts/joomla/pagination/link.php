<?php

/**
 * @package     Joomla.Site
 * @subpackage  Layout
 *
 * @copyright   (C) 2014 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Language\Text;

$item    = $displayData['data'];
$display = $item->text;
$app = Factory::getApplication();

switch ((string) $item->text) {
    // Check for "Prev" item
    case $item->text === Text::_('JPREV'):
        $item->text = Text::_('JPREVIOUS');
        $icon = 'fas fa-angle-left';
        $aria = Text::sprintf('JLIB_HTML_GOTO_POSITION', strtolower($item->text));
        break;

    // Check for "Next" item
    case Text::_('JNEXT'):
        $icon = 'fas fa-angle-right';
        $aria = Text::sprintf('JLIB_HTML_GOTO_POSITION', strtolower($item->text));
        break;

    default:
        $icon = null;
        $aria = Text::sprintf('JLIB_HTML_GOTO_PAGE', strtolower($item->text));
        break;
}

if ($icon !== null) {
    $display = '<i class="' . $icon . '" aria-hidden="true"></i>';
}

if ($displayData['active']) {
    if ($item->base > 0) {
        $limit = 'limitstart.value=' . $item->base;
    } else {
        $limit = 'limitstart.value=0';
    }

    $class = 'active';

    if ($app->isClient('site')) {
        $link = 'href="' . $item->link . '"';
    }
} else {
    $class = (property_exists($item, 'active') && $item->active) ? 'active' : 'disabled';
}

?>
<?php if ($displayData['active']) : ?>
    <li class="page">
        <a aria-label="<?php echo $aria; ?>" <?php echo $link; ?> class="page-link">
            <?php echo $display; ?>
        </a>
    </li>
<?php elseif (isset($item->active) && $item->active) : ?>
    <?php $aria = Text::sprintf('JLIB_HTML_PAGE_CURRENT', strtolower($item->text)); ?>
    <li class="page <?php echo $class; ?>">
        <a aria-current="true" aria-label="<?php echo $aria; ?>" href="#" class="page-link"><?php echo $display; ?></a>
    </li>
<?php else : ?>
    <li class="page <?php echo $class; ?>">
        <span class="page-link" aria-hidden="true"><?php echo $display; ?></span>
    </li>
<?php endif; ?>
