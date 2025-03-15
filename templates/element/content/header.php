<?php

/**
 * @var \App\View\AppView $this
 */
?>
<div class="row">
    <div class="col-sm-6">
        <h3 class="mb-0"><?= $this->fetch('title') ?></h3>
    </div>
    <div class="col-sm-6">
        <?= $this->Breadcrumbs->render(['class' => 'breadcrumb float-sm-end']) ?>
    </div>
</div>