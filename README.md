# CakeLTE: AdminLTE plugin for CakePHP 4.x

## Installation

You can install this plugin into your CakePHP application using [composer](https://getcomposer.org).

The recommended way to install composer packages is:
```bash
composer require arodu/cakelte
```

## Configuration

You can load the plugin using the shell command:

```bash
bin/cake plugin load CakeLte
```

Or you can manually add the loading statement in the `src/Application.php` file of your application:

```php
public function bootstrap(){
    parent::bootstrap();
    $this->addPlugin('CakeLte');
}
```

## How to use

use trait into `src/View/AppView.php` _(Recomended)_
```php
namespace App\View;

use Cake\View\View;
use CakeLte\View\CakeLteTrait;

class AppView extends View{
  use CakeLteTrait;

  public $layout = 'CakeLte.starter';

  public function initialize(): void{
      parent::initialize();
      $this->initializeCakeLte($options = []);
      //...
  }
}
```

or you can extends from CakeLteView
```php
namespace App\View;

use Cake\View\View;
use CakeLte\View\CakeLteView;

class AppView extends CakeLteView{

  public function initialize(): void{
    parent::initialize();
    //...
  }
}
```

initializeCakeLte() $options
```php
    [
      // [string] default='Cake<b>LTE</b>'
      'appName' => 'Cake<b>LTE</b>',

      // [string] default='CakeLte.cake.icon.png'
      'appLogo' => 'CakeLte.cake.icon.png', 

      // file into CakeLte/config/app_form.php
      'form-templates' => 'CakeLte.app_form',

      // file into CakeLte/config/app_paginator.php
      'paginator-templates' => 'CakeLte.app_paginator',
  ];
```

Options layouts
* `CakeLte.stater`
* `CakeLte.login`
* `CakeLte.top-nav`


### Create code from bake
```bash
bin/cake bake all [command] -t CakeLte
```

### To modify the template you can copy one or all the files within your project

Replace the files elements
* Layouts
  * `src/templates/layout/stater.php`
  * `src/templates/layout/login.php`
  * `src/templates/layout/top-nav.php`
* Content info
  * `src/templates/element/content/breadcrumb.php`
  * `src/templates/element/content/header.php`
* Header navbar
  * `src/templates/element/header/main.php`
  * `src/templates/element/header/menu.php`
  * `src/templates/element/header/messages.php`
  * `src/templates/element/header/notifications.php`
  * `src/templates/element/header/search.php`
* Footer
  * `src/templates/element/footer/main.php`
* Left sidebar
  * `src/templates/element/sidebar/main.php`
  * `src/templates/element/sidebar/menu.php`
  * `src/templates/element/sidebar/user.php`
* Flash messages
  * `src/templates/element/flash/default.php`
  * `src/templates/element/flash/error.php`
  * `src/templates/element/flash/info.php`
  * `src/templates/element/flash/success.php`
* Right sidebar
  * `src/templates/element/aside/main.php`

## Page debug

Link to debug
```php
echo $this->Html->link(__('CakeLTE debug page'), '/cake-lte/debug' );

// {your-url}/cake-lte/debug
```

![Page Debug with starter layout](docs/page-debug_starter.png)

![Page Debug with top-nav layour](docs/page-debug_top-nav.png)


## Theme
[AdminLTE 3.0.5](https://adminlte.io/)


