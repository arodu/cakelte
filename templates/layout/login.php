<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= strip_tags($this->settings['appName']) . ' | ' . $this->fetch('title') ?></title>

  <?= $this->Html->meta('icon') ?>
  <?= $this->fetch('meta') ?>

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome Icons -->
  <?= $this->Html->css('CakeLte./AdminLTE/plugins/fontawesome-free/css/all.min.css') ?>
  <!-- icheck bootstrap -->
  <?= $this->Html->css('CakeLte./AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css') ?>
  <!-- Theme style -->
  <?= $this->Html->css('CakeLte./AdminLTE/dist/css/adminlte.min.css') ?>
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <?= $this->Html->css('CakeLte.style') ?>

  <?= $this->fetch('css') ?>
</head>

<body class="hold-transition login-page">
  <div class="login-box">

    <div class="login-logo">
      <a href="<?= $this->Url->build('/') ?>" class="">
        <?= $this->Html->image($this->settings['appLogo'], ['alt' => $this->settings['appName'] . ' logo', 'class' => 'brand-image bg-dark img-circle elevation-3']) ?>
        <span class="brand-text font-weight-light"><?= $this->settings['appName'] ?></span>
      </a>
    </div>
    <!-- /.login-logo -->
    <?= $this->fetch('content') ?>

  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <?= $this->Html->script('CakeLte./AdminLTE/plugins/jquery/jquery.min.js') ?>
  <!-- Bootstrap 4 -->
  <?= $this->Html->script('CakeLte./AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>
  <!-- AdminLTE App -->
  <?= $this->Html->script('CakeLte./AdminLTE/dist/js/adminlte.min.js') ?>

  <?= $this->fetch('script') ?>
</body>

</html>
