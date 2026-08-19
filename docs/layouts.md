# Layouts

CakeLTE ships two layouts:

- `CakeLte.default` - the main admin layout.
- `CakeLte.login` - an authentication layout (login, register, recovery).

## Using a layout

Set the layout in your controller or in `AppView`:

```php
$this->viewBuilder()->setLayout('CakeLte.default');
```

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
- the BootstrapUI helpers,
- the menu helpers (`Menu` and `MenuLte`).

## Layout options

- `CakeLte.default`
- `CakeLte.login`

---
[Back to index](index.md) · [Back to README](../README.md)
