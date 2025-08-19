<?php

use UtilityKit\Utility\Common;

$this->assign('title', 'CakePHP: the rapid development php framework');
$this->MenuLte->activeItem('debug');

echo $this->element('BootstrapTools.pages/debug', [
    'plugin' => [
        'name' => 'arodu/cakelte',
        'version' => Common::getPackageVersion('arodu/cakelte'),
        'description' => __('A CakePHP plugin for AdminLTE theme integration.'),
        'url' => 'https://github.com/arodu/cakelte',
    ]
]);
