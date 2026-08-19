# Header

The app header (`templates/element/header/main.php`) renders a set of elements
in the right-aligned navbar (`ms-auto`). In order:

1. **Search** (`menu`, `search`) - the navbar search form and the mobile search icon.
2. **Messages** (`messages`) - the messages dropdown.
3. **Notifications** (`notifications`) - the notifications dropdown.
4. **Language** (`language`) - the language switcher dropdown.
5. **Fullscreen** (`fullscreen`) - the fullscreen toggle.
6. **Color mode** (`color-mode`) - the light/dark/auto theme toggle.
7. **User** (`user`) - the user menu dropdown.

## Search

The search field is shown on desktop (`md` and up) and hidden on small screens,
where a search icon links to the search page instead. The form `action` is
configurable through the element variable `$searchAction`:

```php
echo $this->element('CakeLte.header/search', ['searchAction' => '/search']);
```

## Language menu

The language dropdown is markup only by design: swapping the locale is the
application's job. Wire each item to your localization layer - for a CakePHP
app, point the links at a controller action that calls `I18n::setLocale()` and
redirects back:

```php
use Cake\I18n\I18n;

public function changeLanguage(string $lang): ResponseInterface
{
    I18n::setLocale($lang);
    $this->getRequest()->getSession()->write('Config.language', $lang);

    return $this->redirect($this->referer('/', true));
}
```

## Header elements

Each element lives in `templates/element/header/` and can be overridden (see
[Customization](customization.md)):

```
main.php
menu.php
search.php
messages.php
notifications.php
language.php
fullscreen.php
color-mode.php
user.php
```

---
[Back to index](index.md) · [Back to README](../README.md)
