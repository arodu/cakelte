# Customization

## Overriding templates

You can copy one or all of the plugin templates into your application, into the
folder `templates/plugin/CakeLte/`, keeping the same structure as `templates/`.

The available files are:

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
  - `templates/element/header/language.php`
  - `templates/element/header/fullscreen.php`
  - `templates/element/header/color-mode.php`
  - `templates/element/header/user.php`
- Footer
  - `templates/element/footer/main.php`
- Left sidebar
  - `templates/element/sidebar/main.php`
  - `templates/element/sidebar/menu.php`

After copying, the plugin renders your application template instead of its own.

## The `copy_files` command

To copy all files at once:

```bash
bin/cake cakelte copy_files --all
```

To copy a single category:

```bash
bin/cake cakelte copy_files sidebar
```

Use `--force` to overwrite files that already exist:

```bash
bin/cake cakelte copy_files --all --force
```

See [Commands](commands.md) for the full reference.

## Bake templates

CakeLTE ships bake templates for the CRUD views and the authentication pages.
The bake plugin must be installed in your application
(`composer require --dev cakephp/bake`).

Generate the CRUD views with the CakeLTE theme:

```bash
bin/cake bake all Users -t CakeLte
```

Generate one authentication template:

```bash
bin/cake bake template Users login -t CakeLte
bin/cake bake template Users register -t CakeLte
bin/cake bake template Users recovery -t CakeLte
```

The shipped templates are `index`, `view`, `add`, `edit`, `login`, `register`
and `recovery`.

---
[Back to index](index.md)
