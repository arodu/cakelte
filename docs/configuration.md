# Configuration

Copy the plugin configuration file into your application:

```bash
cp vendor/arodu/cakelte/config/cakelte.php config/cakelte.php
```

The `config/cakelte.php` file lets you change the CakeLTE options (`appName`,
`appLogo`, `layout`, `rtl`):

```php
return [
    'CakeLte' => [
        'appName' => 'CakeLTE',
        'appLogo' => 'CakeLte.cake.icon.svg',

        'layout' => \CakeLte\Enum\Layout::FIXED_SIDEBAR,
        'rtl' => false,
    ],
];
```

## The `Layout` enum

Use the `CakeLte\Enum\Layout` enum for the `layout` option. Each case maps to
the AdminLTE body classes:

| Case | CSS classes |
|------|-------------|
| `Layout::FIXED_SIDEBAR` | `layout-fixed` |
| `Layout::FIXED_COMPLETE` | `layout-fixed fixed-header fixed-footer` |
| `Layout::FIXED_MINI` | `layout-fixed sidebar-mini` |
| `Layout::FIXED_MINI_COLLAPSED` | `layout-fixed sidebar-mini sidebar-collapse` |

## How the body class is built

The `<body>` of the default layout combines the `layout` classes with the
static AdminLTE suffix: `getBodyClass() + sidebar-expand-lg bg-body-tertiary`.

With the default `Layout::FIXED_SIDEBAR`, the rendered body class is
`layout-fixed sidebar-expand-lg bg-body-tertiary`, matching the AdminLTE
starter.

The `login` layout uses its own static class (`login-page bg-body-secondary`)
and is not affected by this option.

## The `rtl` option

The helper exposes `rtl()`, which returns `dir="rtl"` when the option is true:

```php
'rtl' => true,
```

!!! warning "Not applied by the bundled layouts"
    The `CakeLte.default` and `CakeLte.login` layouts render `<html lang="en">`
    without calling `rtl()`, and the default asset list only includes the LTR
    `adminlte.css`. Setting `rtl` does not change the bundled layouts in 3.x.

To use it, override the layout (see [Customization](customization.md)) and add
the helper to the `<html>` tag, then load `adminlte.rtl.css` instead of the LTR
stylesheet:

```php
<html lang="en" <?= $this->CakeLte->rtl() ?>>
```

The RTL stylesheet ships with AdminLTE at
`/adminlte/dist/css/adminlte.rtl.css`; the plugin does not add it to the default
asset list.

## The sidebar menu

The plugin renders its default menu from
`vendor/arodu/cakelte/config/menu.php` (the `CakeLte.menu` config file). It
always loads that file, so copying it to `config/menu.php` does not replace it.

To use an application-level menu, copy the sidebar element and point it at your
file:

```bash
bin/cake cakelte copy_files sidebar
```

Then edit `templates/plugin/CakeLte/element/sidebar/menu.php`:

```php
$menu = $this->MenuLte->menuFromFile(['configFile' => 'menu']);
echo $this->MenuLte->render($menu);
```

The application file must live at `config/menu.php` and return the same
`['Menu' => [...]]` structure. See [Menus](menus.md) for the item reference and
[Sidebar](sidebar.md) for the sidebar-specific override.

---
[Back to index](index.md)
