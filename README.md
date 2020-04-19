# CakeLTE: AdminLTE plugin for CakePHP 4.x

## Installation

You can install this plugin into your CakePHP application using [composer](https://getcomposer.org).

The recommended way to install composer packages is:
```bash
composer require arodu/cakelte
```

## Configuration

You can load the plugin using the shell command:

bin/cake plugin load CakeLTE

Or you can manually add the loading statement in the `src/Application.php` file of your application:

```php
public function bootstrap(){
    parent::bootstrap();
    $this->addPlugin('CakeLTE');
}
```

## How to use

set the layout into AppController.php
```php
  public function initialize(){

    //...
    $this->viewBuilder()
      ->setClassName('CakeLTE.CakeLTE')
      ->setLayout('CakeLTE.starter');
    //...

  }
```

copy the element files in your app
* `/plugins/CakeLTE/templates/element/*`

Create code from bake
```bash
bin/cake bake all [command] -t CakeLTE
```

## Theme
* [AdminLTE 3.0.4](https://adminlte.io/)
