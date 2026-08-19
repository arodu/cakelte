# Pages

CakeLTE ships two sample pages you can use to test the layout.

## Debug page

The debug page shows application and plugin information. Link to it from any
template:

```php
echo $this->Html->link(__('CakeLTE debug page'), '/cakelte/debug');

// {your-url}/cakelte/debug
```

![Page Debug with default layout](page-debug_default.png)

## Sample page

The sample page (`/cakelte/sample`) demonstrates the menu helpers and various
Bootstrap navigation components (navbar, nav, nav-pills, nav-tabs).

Both pages are available when the plugin's routes are loaded.

---
[Back to index](index.md) · [Back to README](../README.md)
