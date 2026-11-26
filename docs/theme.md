# Theme settings and assets

`CakeLteHelper` drives the app name, logo, body classes and asset lists. The
values come from `config/cakelte.php` and can be overridden at runtime.

## Settings

`get()` reads a setting and `set()` changes it:

```php
$this->CakeLte->get('appName');
$this->CakeLte->set('appName', 'Acme Admin');
```

The settings are `appName`, `appLogo`, `layout` and `rtl`. See
[Configuration](configuration.md) for the configuration file.

## App name and logo

`appName` and `appLogo` are used by the layout title and the sidebar brand.
`getLogo()` returns the logo image markup, or `null` when `appLogo` is empty:

```php
<?= $this->CakeLte->getLogo() ?>
```

The default sidebar renders the logo with `Html->image()` and the
`brand-image opacity-75 shadow` classes; `getLogo()` uses `brand-image` only.

## Default assets

The helper ships these lists:

| CSS | Scripts |
|-----|---------|
| OverlayScrollbars 2.11.0 | OverlayScrollbars 2.11.0 |
| Bootstrap Icons 1.13.1 | Popper 2.11.8 |
| `/adminlte/dist/css/adminlte` | Bootstrap 5.3.8 |
| `CakeLte.style` | `/adminlte/dist/js/adminlte` |

These versions are the defaults in 3.x; they live in
`CakeLteHelper::$_defaultConfig`.

The `CakeLte.default` layout calls `renderCss()` and `renderScripts()`. The
`CakeLte.login` layout calls `renderCss()` but hardcodes its scripts.

## Adding assets

Pass a list to `initializeCakeLte()` to append files to the defaults:

```php
$this->initializeCakeLte([
    'css' => ['/css/admin.css'],
    'scripts' => ['/js/admin.js'],
]);
```

The helper config merges lists by numeric key, so both files are added after the
existing ones.

## Replacing assets

To replace an entire list, call `setConfig()` with `false` as the third
argument after initialization:

```php
public function initialize(): void
{
    parent::initialize();
    $this->initializeCakeLte();

    $this->CakeLte->setConfig('css', [
        'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css',
        '/adminlte/dist/css/adminlte',
        'CakeLte.style',
    ], false);

    $this->CakeLte->setConfig('scripts', [
        'https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js',
        '/adminlte/dist/js/adminlte',
    ], false);
}
```

Without the `false` argument, `setConfig()` merges into the current list and
appends the new entries.

`renderCss()` and `renderScripts()` accept the usual `HtmlHelper` options and
are already called by the layouts. Use them in custom layouts:

```php
<?= $this->CakeLte->renderCss() ?>
<?= $this->CakeLte->renderScripts() ?>
```

## Meta tags

`renderMeta()` renders the `meta` config through `Html->meta()`. The bundled
layouts do not call it; add it to a custom layout:

```php
$this->CakeLte->setConfig('meta', [
    'description' => 'Acme admin panel',
]);
```

```php
<?= $this->CakeLte->renderMeta() ?>
```

## Body class and RTL

`getBodyClass()` returns the layout classes. `rtl()` returns `dir="rtl"` when
the setting is true, but the bundled layouts do not apply it. See
[Configuration](configuration.md#the-rtl-option) for the current behavior.
