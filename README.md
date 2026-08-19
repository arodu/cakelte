# CakeLTE: AdminLTE plugin for CakePHP 5.x

[![Latest Version](https://img.shields.io/github/v/release/arodu/cakelte.svg?style=for-the-badge)](https://github.com/arodu/cakelte/releases)
[![CakePHP](https://img.shields.io/packagist/dependency-v/arodu/cakelte/cakephp%2Fcakephp?style=for-the-badge)](https://cakephp.org/)
[![Packagist License](https://img.shields.io/packagist/l/arodu/cakelte?style=for-the-badge)](LICENSE.md)
[![GitHub Repo stars](https://img.shields.io/github/stars/arodu/cakelte?style=for-the-badge)](https://github.com/arodu/cakelte/stargazers)
[![Total Downloads](https://img.shields.io/packagist/dt/arodu/cakelte.svg?style=for-the-badge)](https://packagist.org/packages/arodu/cakelte)

If it's helpful you can buy me a coffee, thanks!

[![ko-fi](https://ko-fi.com/img/githubbutton_sm.svg)](https://ko-fi.com/H2H3XTSGP)

## Dependencies

- [FriendsOfCake/bootstrap-ui](https://github.com/FriendsOfCake/bootstrap-ui), transparently use Bootstrap 5 with CakePHP 5.x.
- [arodu/cakephp-bootstrap-tools](https://github.com/arodu/cakephp-bootstrap-tools), helpers for the BootstrapUI + AdminLTE layout.
- [AdminLTE 4.x](https://adminlte.io/), bootstrap 5 admin theme.

## Requirements

- PHP >= 8.2
- CakePHP >= 5.0

## Install

Install the plugin via composer:

```bash
composer require arodu/cakelte
```

## Load

Load the plugin in `src/Application.php` or with the shell command:

```bash
bin/cake plugin load CakeLte
```

## Publish the assets

Publish the AdminLTE assets to your webroot:

```bash
bin/cake cakelte install
```

> This is a manual step of your application. It is not run automatically by
> composer.

## Configure

Copy the plugin configuration file into your application:

```bash
cp vendor/arodu/cakelte/config/cakelte.php config/cakelte.php
```

Use the `CakeLteTrait` in `src/View/AppView.php`:

```php
namespace App\View;

use Cake\View\View;
use CakeLte\View\CakeLteTrait;

class AppView extends View
{
    use CakeLteTrait;

    protected string $layout = 'CakeLte.default';

    public function initialize(): void
    {
        parent::initialize();
        $this->initializeCakeLte();
    }
}
```

## Preview

![Page Debug with default layout](docs/page-debug_default.png)

![Page Debug with default dark layout](docs/page-debug_default_darkmode.png)

## Next steps

For the full usage and configuration details, read the
[documentation](docs/index.md).

## Support

If you have any problems or questions, please open an issue on
[GitHub](https://github.com/arodu/cakelte/issues).

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details
