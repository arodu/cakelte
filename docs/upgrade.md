# Upgrading from 2.x

CakeLTE 3.x is a migration, not a drop-in update. It moves from AdminLTE 3 and
Font Awesome to AdminLTE 4, Bootstrap 5 and Bootstrap Icons.

## What changed

| Area | 2.x | 3.x |
|------|-----|-----|
| AdminLTE | 3.2 | 4.4+ |
| CSS framework | Bootstrap 4 | Bootstrap 5 |
| Icons | Font Awesome | Bootstrap Icons |
| Layouts | `default`, `login`, `top-nav` | `default`, `login` |
| View wiring | `CakeLteView` or `CakeLteTrait` | `CakeLteTrait` only |
| Menu | `MenuLteComponent` / `MenuLteHelper` | Bootstrap Tools `Menu` / `MenuLte` |
| Config | kebab-case options and `header` / `sidebar` / `footer` sections | `appName`, `appLogo`, `layout`, `rtl` |
| Layout classes | `Header` / `Sidebar` style classes | `CakeLte\Enum\Layout` and `getBodyClass()` |

## 1. Update the dependency

```bash
composer require arodu/cakelte:^3.0
```

CakeLTE 3.x requires `arodu/cakephp-bootstrap-tools`; Composer installs it as a
dependency. Keep the usual plugin loading:

```bash
bin/cake plugin load CakeLte
```

Remove the old AdminLTE 3 assets and publish AdminLTE 4:

```bash
rm -rf webroot/adminlte
bin/cake cakelte install
```

If the symlink cannot be created, copy the package manually. See
[Troubleshooting](troubleshooting.md#assets-are-not-published).

## 2. Replace the view wiring

2.x could extend `CakeLteView`:

```php
class AppView extends \CakeLte\View\CakeLteView
{
}
```

3.x removes that class. Use the trait:

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

`CakeLte.top-nav` is no longer shipped. Use `CakeLte.default` or a custom
layout. See [Layouts](layouts.md).

## 3. Replace the configuration

Copy the 3.x configuration file:

```bash
cp vendor/arodu/cakelte/config/cakelte.php config/cakelte.php
```

The 2.x options are gone: `app-name`, `app-logo`, `small-text`, `dark-mode`,
`layout-boxed`, and the `header`, `sidebar` and `footer` sections. In 3.x the
file looks like this:

```php
use CakeLte\Enum\Layout;

return [
    'CakeLte' => [
        'appName' => 'CakeLTE',
        'appLogo' => 'CakeLte.cake.icon.svg',
        'layout' => Layout::FIXED_SIDEBAR,
        'rtl' => false,
    ],
];
```

The layout is now an enum; see [Configuration](configuration.md) for the cases
and body classes.

## 4. Port menu code

The 2.x `MenuLteComponent` and `MenuLteHelper` are removed. The sidebar now uses
the Bootstrap Tools menu renderer through `MenuLte`, and the generic `Menu`
helper is available for other Bootstrap menus.

The default menu lives in the plugin's `config/menu.php`. To use an application
menu, override the sidebar element as described in [Sidebar](sidebar.md), and see
[Menus](menus.md) for the item format.

## 5. Re-copy template overrides

Template overrides from 2.x will not match the 3.x markup. Review them and port
the changes before replacing the files; `copy_files --force` overwrites them.

The element layout changed:

- Removed: `aside/main`, `extra/css`, `extra/script`, `header/search-block`,
  `header/search-default`, `sidebar/search`, `sidebar/user`.
- Added: `header/search`, `header/language`, `header/fullscreen`,
  `header/color-mode`, `header/user`, `sidebar/main`, `sidebar/menu`.

The full list is in [Customization](customization.md).

## 6. Update Bootstrap and icon classes

Common replacements:

| 2.x | 3.x |
|-----|-----|
| `data-toggle` | `data-bs-toggle` |
| `data-target` | `data-bs-target` |
| `data-widget="pushmenu"` | `data-lte-toggle="sidebar"` |
| `data-widget="fullscreen"` | `data-lte-toggle="fullscreen"` |
| `fas fa-*`, `far fa-*` | `bi bi-*` |
| `btn-default` | `btn-secondary` |
| `btn-block` | `w-100` |
| `float-left`, `float-right` | `float-start`, `float-end` |
| `ml-*`, `mr-*` | `ms-*`, `me-*` |
| `pl-*`, `pr-*` | `ps-*`, `pe-*` |
| `text-left`, `text-right` | `text-start`, `text-end` |
| `custom-control` | `form-check` |
| `custom-select` | `form-select` |
| `close` | `btn-close` |
| `badge-*` | `text-bg-*` |

AdminLTE 3 `data-widget` attributes were replaced by AdminLTE 4
`data-lte-toggle` attributes. The 2.x control-sidebar toggle has no direct
replacement; 3.x uses the color-mode and user menus instead.

## 7. Verify

```bash
bin/cake plugin loaded
ls -l webroot/adminlte
bin/cake cache clear_all
```

Open the login and default layouts and check the header, sidebar, color mode and
mobile search. If an asset or template is missing, see
[Troubleshooting](troubleshooting.md).
