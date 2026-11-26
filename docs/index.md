# CakeLTE 3.x

[![CakePHP 5](https://img.shields.io/badge/CakePHP-5.x-red?style=flat-square)](https://cakephp.org)
[![AdminLTE 4](https://img.shields.io/badge/AdminLTE-4.x-blue?style=flat-square)](https://adminlte.io)
[![PHP 8.2+](https://img.shields.io/badge/PHP-8.2%2B-777?style=flat-square)](https://www.php.net)

CakeLTE is a CakePHP 5.x plugin that wraps AdminLTE 4 and Bootstrap 5. It
provides layouts, header and sidebar elements, and helper integrations so you
can build an admin panel without maintaining the AdminLTE markup by hand.

!!! info "Version 3.x"
    This documentation covers CakeLTE 3.x (CakePHP 5 + AdminLTE 4). The 2.x
    line uses AdminLTE 3 and is not covered here.

## Install

```bash
composer require arodu/cakelte
bin/cake plugin load CakeLte
bin/cake cakelte install
```

Copy the configuration and wire the `CakeLteTrait` in your `AppView`.
[Getting Started](getting-started.md) walks through the full setup.

## What you get

- `CakeLte.default` and `CakeLte.login` layouts built on the AdminLTE 4 starter.
- Header elements: menu, search, messages, notifications, language, fullscreen,
  color mode and user.
- Sidebar with brand, menu tree and client-side filter.
- Menu construction through `arodu/cakephp-bootstrap-tools`, with `MenuLte` for
  the sidebar and `Menu` for Bootstrap navs, pills and tabs.
- AdminLTE-compatible helpers through `arodu/cakephp-bootstrap-tools`.
- Console commands to publish assets and copy templates.

## Documentation

| Section | What it covers |
|---------|----------------|
| [Getting Started](getting-started.md) | Requirements, installation, plugin loading, assets and configuration. |
| [Configuration](configuration.md) | `config/cakelte.php`, the `Layout` enum, body classes and `rtl`. |
| [Layouts](layouts.md) | The two layouts, `CakeLteTrait` and content blocks. |
| [Header](header.md) | Header elements and the search action. |
| [Sidebar](sidebar.md) | Sidebar structure, menu format and override. |
| [Menus](menus.md) | Menu construction, item reference, active items and menu variants. |
| [Pages](pages.md) | Debug and sample pages. |
| [Commands](commands.md) | `cakelte install` and `cakelte copy_files`. |
| [Customization](customization.md) | Template overrides and bake templates. |

---

Back to the [GitHub repository](https://github.com/arodu/cakelte).
