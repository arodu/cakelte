# Sidebar

The left sidebar (`templates/element/sidebar/main.php`) has three parts:

1. The **brand** - the logo and the application name, linked to the home page.
2. The **sidebar search** - a filter field that hides and expands menu items as
   you type. It targets the menu container by its `id="navigation"`.
3. The **sidebar wrapper** - the navigation menu generated from
   `config/menu.php`.

## The menu

The sidebar menu is rendered from `config/menu.php`. The items already use the
`__()` translation function, so they can be localized by the consuming
application.

Each menu item supports the following keys:

| Key | Description |
|-----|-------------|
| `label` | The display label of the item. |
| `url` | The URL the item links to. |
| `icon` | The Bootstrap Icons class, for example `bi bi-grid-fill`. |
| `children` | An array of sub-items (up to three levels). |
| `type` | The item type, for example a divider or a title. |
| `disabled` | Marks the item as disabled. |

Example:

```php
return [
    'Menu' => [
        ['label' => __('Home'), 'url' => '/', 'icon' => 'bi bi-grid-fill'],
        [
            'label' => __('Level 1'),
            'children' => [
                ['label' => __('Level 2'), 'url' => '/level-2'],
            ],
        ],
    ],
];
```

To override the menu in your application, copy the file:

```bash
cp vendor/arodu/cakelte/config/menu.php config/menu.php
```

## Sidebar search

The sidebar search filter is provided by AdminLTE's `SidebarSearch` (bundled in
`adminlte.js`). It filters the menu items by the `id="navigation"` container and
expands any subtree that holds a match. No JavaScript configuration is needed.

---
[Back to index](index.md) · [Back to README](../README.md)
