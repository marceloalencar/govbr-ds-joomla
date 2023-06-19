<?php
defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;

$app = Factory::getApplication();
$wa  = $this->getWebAssetManager();

$wa->registerAndUseStyle('font-rawline', 'https://fonts.cdnfonts.com/css/rawline');
$wa->registerAndUseStyle('dsgov-core-css', 'media/templates/site/govbr-ds/css/core.css');
$wa->registerAndUseStyle('fontawesome-all', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css');
$wa->registerAndUseStyle('dsgov-custom', 'media/templates/site/govbr-ds/css/custom.css');
$wa->registerAndUseScript('dsgov-core-js', 'media/templates/site/govbr-ds/js/core-init.js');
$wa->registerAndUseScript('dsgov-contrast-js', 'media/templates/site/govbr-ds/js/contrast.class.js');

$this->addHeadLink(HTMLHelper::_('image', 'media/templates/site/govbr-ds/favicons/apple-touch-icon.png', '', [], false, 1), 'apple-touch-icon', 'rel', ['sizes' => '180x180']);
$this->addHeadLink(HTMLHelper::_('image', 'media/templates/site/govbr-ds/favicons/favicon-32x32.png', '', [], false, 1), 'icon', 'rel', ['type' => 'image/png', 'sizes' => '32x32']);
$this->addHeadLink(HTMLHelper::_('image', 'media/templates/site/govbr-ds/favicons/favicon-16x16.png', '', [], false, 1), 'icon', 'rel', ['type' => 'image/png', 'sizes' => '16x16']);
$this->addHeadLink(HTMLHelper::_('image', 'media/templates/site/govbr-ds/favicons/manifest.json', '', [], false, 1), 'manifest', 'rel', []);
$this->addHeadLink(HTMLHelper::_('image', 'media/templates/site/govbr-ds/favicons/safari-pinned-tab.svg', '', [], false, 1), 'mask-icon', 'rel', ['color' => '#00a300']);
$this->setMetaData('msapplication-config', 'media/templates/site/govbr-ds/favicons/browserconfig.xml');
$this->setMetaData('theme-color', '#00a300');

$largura = $this->params->get('largura') ? 'container-fluid' : 'container-lg';
$tipomenu = $this->params->get('tipomenu') ? 'br-menu push' : 'br-menu';
$cor_footer = $this->params->get('cor_footer') ? 'br-footer inverted pt-3' : 'br-footer pt-3';
$logo_footer = $this->params->get('cor_footer') ? 'media/templates/site/govbr-ds/img/logo.svg' : 'media/templates/site/govbr-ds/img/logo_footer.svg';
?>
<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
    <head>
        <jdoc:include type="metas" />
        <jdoc:include type="styles" />
    </head>
    <body>
        <div class="template-base">
            <nav class="br-skiplink">
                <a class="br-item" href="#main-content" accesskey="1">Ir para o conteúdo (1/4) <span class="br-tag text ml-1">1</span></a>
                <a class="br-item" href="#header-navigation" accesskey="2">Ir para o menu (2/4) <span class="br-tag text ml-1">2</span></a>
                <a class="br-item" href="#main-searchbox" accesskey="3">Ir para a busca (3/4) <span class="br-tag text ml-1">3</span></a>
                <a class="br-item" href="#footer" accesskey="4">Ir para o rodapé (4/4) <span class="br-tag text ml-1">4</span></a>
            </nav>

            <header class="br-header mb-4" id="header" data-sticky="data-sticky">
                <div class="<?php echo $largura ?>">
                    <div class="header-top">
                        <div class="header-logo">
                            <img src="<?php echo $this->params->get('imagem_logo', 'media/templates/site/govbr-ds/img/logo.svg'); ?>" alt="logo"/>
                            <span class="br-divider vertical mx-half mx-sm-1"></span>
                            <div class="header-sign"><?php echo $this->params->get('texto_assinatura', 'Assinatura'); ?></div>
                        </div>
                        <div class="header-actions">
                            <?php if ($this->countModules('menuacesso')) : ?>
                                <div class="header-links dropdown">
                                    <button class="br-button circle small" type="button" data-toggle="dropdown" aria-label="Abrir Acesso Rápido"><i class="fas fa-ellipsis-v" aria-hidden="true"></i></button>
                                    <div class="br-list">
                                        <div class="header">
                                            <div class="title">Acesso Rápido</div>
                                        </div>
                                        <jdoc:include type="modules" name="menuacesso" style="none" />
                                    </div>
                                </div>
                                <span class="br-divider vertical mx-half mx-sm-1"></span>
                            <?php endif; ?>
                            <div class="header-functions dropdown">
                                <button class="br-button circle small" type="button" data-toggle="dropdown" aria-label="Abrir Funcionalidades do Sistema"><i class="fas fa-th" aria-hidden="true"></i>
                                </button>
                                <div class="br-list">
                                    <div class="header">
                                        <div class="title">Funcionalidades do Sistema</div>
                                    </div>
                                    <div class="align-items-center br-item">
                                        <button class="br-button circle small" type="button" aria-label="Alto contraste" onclick="window.toggleContrast()" onkeydown="window.toggleContrast()"><i class="fas fa-adjust" aria-hidden="true"></i><span class="text">Alto contraste</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <?php if ($this->countModules("search")) : ?>
                                <div class="header-search-trigger">
                                    <button class="br-button circle" type="button" aria-label="Abrir Busca" data-toggle="search" data-target=".header-search"><i class="fas fa-search" aria-hidden="true"></i>
                                    </button>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="header-bottom">
                        <div class="header-menu">
                            <div class="header-menu-trigger" id="header-navigation">
                                <button class="br-button small circle" type="button" aria-label="Menu" data-toggle="menu" data-target="#main-navigation" id="navigation"><i class="fas fa-bars" aria-hidden="true"></i>
                                </button>
                            </div>
                            <div class="header-info">
                                <a href="<?php echo JURI::root(); ?>" title="<?php echo $this->params->get('texto_titulo', 'Template básico'); ?>">
                                    <div class="header-title"><?php echo $this->params->get('texto_titulo', 'Template básico'); ?></div>
                                    <div class="header-subtitle"><?php echo $this->params->get('texto_subtitulo', 'Subtítulo do Header'); ?></div>
                                </a>
                            </div>
                        </div>
                        <jdoc:include type="modules" name="search" style="none" />
                    </div>
                </div>
            </header>

            <main class="d-flex flex-fill mb-5" id="main">
                <div class="<?php echo $largura ?>">
                    <div class="row">
                        <div class="<?php echo $tipomenu?>" id="main-navigation">
                            <div class="menu-container">
                                <div class="menu-panel">
                                    <div class="menu-header">
                                        <div class="menu-title"><img src="<?php echo $this->params->get('imagem_logo', 'media/templates/site/govbr-ds/img/logo.svg'); ?>" alt="Imagem ilustrativa"/><span><?php echo $this->params->get('texto_titulo', 'Template básico'); ?></span></div>
                                        <div class="menu-close">
                                            <button class="br-button circle" type="button" aria-label="Fechar o menu" data-dismiss="menu"><i class="fas fa-times" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <nav class="menu-body">
                                        <div class="menu-folder">
                                            <a class="menu-item" href="javascript: void(0)"><span class="icon"><i class="fas fa-bell" aria-hidden="true"></i></span><span class="content">Nível 1</span></a>
                                            <ul>
                                                <li><a class="menu-item" href="javascript: void(0)"><span class="icon"><i class="fas fa-heart" aria-hidden="true"></i></span><span class="content">Nível 2</span></a></li>
                                                <li>
                                                    <a class="menu-item" href="javascript: void(0)"><span class="icon"><i class="fas fa-address-book" aria-hidden="true"></i></span><span class="content">Nível 2</span></a>
                                                    <ul>
                                                        <li><a class="menu-item" href="javascript: void(0)"><span class="icon"><i class="fas fa-book" aria-hidden="true"></i></span><span class="content">Nível 3</span></a></li>
                                                        <li>
                                                            <a class="menu-item" href="javascript: void(0)"><span class="icon"><i class="fas fa-tree" aria-hidden="true"></i></span><span class="content">Nível 3</span></a>
                                                            <ul>
                                                                <li><a class="menu-item" href="javascript: void(0)"><span class="content">Nível 4</span></a></li>
                                                                <li><a class="menu-item" href="javascript: void(0)"><span class="content">Nível 4</span></a></li>
                                                                <li><a class="menu-item" href="javascript: void(0)"><span class="content">Nível 4</span></a></li>
                                                            </ul>
                                                        </li>
                                                        <li><a class="menu-item" href="javascript: void(0)"><span class="icon"><i class="fas fa-moon" aria-hidden="true"></i></span><span class="content">Nível 3</span></a></li>
                                                    </ul>
                                                </li>
                                                <li><a class="menu-item" href="javascript: void(0)"><span class="icon"><i class="fas fa-archive" aria-hidden="true"></i></span><span class="content">Nível 2</span></a></li>
                                            </ul>
                                        </div>
                                        <div class="menu-folder">
                                            <a class="menu-item" href="javascript: void(0)"><span class="icon"><i class="fas fa-bell" aria-hidden="true"></i></span><span class="content">Nível 1</span></a>
                                            <ul>
                                                <li><a class="menu-item" href="javascript: void(0)"><span class="icon"><i class="fas fa-heart" aria-hidden="true"></i></span><span class="content">Nível 2</span></a></li>
                                                <li>
                                                    <a class="menu-item" href="javascript: void(0)"><span class="icon"><i class="fas fa-address-book" aria-hidden="true"></i></span><span class="content">Nível 2</span></a>
                                                    <ul>
                                                        <li><a class="menu-item" href="javascript: void(0)"><span class="icon"><i class="fas fa-book" aria-hidden="true"></i></span><span class="content">Nível 3</span></a></li>
                                                        <li>
                                                            <a class="menu-item" href="javascript: void(0)"><span class="icon"><i class="fas fa-tree" aria-hidden="true"></i></span><span class="content">Nível 3</span></a>
                                                            <ul>
                                                                <li><a class="menu-item" href="javascript: void(0)"><span class="content">Nível 4</span></a></li>
                                                                <li><a class="menu-item" href="javascript: void(0)"><span class="content">Nível 4</span></a></li>
                                                                <li><a class="menu-item" href="javascript: void(0)"><span class="content">Nível 4</span></a></li>
                                                            </ul>
                                                        </li>
                                                        <li><a class="menu-item" href="javascript: void(0)"><span class="icon"><i class="fas fa-moon" aria-hidden="true"></i></span><span class="content">Nível 3</span></a></li>
                                                    </ul>
                                                </li>
                                                <li><a class="menu-item" href="javascript: void(0)"><span class="icon"><i class="fas fa-archive" aria-hidden="true"></i></span><span class="content">Nível 2</span></a></li>
                                            </ul>
                                        </div>
                                        <div class="menu-folder">
                                            <a class="menu-item" href="javascript: void(0)"><span class="icon"><i class="fas fa-bell" aria-hidden="true"></i></span><span class="content">Nível 1</span></a>
                                            <ul>
                                                <li><a class="menu-item" href="javascript: void(0)"><span class="icon"><i class="fas fa-heart" aria-hidden="true"></i></span><span class="content">Nível 2</span></a></li>
                                                <li>
                                                    <a class="menu-item" href="javascript: void(0)"><span class="icon"><i class="fas fa-address-book" aria-hidden="true"></i></span><span class="content">Nível 2</span></a>
                                                    <ul>
                                                        <li><a class="menu-item" href="javascript: void(0)"><span class="icon"><i class="fas fa-book" aria-hidden="true"></i></span><span class="content">Nível 3</span></a></li>
                                                        <li>
                                                            <a class="menu-item" href="javascript: void(0)"><span class="icon"><i class="fas fa-tree" aria-hidden="true"></i></span><span class="content">Nível 3</span></a>
                                                            <ul>
                                                                <li><a class="menu-item" href="javascript: void(0)"><span class="content">Nível 4</span></a></li>
                                                                <li><a class="menu-item" href="javascript: void(0)"><span class="content">Nível 4</span></a></li>
                                                                <li><a class="menu-item" href="javascript: void(0)"><span class="content">Nível 4</span></a></li>
                                                            </ul>
                                                        </li>
                                                        <li><a class="menu-item" href="javascript: void(0)"><span class="icon"><i class="fas fa-moon" aria-hidden="true"></i></span><span class="content">Nível 3</span></a></li>
                                                    </ul>
                                                </li>
                                                <li><a class="menu-item" href="javascript: void(0)"><span class="icon"><i class="fas fa-archive" aria-hidden="true"></i></span><span class="content">Nível 2</span></a></li>
                                            </ul>
                                        </div>
                                        <a class="menu-item divider" href="javascript: void(0)"><span class="icon"><i class="fas fa-bell" aria-hidden="true"></i></span><span class="content">Item de nível 1</span></a><a class="menu-item divider" href="javascript: void(0)"><span class="icon"><i class="fas fa-bell" aria-hidden="true"></i></span><span class="content">Item de nível 1</span></a>
                                    </nav>
                                    <div class="menu-footer">
                                        <div class="menu-logos"><img src="data:image/png;base64,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" alt="Imagem ilustrativa"/><img src="data:image/png;base64,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" alt="Imagem ilustrativa"/></div>
                                        <div class="menu-links"><a href="javascript: void(0)"><span class="mr-1">Link externo 1</span><i class="fas fa-external-link-square-alt" aria-hidden="true"></i></a><a href="javascript: void(0)"><span class="mr-1">Link externo 2</span><i class="fas fa-external-link-square-alt" aria-hidden="true"></i></a></div>
                                        <div class="menu-social">
                                            <div class="text-semi-bold mb-1">Redes Sociais</div>
                                            <div class="sharegroup">
                                                <div class="share"><a class="br-button circle" href="javascript: void(0)" aria-label="Compartilhar por Facebook"><i class="fab fa-facebook-f" aria-hidden="true"></i></a></div>
                                                <div class="share"><a class="br-button circle" href="javascript: void(0)" aria-label="Compartilhar por Twitter"><i class="fab fa-twitter" aria-hidden="true"></i></a></div>
                                                <div class="share"><a class="br-button circle" href="javascript: void(0)" aria-label="Compartilhar por Linkedin"><i class="fab fa-linkedin-in" aria-hidden="true"></i></a></div>
                                                <div class="share"><a class="br-button circle" href="javascript: void(0)" aria-label="Compartilhar por Whatsapp"><i class="fab fa-whatsapp" aria-hidden="true"></i></a></div>
                                            </div>
                                        </div>
                                        <div class="menu-info">
                                            <div class="text-center text-down-01">Todo o conteúdo deste site está publicado sob a licença <strong>Creative Commons Atribuição-SemDerivações 3.0</strong></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="menu-scrim" data-dismiss="menu" tabindex="0"></div>
                            </div>
                        </div>
                        <div class="col">
                            <jdoc:include type="modules" name="breadcrumbs" />
                            <div class="main-content pl-sm-3" id="main-content">
                                <jdoc:include type="message" />
                                <jdoc:include type="component" />
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="<?php echo $cor_footer ?>" id="footer">
				<div class="<?php echo $largura ?>">
					<div class="logo"><img src="<?php echo $this->params->get('imagem_logo_footer', $logo_footer); ?>" alt="Imagem"/></div>
                    <?php if ($this->countModules('menumapa')) : ?>
                        <div class="br-list horizontal" data-toggle="data-toggle" data-sub="data-sub">
                            <jdoc:include type="modules" name="menumapa" style="none" />
                        </div>
                    <?php endif; ?>
					<div class="d-none d-sm-block">
						<div class="row align-items-end justify-content-between py-5">
							<div class="col social-network">
								<p class="text-up-01 text-extra-bold text-uppercase">Redes Sociais</p>
									<a class="mr-3" href="javascript:void(0);"><img src="media/templates/site/govbr-ds/img/img-round.png" alt="Image"/></a>
									<a class="mr-3" href="javascript:void(0);"><img src="media/templates/site/govbr-ds/img/img-round.png" alt="Image"/></a>
									<a class="mr-3" href="javascript:void(0);"><img src="media/templates/site/govbr-ds/img/img-round.png" alt="Image"/></a>
									<a class="mr-3" href="javascript:void(0);"><img src="media/templates/site/govbr-ds/img/img-round.png" alt="Image"/></a>
							</div>
							<div class="col assigns text-right">
								<?php if ($this->params->get('imagem_footer_acesso', '1')) : ?>
									<a href="https://www.gov.br/acessoainformacao"><img class="ml-4" src="<?php echo $this->params->get('cor_footer') ? 'media/templates/site/govbr-ds/img/acesso_footer_claro.svg' : 'media/templates/site/govbr-ds/img/acesso_footer.svg'; ?>" alt="Acesso a Informação"/></a>
								<?php endif; ?>
								<?php if ($this->params->get('imagem_footer_brasil', '1')) : ?>
									<a href="https://www.gov.br/"><img class="ml-4" src="<?php echo $this->params->get('imagem_footer_brasil_src', 'media/templates/site/govbr-ds/img/brasil_footer.svg')?>" alt="Imagem"/></a>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
				<span class="br-divider my-3"></span>
                <div class="<?php echo $largura ?>">
                    <div class="info">
                        <div class="text-down-01 text-medium pb-3">
                            <?php echo $this->params->get('texto_licenca', 'Desenvolvido com o CMS de c&oacute;digo aberto <strong><a aria-label="Desenvolvido por Comunidade Joomla" href="https://www.joomla.org">Joomla</a></strong>.'); ?>
                        </div>
                    </div>
                </div>
            </footer>

            <div class="br-cookiebar default d-none" tabindex="-1"></div>
            <jdoc:include type="modules" name="debug" style="none" />
        </div>
    </body>
    <jdoc:include type="scripts" />
</html>