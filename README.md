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
bin/cake plugin load CakeLTE
```

Or you can manually add the loading statement in the `src/Application.php` file of your application:

```php
public function bootstrap(){
    parent::bootstrap();
    $this->addPlugin('CakeLTE');
}
```

## How to use

use traint into `src/View/AppView.php`
```php
namespace App\View;

use Cake\View\View;
use CakeLTE\View\CakeLTETrait;

class AppView extends View{
    use CakeLTETrait;

    public function initialize(): void{
      parent::initialize();
      $this->initializeCakeLTE();
      //...
    }

}
```

you can change the layout with initializeCakeLTE options
```php
$this->initializeCakeLTE(['layout'=>'login']);
```
default layout is `CakeLTE.starter`

### Copy element files
* `/plugins/CakeLTE/templates/element/*`

### Create code from bake
```bash
bin/cake bake all [command] -t CakeLTE
```

## Theme
* [AdminLTE 3.0.4](https://adminlte.io/)
