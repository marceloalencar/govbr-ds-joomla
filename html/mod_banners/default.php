<?php

/**
 * @package     Joomla.Site
 * @subpackage  mod_banners
 *
 * @copyright   (C) 2006 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;
use Joomla\CMS\Uri\Uri;
use Joomla\Component\Banners\Site\Helper\BannerHelper;

$wa = Factory::getApplication()->getDocument()->getWebAssetManager();
$wa->registerAndUseStyle('swiper-css', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.2/css/swiper.min.css');
$wa->registerAndUseScript('swiper-js', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.2/js/swiper.min.js');

$wa->addInlineScript("var swiper = new Swiper('.swiper-container', {
                        pagination: '.swiper-pagination',
                        nextButton: '.swiper-button-next',
                        prevButton: '.swiper-button-prev',
                        slidesPerView: 1,
                        paginationClickable: true,
                        spaceBetween: 30,
                        simulateTouch: false,
                        centeredSlides: true,
                        autoplay: 5000,
                        autoplayDisableOnInteraction: false,
                        loop: true
                      });");

$wa->addInlineStyle(".swiper-container { width: 1176px; }
                     .swiper-pagination-bullet { width: 20px; height: 20px; }
                     .swiper-pagination-bullet-active { background: #ffcd07; }");

?>
<!-- Swiper -->
<div class="swiper-container">
    <div class="swiper-wrapper">
    <?php foreach ($list as $item) : ?>
        <div class="swiper-slide d-flex text-center justify-content-center align-items-center">
            <?php $link = Route::_('index.php?option=com_banners&task=click&id=' . $item->id); ?>
            <?php if ($item->type == 1) : ?>
                <?php // Text based banners ?>
                <?php echo str_replace(['{CLICKURL}', '{NAME}'], [$link, $item->name], $item->custombannercode); ?>
            <?php else : ?>
                <?php $imageurl = $item->params->get('imageurl'); ?>
                <?php $width = $item->params->get('width'); ?>
                <?php $height = $item->params->get('height'); ?>
                <?php if (BannerHelper::isImage($imageurl)) : ?>
                    <?php // Image based banner ?>
                    <?php $baseurl = strpos($imageurl, 'http') === 0 ? '' : Uri::base(); ?>
                    <?php $alt = $item->params->get('alt'); ?>
                    <?php $alt = $alt ?: $item->name; ?>
                    <?php $alt = $alt ?: Text::_('MOD_BANNERS_BANNER'); ?>
                    <?php if ($item->clickurl) : ?>
                        <?php // Wrap the banner in a link ?>
                        <?php $target = $params->get('target', 1); ?>
                        <?php if ($target == 1) : ?>
                            <?php // Open in a new window ?>
                            <a
                                href="<?php echo $link; ?>" target="_blank" rel="noopener noreferrer"
                                title="<?php echo htmlspecialchars($item->name, ENT_QUOTES, 'UTF-8'); ?>">
                                <img
                                    src="<?php echo $baseurl . $imageurl; ?>"
                                    alt="<?php echo htmlspecialchars($alt, ENT_QUOTES, 'UTF-8'); ?>"
                                    <?php if (!empty($width)) {
                                        echo 'width="' . $width . '"';
                                    } ?>
                                    <?php if (!empty($height)) {
                                        echo 'height="' . $height . '"';
                                    } ?>
                                >
                            </a>
                        <?php elseif ($target == 2) : ?>
                            <?php // Open in a popup window ?>
                            <a
                                href="<?php echo $link; ?>" onclick="window.open(this.href, '',
                                    'toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=780,height=550');
                                    return false"
                                title="<?php echo htmlspecialchars($item->name, ENT_QUOTES, 'UTF-8'); ?>">
                                <img
                                    src="<?php echo $baseurl . $imageurl; ?>"
                                    alt="<?php echo htmlspecialchars($alt, ENT_QUOTES, 'UTF-8'); ?>"
                                    <?php if (!empty($width)) {
                                        echo 'width="' . $width . '"';
                                    } ?>
                                    <?php if (!empty($height)) {
                                        echo 'height="' . $height . '"';
                                    } ?>
                                >
                            </a>
                        <?php else : ?>
                            <?php // Open in parent window ?>
                            <a
                                href="<?php echo $link; ?>"
                                title="<?php echo htmlspecialchars($item->name, ENT_QUOTES, 'UTF-8'); ?>">
                                <img
                                    src="<?php echo $baseurl . $imageurl; ?>"
                                    alt="<?php echo htmlspecialchars($alt, ENT_QUOTES, 'UTF-8'); ?>"
                                    <?php if (!empty($width)) {
                                        echo 'width="' . $width . '"';
                                    } ?>
                                    <?php if (!empty($height)) {
                                        echo 'height="' . $height . '"';
                                    } ?>
                                >
                            </a>
                        <?php endif; ?>
                    <?php else : ?>
                        <?php // Just display the image if no link specified ?>
                        <img
                            src="<?php echo $baseurl . $imageurl; ?>"
                            alt="<?php echo htmlspecialchars($alt, ENT_QUOTES, 'UTF-8'); ?>"
                            <?php if (!empty($width)) {
                                echo 'width="' . $width . '"';
                            } ?>
                            <?php if (!empty($height)) {
                                echo 'height="' . $height . '"';
                            } ?>
                        >
                    <?php endif; ?>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
    </div>
    <!-- Add Pagination -->
    <div class="swiper-pagination"></div>
    <!-- Add Arrows -->
    <div class="swiper-button-prev swiper-button-white"></div>
    <div class="swiper-button-next swiper-button-white"></div>
</div>
