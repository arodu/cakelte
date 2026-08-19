<?php

/**
 * @var \App\View\AppView $this
 */

$menu = $this->MenuLte->menuFromFile();

echo $this->MenuLte->render($menu);
?>