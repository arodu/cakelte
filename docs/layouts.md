# Layouts

CakeLTE ships two layouts:

- `CakeLte.default` - the main admin layout.
- `CakeLte.login` - an authentication layout (login, register, recovery).

## Using a layout

Set the layout in your controller:

```php
$this->viewBuilder()->setLayout('CakeLte.default');
```

Or set the `$layout` property in `AppView` (shown below).

## Using the `CakeLteTrait`

The recommended way to wire the plugin is the `CakeLteTrait` in
`src/View/AppView.php`:

```php
namespace App\View;

use Cake\View\View;
use CakeLte\View\CakeLteTrait;

class AppView extends View
{
    use CakeLteTrait;

    protected string $layout = 'CakeLte.default';

    public function initialize(): void
    {
        parent::initialize();
        $this->initializeCakeLte();
    }
}
```

Calling `initializeCakeLte()` registers:

- the `CakeLte.CakeLte` helper,
- the BootstrapUI helpers (`Html`, `Form`, `Flash`, `Paginator`,
  `Breadcrumbs`, `ColorMode`),
- the menu helpers (`Menu` and `MenuLte`).

## Content blocks

The `CakeLte.default` layout renders the page title and a `headerEnd` block:

```php
$this->assign('title', __('Dashboard'));

$this->start('headerEnd');
echo $this->Html->link(__('New'), ['action' => 'add'], ['class' => 'btn btn-primary']);
$this->end();
```

`headerEnd` replaces the default breadcrumb in the content header.

## Layout options

- `CakeLte.default`
- `CakeLte.login`

---
[Back to index](index.md)
