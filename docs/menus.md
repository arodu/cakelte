# Menus

The menu renderer comes from
[arodu/cakephp-bootstrap-tools](https://github.com/arodu/cakephp-bootstrap-tools),
specifically `BootstrapTools\View\Helper\MenuHelper`. CakeLTE preconfigures two
instances:

| Helper | Config file | Use |
|--------|-------------|-----|
| `MenuLte` | `CakeLte.menu` (the plugin's `config/menu.php`) | The AdminLTE sidebar. |
| `Menu` | `BootstrapTools.menu` | Generic Bootstrap menus assembled from arrays. |

`MenuLte` uses CakeLTE's templates: the `id="navigation"` container, the
`nav sidebar-menu flex-column` classes, the `menu-open` submenu class and the
Bootstrap Icons defaults. `Menu` uses the Bootstrap Tools defaults.

## Rendering the sidebar

`templates/element/sidebar/menu.php` does:

```php
$menu = $this->MenuLte->menuFromFile();
echo $this->MenuLte->render($menu);
```

`menuFromFile()` loads `CakeLte.menu` (the plugin's `config/menu.php`). See
[Sidebar](sidebar.md) for the application override.

## Rendering an array

```php
$items = [
    ['label' => __('Home'), 'url' => '/', 'icon' => 'bi bi-grid-fill'],
    [
        'label' => __('Reports'),
        'icon' => 'bi bi-bar-chart-fill',
        'children' => [
            ['label' => __('Daily'), 'url' => ['controller' => 'Reports', 'action' => 'daily']],
            ['label' => __('Monthly'), 'url' => ['controller' => 'Reports', 'action' => 'monthly']],
        ],
    ],
];

echo $this->Menu->render($items);
```

`url` accepts a string or a CakePHP URL array. It is passed through
`Router::url()`.

## Item reference

| Key | Type | Description |
|-----|------|-------------|
| `label` | string | Text of the item. |
| `url` | string or array | Link target. |
| `icon` | string | Bootstrap Icons class, for example `bi bi-grid-fill`. |
| `children` | array | Nested items. |
| `type` | string | `link` (default), `divider` or `title`. |
| `disabled` | bool or callable | Renders a non-clickable item. |
| `active` | bool or callable | Marks the item as active. |
| `show` | bool or callable | Hides the item when false. |
| `target` | string | HTML `target`, for example `_blank`. |
| `append` | string or callable | Extra HTML inside the link (badge, count). |

Callables receive the current `ServerRequest`:

```php
use Cake\Http\ServerRequest;

$items = [
    [
        'label' => __('Admin'),
        'url' => '/admin',
        'show' => fn (ServerRequest $request) => $request->getAttribute('identity') !== null,
        'active' => fn (ServerRequest $request) => $request->getPath() === '/admin',
    ],
];
```

`append` is inserted as HTML. Escape any dynamic value you put there.

Use the helper constants for special items:

```php
use BootstrapTools\View\Helper\MenuHelper;

$items = [
    ['label' => __('Management'), 'type' => MenuHelper::ITEM_TYPE_TITLE],
    ['label' => __('Users'), 'url' => '/users'],
    ['type' => MenuHelper::ITEM_TYPE_DIVIDER],
];
```

## Active items

Keys in the menu array are used for the active path. `activeItem()` accepts a
dot-separated path:

```php
$items = [
    'dashboard' => ['label' => __('Dashboard'), 'url' => '/'],
    'reports' => [
        'label' => __('Reports'),
        'children' => [
            'daily' => ['label' => __('Daily'), 'url' => '/reports/daily'],
        ],
    ],
];

$this->Menu->activeItem('reports.daily');
echo $this->Menu->render($items);
```

The sidebar uses the same mechanism; for example the debug page calls
`$this->MenuLte->activeItem('debug')`.

## Menu variants

CakeLTE's `CakeLteTrait` includes Bootstrap Tools' `MenuLoaderTrait`, so you can
register the other menu renderers in `AppView`:

```php
public function initialize(): void
{
    parent::initialize();
    $this->initializeCakeLte();

    $this->loadMenuHelper('Nav');
    $this->loadMenuHelper('Pills');
    $this->loadMenuHelper('Tabs');
    $this->loadMenuHelper('Underline');
    $this->loadMenuHelper('Navbar');
}
```

Then render the same items with a different container:

```php
echo $this->Nav->render($items);
echo $this->Pills->render($items);
echo $this->Tabs->render($items);
echo $this->Underline->render($items);
echo $this->Navbar->render($items, ['menuClass' => 'navbar-nav me-auto']);
```

The variants map to `nav`, `nav nav-pills`, `nav nav-tabs`, `nav nav-underline`
and `navbar-nav`, respectively.

## Options

`render()` accepts options that are merged with the helper configuration:

| Option | `MenuLte` | `Menu` | Description |
|--------|-----------|--------|-------------|
| `menuClass` | ignored by the sidebar template | `nav` | Classes for the container. |
| `activeClass` | `active` | `active` | Active item class. |
| `dropdownOpenClass` | `menu-open` | `dropdown-open` | Class applied by templates to an open parent item. |
| `dropdownClass` | `dropdown` | `dropdown` | Class for an item that has children. |
| `defaultIcon` | Bootstrap Icons by level | `null` | Icon used when an item has no `icon`. |
| `templates` | CakeLTE sidebar templates | Bootstrap Tools templates | Per-render template overrides. |

`MenuLte`'s sidebar template hardcodes the AdminLTE container classes, so
`menuClass` has no effect there; use `Menu`, `Nav`, `Pills`, `Tabs`,
`Underline` or `Navbar` for other containers.

To load a different config file:

```php
$menu = $this->MenuLte->menuFromFile(['configFile' => 'menu']);
```

The `configKey` defaults to `Menu`.

## Templates

The renderer is template-driven. Pass overrides per render:

```php
echo $this->Menu->render($items, [
    'templates' => [
        'menuContainer' => '<ul class="{{menuClass}}">{{items}}</ul>',
    ],
]);
```

The full template set lives in
`BootstrapTools\View\Helper\MenuHelper::$_defaultConfig` and in
`CakeLte::MENU_CONFIG` for the sidebar. See the
[Bootstrap Tools source](https://github.com/arodu/cakephp-bootstrap-tools) for
the complete list.

## Nested items

`children` is recursive; the helper renders whatever depth the array contains.
CakeLTE's bundled sidebar menu uses three levels.
