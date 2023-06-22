<?php

/**
 * @package     Joomla.Site
 * @subpackage  Layout
 *
 * @copyright   (C) 2019 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 *
 * html5 (chosen html5 tag and font header tags)
 */

defined('_JEXEC') or die;

$module  = $displayData['module'];
$params  = $displayData['params'];

if ((string) $module->content === '') {
    return;
}

$linktype = '<span class="content">' . $module->title . '</span>';

if ($params->get('class_sfx', ''))
{
    $linktype = '<span class="icon"><i class="' . htmlspecialchars($params->get('class_sfx', ''), ENT_QUOTES, 'UTF-8') . '" aria-hidden="true"></i></span>' . $linktype;
}

$linktype = '<a class="menu-item" href="javascript: void(0)">' . $linktype . '</a>';
?>

<div class="menu-folder">
    <?php echo $linktype; ?>
    <?php echo $module->content; ?>
</div>
