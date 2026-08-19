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
| `Layout::FIXED_COMPLETE` | `layout-fixed-complete` |
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

Set `rtl` to `true` to render the layout in right-to-left mode:

```php
'rtl' => true,
```

## The sidebar menu

The sidebar menu is defined in `vendor/arodu/cakelte/config/menu.php`. Copy it
to `config/menu.php` to override the default items. See [Sidebar](sidebar.md)
for the menu item format.

---
[Back to index](index.md) · [Back to README](../README.md)
