# Getting Started

CakeLTE is a CakePHP 5.x plugin that wraps AdminLTE 4.x, an accessible Bootstrap
5 admin theme. It provides the layouts, header elements, sidebar and helper
trait so you can build an admin panel on top of a modern, vanilla-JavaScript
theme instead of maintaining the markup by hand.

## Dependencies

- [FriendsOfCake/bootstrap-ui](https://github.com/FriendsOfCake/bootstrap-ui) `^5.0` - use Bootstrap 5 transparently with CakePHP 5.x.
- [arodu/cakephp-bootstrap-tools](https://github.com/arodu/cakephp-bootstrap-tools) `^2.2` - helpers for the BootstrapUI + AdminLTE layout.
- [AdminLTE 4.x](https://adminlte.io/) `^4.4` - the Bootstrap 5 admin theme.

## Requirements

- PHP >= 8.2 (CI covers 8.2 through 8.6)
- CakePHP >= 5.0

## Installation

Install the plugin with composer:

```bash
composer require arodu/cakelte
```

## Loading the plugin

Load the plugin in `src/Application.php` or with the shell command:

```bash
bin/cake plugin load CakeLte
```

## Publishing the assets

Publish the AdminLTE assets to your webroot (creates a symlink):

```bash
bin/cake cakelte install
```

> This is a manual step of your application. It is not run automatically by
> composer.

## Configure the plugin

Copy the default configuration into your application:

```bash
cp vendor/arodu/cakelte/config/cakelte.php config/cakelte.php
```

Then use `CakeLteTrait` in `src/View/AppView.php`; see
[Layouts](layouts.md) for the complete example. The plugin loads
`BootstrapUI` and `BootstrapTools` automatically when it is loaded.

## Verifying the installation

Confirm the plugin is loaded:

```bash
bin/cake plugin loaded
```

You should see `CakeLte` in the list.

## Next steps

- Read [Configuration](configuration.md) to set up `config/cakelte.php`.
- Read [Layouts](layouts.md) to wire the layouts and the `CakeLteTrait`.

---
[Back to index](index.md)
