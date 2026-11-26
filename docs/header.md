# Header

The app header (`templates/element/header/main.php`) renders:

1. The **navbar menu** (`menu`) - the sidebar toggle and the Home/Contact links.
2. The **desktop search form** (`search`).
3. The right-aligned navbar (`ms-auto`): the **mobile search icon**, then the
   messages, notifications, language, fullscreen, color mode and user elements.

## Search

The search field is shown on desktop (`md` and up) and hidden on small screens,
where a search icon links to the search page instead. Both the form and the
mobile icon read the `searchAction` view variable:

```php
$this->set('searchAction', '/search');
```

Set it in the template or layout that renders the header. Passing
`searchAction` only to `CakeLte.header/search` configures the desktop form but
not the mobile icon rendered by `CakeLte.header/main`.

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

The messages, notifications, language and user elements contain sample markup
(placeholder images, names and counts). Replace them with data from your
application; the language dropdown is intentionally markup-only.

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
[Back to index](index.md)
