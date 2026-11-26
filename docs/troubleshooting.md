# Troubleshooting

## Assets are not published

`bin/cake cakelte install` creates a symlink from `webroot/adminlte` to
`vendor/almasaeed2010/adminlte`. On Windows, restricted permissions, or when the
path already exists, the symlink may not be created; the command can still print
`Done`.

Check the result:

```bash
ls -l webroot/adminlte
```

If it is missing, remove any stale entry and copy the package manually:

```bash
rm -rf webroot/adminlte
cp -R vendor/almasaeed2010/adminlte webroot/adminlte
```

On Windows, use the equivalent copy command or copy the folder with your file
manager. If you use a copy instead of a symlink, repeat it after
`composer update`.

The command declares `--overwrite` / `-o`, but 3.x does not apply it yet. Remove
`webroot/adminlte` manually before running the command again.

## AdminLTE assets return 404

Confirm that the files exist:

```bash
ls webroot/adminlte/dist/css/adminlte.css
ls webroot/adminlte/dist/js/adminlte.js
```

If the files exist but the browser still gets 404, check that your web server
follows symlinks in `webroot/`. If it does not, use the manual copy from
[Assets are not published](#assets-are-not-published).

## The menu override does not apply

Copying `vendor/arodu/cakelte/config/menu.php` to `config/menu.php` does not
replace the sidebar menu: the plugin always loads its own `CakeLte.menu` file.
Override `templates/plugin/CakeLte/element/sidebar/menu.php` and load your file
explicitly:

```php
$menu = $this->MenuLte->menuFromFile(['configFile' => 'menu']);
echo $this->MenuLte->render($menu);
```

See [Menus](menus.md) and [Sidebar](sidebar.md) for the full override.

## `rtl` has no effect

The helper exposes `rtl()`, but the bundled layouts do not add `dir="rtl"` or
load `adminlte.rtl.css`. See
[Configuration](configuration.md#the-rtl-option) for the current behavior and
the custom-layout workaround.

## `/cakelte/debug` or `/cakelte/sample` returns 404

Both sample pages require debug mode. The controller throws `NotFoundException`
when `Configure::read('debug')` is false. See [Pages](pages.md).

## Template overrides are ignored

Overrides must live under `templates/plugin/CakeLte/` and keep the same
structure as the plugin's `templates/` directory. After adding or changing an
override, clear the view cache:

```bash
bin/cake cache clear_all
```

See [Customization](customization.md) for the file list and the `copy_files`
command.

## The bake command is not found

Install Bake in the application:

```bash
composer require --dev cakephp/bake
```

Then use the CakeLTE theme:

```bash
bin/cake bake all Users -t CakeLte
bin/cake bake template Users login -t CakeLte
```

## The `CakeLte` helper is missing

Make sure the plugin is loaded:

```bash
bin/cake plugin loaded
```

And call `initializeCakeLte()` from `AppView::initialize()` after
`parent::initialize()`. See [Layouts](layouts.md).

---
[Back to index](index.md)
