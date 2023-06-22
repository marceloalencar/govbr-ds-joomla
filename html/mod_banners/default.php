<?php

/**
 * @package     Joomla.Site
 * @subpackage  mod_banners
 *
 * @copyright   (C) 2006 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;
use Joomla\CMS\Uri\Uri;
use Joomla\Component\Banners\Site\Helper\BannerHelper;

?>
<div class="row">
    <div class="col">
        <div class="br-carousel" data-circular="true" data-stage="in" data-mobile-nav="">
            <div class="carousel-button">
                <button class="br-button carousel-btn-prev terciary circle" type="button" aria-label="Anterior"><i class="fas fa-chevron-left" aria-hidden="true"></i>
                </button>
            </div>
            <div class="carousel-stage">
                <div class="carousel-page" active="active">
                <div class="carousel-content">
                    <div>Página 1</div>
                </div>
                </div>
                <div class="carousel-page">
                <div class="carousel-content">
                    <div>Página 2</div>
                </div>
                </div>
                <div class="carousel-page">
                <div class="carousel-content">
                    <div>Página 3</div>
                </div>
                </div>
                <div class="carousel-page">
                <div class="carousel-content">
                    <div>Página 4</div>
                </div>
                </div>
                <div class="carousel-page">
                <div class="carousel-content">
                    <div>Página 5</div>
                </div>
                </div>
            </div>
            <div class="carousel-button">
                <button class="br-button carousel-btn-next terciary circle" type="button" aria-label="Próximo"><i class="fas fa-chevron-right" aria-hidden="true"></i>
                </button>
            </div>
            <div class="carousel-step">
                <div class="br-step" data-initial="1" data-type="simple">
                <div class="step-progress">
                    <?php foreach ($list as $item) : ?>
                        <?php $alt = $item->params->get('alt'); ?>
                        <?php $alt = $alt ?: $item->name; ?>
                        <?php $alt = $alt ?: Text::_('MOD_BANNERS_BANNER'); ?>
                        <button class="step-progress-btn" type="button"><span class="step-info"><?php echo htmlspecialchars($alt, ENT_QUOTES, 'UTF-8'); ?></span></button>
                    <?php endforeach; ?>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
