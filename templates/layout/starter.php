<?php
  // debug($this->settings);
?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title><?= strip_tags($this->settings['name']).' | '.$this->fetch('title') ?></title>

  <?= $this->Html->meta('icon') ?>
  <?= $this->fetch('meta') ?>

  <!-- Font Awesome Icons -->
<<<<<<< HEAD
  <?= $this->Html->css('CakeLte./AdminLTE/plugins/fontawesome-free/css/all.min.css') ?>
  <!-- Theme style -->
  <?= $this->Html->css('CakeLte./AdminLTE/dist/css/adminlte.min.css') ?>
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <?= $this->Html->css('CakeLte.style') ?>
=======
  <?= $this->Html->css('CakeLTE./AdminLTE/plugins/fontawesome-free/css/all.min.css') ?>
  <!-- Theme style -->
  <?= $this->Html->css('CakeLTE./AdminLTE/dist/css/adminlte.min.css') ?>
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <?= $this->Html->css('CakeLTE.style') ?>
>>>>>>> 9b5798c8e39feac04f1c1ea5c7c5c4bb4330ee15

  <?= $this->fetch('css') ?>

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <?= $this->element('header/main')?>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= $this->Url->build('/') ?>" class="brand-link">
      <?= $this->Html->image($this->settings['logo'], ['alt'=> $this->settings['name'].' logo', 'class'=>'brand-image']) ?>
      <span class="brand-text font-weight-light"><?= $this->settings['name'] ?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <?= $this->element('sidebar/main') ?>
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <?= $this->element('content/header') ?>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <?= $this->Flash->render() ?>

        <?= $this->fetch('content') ?>
<<<<<<< HEAD

=======
        
>>>>>>> 9b5798c8e39feac04f1c1ea5c7c5c4bb4330ee15
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <?= $this->element('aside/main') ?>

  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <?= $this->element('footer/main') ?>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<<<<<<< HEAD
<?= $this->Html->script('CakeLte./AdminLTE/plugins/jquery/jquery.min.js') ?>
<!-- Bootstrap 4 -->
<?= $this->Html->script('CakeLte./AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>
<!-- AdminLTE App -->
<?= $this->Html->script('CakeLte./AdminLTE/dist/js/adminlte.min.js') ?>
=======
<?= $this->Html->script('CakeLTE./AdminLTE/plugins/jquery/jquery.min.js') ?>
<!-- Bootstrap 4 -->
<?= $this->Html->script('CakeLTE./AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>
<!-- AdminLTE App -->
<?= $this->Html->script('CakeLTE./AdminLTE/dist/js/adminlte.min.js') ?>
>>>>>>> 9b5798c8e39feac04f1c1ea5c7c5c4bb4330ee15

<?= $this->fetch('script') ?>
</body>
</html>
