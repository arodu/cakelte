<?php
/**
 * @var \App\View\AppView $this
 */


use Cake\Core\Configure;

$this->setLayout('CakeLte.login');

?>

<p class="login-box-msg"><?= __('Sign in to start your session') ?></p>
<?= $this->Form->create() ?>

<?= $this->Form->control('username', ['label' => __d('cake_d_c/users', 'Username'), 'required' => true]) ?>
<?= $this->Form->control('password', ['label' => __d('cake_d_c/users', 'Password'), 'required' => true]) ?>

<div class="row">
    <div class="col">
        <?php
        if (Configure::read('Users.reCaptcha.login')) {
            echo $this->User->addReCaptcha();
        }
        ?>
    </div>
</div>

<div class="row">
    <div class="col-8">
        <div class="form-check">
            <?php
            if (Configure::read('Users.RememberMe.active')) {
                echo $this->Form->control(Configure::read('Users.Key.Data.rememberMe'), [
                    'type' => 'checkbox',
                    'label' => __d('cake_d_c/users', 'Remember me'),
                    'checked' => Configure::read('Users.RememberMe.checked')
                ]);
            }
            ?>
        </div>
    </div>
    <!-- /.col -->
    <div class="col-4">
        <div class="d-grid gap-2">
            <?= $this->User->button(__('Sign In'), ['class' => 'btn btn-primary']); ?>
        </div>
    </div>
    <!-- /.col -->
</div>
<!--end::Row-->
<?= $this->Form->end() ?>
<div class="social-auth-links text-center mb-3 d-grid gap-2">
    <?= implode(' ', $this->User->socialLoginList()); ?>
</div>
<!-- /.social-auth-links -->
<?php
$registrationActive = Configure::read('Users.Registration.active');
?>
<?php if ($registrationActive) : ?>
    <p class="mb-1">
        <?= $this->Html->link(__('Register a new membership'), ['action' => 'register'], ['class' => 'text-center']) ?>
    </p>
<?php endif; ?>

<?php if (Configure::read('Users.Email.required')) : ?>
    <p class="mb-1">
        <?= $this->Html->link(__('I forgot my password'), ['action' => 'requestResetPassword'], ['class' => 'text-center']) ?>
    </p>
    <?php if (Configure::read('OneTimeLogin.enabled')) : ?>
        <p class="mb-1">
            <?= $this->Html->link(
                __('Send me a login link'),
                ['plugin' => 'CakeDC/Users', 'controller' => 'Users', 'action' => 'requestLoginLink'],
                ['allowed' => true, 'escape' => false]
            ); ?>
        </p>
    <?php endif; ?>
<?php endif; ?>

<style>
    .btn-google {
        background-color: #db4437 !important;
        color: white !important;
    }
    .btn-github {
        background-color: #333 !important;
        color: white !important;
    }
    .btn-facebook {
        background-color: #3b5998 !important;
        color: white !important;
    }
    .btn-twitter {
        background-color: #1da1f2 !important;
        color: white !important;
    }
    .btn-linkedin {
        background-color: #0077b5 !important;
        color: white !important;
    }
    .btn-instagram {
        background-color: #e1306c !important;
        color: white !important;
    }
    .btn-amazon {
        background-color: #ff9900 !important;
        color: white !important;
    }
    .btn-cognito {
        background-color: #f9a825 !important;
        color: white !important;
    }
    .btn-azure {
        background-color: #0072c6 !important;
        color: white !important;
    }
    .btn-social:hover {
        opacity: 0.8;
    }
</style>