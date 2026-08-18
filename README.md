# CakeLTE: AdminLTE plugin for CakePHP 5.x

## Getting Started

### Dependencies

- [FriendsOfCake/bootstrap-ui](https://github.com/FriendsOfCake/bootstrap-ui), transparently use Bootstrap 5 with CakePHP 5.x.
- [AdminLTE 4.x](https://adminlte.io/), bootstrap 5 admin theme.

### Installing

You can install this plugin into your CakePHP application using [composer](https://getcomposer.org).

The recommended way to install composer packages is:

```bash
composer require arodu/cakelte
```

After installing, load the plugin and publish the AdminLTE assets:

```bash
bin/cake plugin load CakeLte
bin/cake cakelte install
```

## Configuration

You can load the plugin using the shell command:

```bash
bin/cake plugin load CakeLte
```

Add the AdminLTE symlink to webroot:

```bash
bin/cake cakelte install
```

> `bin/cake cakelte install` is a manual step of your application. It is not run
> automatically by composer.

## How to use

Copy the file `vendor/arodu/cakelte/config/cakelte.php` to `config/cakelte.php`
```bash
cp vendor/arodu/cakelte/config/cakelte.php config/cakelte.php
```
In this file you can change the cakelte configuration options


use trait into `src/View/AppView.php` _(Recomended)_
```php
namespace App\View;

use Cake\View\View;
use CakeLte\View\CakeLteTrait;

class AppView extends View{
  use CakeLteTrait;

  protected string $layout = 'CakeLte.default';

  public function initialize(): void{
      parent::initialize();
      $this->initializeCakeLte();
      //...
  }
}
```

Options layouts

- `CakeLte.default`
- `CakeLte.login`

### Create code from bake

```bash
bin/cake bake all [command] -t CakeLte

bin/cake bake template [command] -t CakeLte login
bin/cake bake template [command] -t CakeLte register
bin/cake bake template [command] -t CakeLte recovery
```

To modify the template you can copy one or all the files within your project, copying the following files in the folder `templates/plugin/CakeLte/` and keeping the same structure of `templates/`

Replace the files elements

- Layouts
  - `templates/layout/default.php`
  - `templates/layout/login.php`
- Content
  - `templates/element/content/header.php`
- Header navbar
  - `templates/element/header/main.php`
  - `templates/element/header/menu.php`
  - `templates/element/header/search.php`
  - `templates/element/header/messages.php`
  - `templates/element/header/notifications.php`
  - `templates/element/header/fullscreen.php`
  - `templates/element/header/user.php`
- Footer
  - `templates/element/footer/main.php`
- Left sidebar
  - `templates/element/sidebar/main.php`
  - `templates/element/sidebar/menu.php`

Or you can use the following command to copy all files

```bash
bin/cake cakelte copy_files --all
```

## Page debug

Link to debug

```php
echo $this->Html->link(__('CakeLTE debug page'), '/cakelte/debug' );

// {your-url}/cakelte/debug
```

![Page Debug with default layout](docs/page-debug_default_darkmode.png)

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details
