<?php

/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_news
 *
 * @copyright   (C) 2006 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Layout\LayoutHelper;

if (!$list) {
    return;
}

$colunas = "col-md-4";
if (count($list) < 5) :
    if (count($list) % 2 == 0) :
        $colunas = "col-md-6";
    endif;
endif;

?>
<div class="container">
    <div class="newsflash row">
        <?php foreach ($list as $item) : ?>
            <?php if (!empty($item->imageSrc)) : ?>
                <div class="newsflash-item <?php echo $colunas; ?>">
                    <div class="newsflash-container">
                        <a href="<?php echo $item->link; ?>" title="<?php echo $item->title; ?>">
                            <?php echo LayoutHelper::render(
                                'joomla.html.image',
                                [
                                    'src' => $item->imageSrc,
                                    'alt' => $item->imageAlt,
                                ]
                            ); ?>
                        </a>
                        <h2 class="newsflash-title">
                            <a href="<?php echo $item->link; ?>">
                                <?php echo $item->title; ?>
                            </a>
                        </h2>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</div>
