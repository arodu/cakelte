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

The item format is shared with the generic `Menu` helper; see [Menus](menus.md)
for the item reference, active items and examples.

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
