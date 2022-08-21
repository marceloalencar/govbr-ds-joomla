<?php

defined('_JEXEC') or die;

use Joomla\Utilities\ArrayHelper;

$module  = $displayData['module'];
$params  = $displayData['params'];
$attribs = $displayData['attribs'];

if (!empty($module->content)):
	if ($module->module == 'mod_menu'):
?>
							<div class="header-links dropdown">
                                <button class="br-button circle small" type="button" data-toggle="dropdown" aria-label="Abrir Acesso Rápido"><i class="fas fa-ellipsis-v" aria-hidden="true"></i>
                                </button>
                                <div class="br-list">
                                    <div class="header">
                                        <div class="title">Acesso Rápido</div>
                                    </div>
									<?php echo $module->content; ?>
                                </div>
                            </div>
<?php
	else:
		echo $module->content;
	endif;
endif;
?>
                            <span class="br-divider vertical mx-half mx-sm-1"></span>
