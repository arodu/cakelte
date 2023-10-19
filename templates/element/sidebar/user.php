<?php

/**
 * @var \App\View\AppView $this
 */

$user = null;
if ($this->helpers()->has('Identity')) {
    $user = $this->Identity->get();
}
?>
<div class="user-panel mt-3 pb-3 mb-3 d-flex text-light align-items-center">
    <div class="image">
        <?php if ($user?->avatar) : ?>
            <?= $this->Html->image($user->avatar, ['class' => 'img-circle elevation-2', 'alt' => 'User Image']) ?>
        <?php else : ?>
            <i class="fas fa-user-circle fa-2x"></i>
        <?php endif; ?>
    </div>
    <div class="info">
        <?php if ($user?->username) : ?>
            <div class="d-block"><?= h($user->username) ?></div>
        <?php else : ?>
            <a href="#" class="d-block">Alexander Pierce</a>
        <?php endif; ?>

        <?php if ($user?->role) : ?>
            <div class="d-block"><?= $this->Html->tag('span', $user->role, ['class' => 'badge badge-light']) ?></div>
        <?php endif; ?>
    </div>
</div>