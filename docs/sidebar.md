# Sidebar

The left sidebar (`templates/element/sidebar/main.php`) has three parts:

1. The **brand** - the logo and the application name, linked to the home page.
2. The **sidebar search** - a filter field that hides and expands menu items as
   you type. It targets the menu container by its `id="navigation"`.
3. The **sidebar wrapper** - the navigation menu generated from the plugin's
   `config/menu.php`.

## The menu

The default menu is the plugin's `config/menu.php` (the `CakeLte.menu` config
file). The items already use the `__()` translation function, so they can be
localized by the consuming application.

Each menu item supports the following keys:

| Key | Description |
|-----|-------------|
| `label` | The display label of the item. |
| `url` | The URL the item links to. |
| `icon` | The Bootstrap Icons class, for example `bi bi-grid-fill`. |
| `children` | An array of sub-items (up to three levels). |
| `type` | The item type: `link` (default), `divider` or `title`. |
| `disabled` | Marks the item as disabled. |
| `target` | The link target, for example `_blank`. |
| `active` | Forces the active state (`true` or a callable). |
| `show` | Hides the item (`false` or a callable). |

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

The plugin always loads its own `CakeLte.menu`; copying the file to
`config/menu.php` alone does not override it. To use an application menu:

1. Copy the sidebar element:

   ```bash
   bin/cake cakelte copy_files sidebar
   ```

2. Put your menu in `config/menu.php`.

3. Edit `templates/plugin/CakeLte/element/sidebar/menu.php` to load that file:

   ```php
   $menu = $this->MenuLte->menuFromFile(['configFile' => 'menu']);
   echo $this->MenuLte->render($menu);
   ```

## Sidebar search

The sidebar search filter is provided by AdminLTE's `SidebarSearch` (bundled in
`adminlte.js`). It filters the menu items by the `id="navigation"` container and
expands any subtree that holds a match. No JavaScript configuration is needed.

---
[Back to index](index.md)
