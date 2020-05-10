<li class="nav-item d-none d-sm-inline-block">
  <?= $this->Html->link(__('Home'), '/', ['class'=>'nav-link']) ?>
</li>
<li class="nav-item d-none d-sm-inline-block">
  <?= $this->Html->link(__('Debug'), ['controller'=>'Pages', 'action'=>'debug', 'plugin'=>'CakeLte'], ['class'=>'nav-link']) ?>
</li>
<li class="nav-item d-none d-sm-inline-block">
  <?= $this->Html->link(__('Theme'), '/cake_lte/AdminLTE/index.html', ['class'=>'nav-link']) ?>
</li>
