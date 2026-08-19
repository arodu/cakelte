<?php

use UtilityKit\Utility\ComposerManifest;

$this->assign('title', __('CakePHP: the rapid development php framework'));
$this->MenuLte->activeItem('debug');

echo $this->element('BootstrapTools.pages/debug', [
    'plugin' => [
        'name' => 'arodu/cakelte',
        'version' => ComposerManifest::getPackageVersion('arodu/cakelte'),
        'description' => __('A CakePHP plugin for AdminLTE theme integration.'),
        'url' => 'https://github.com/arodu/cakelte',
    ]
]);
