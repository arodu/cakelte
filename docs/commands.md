# Commands

CakeLTE ships two console commands.

## `install`

Publishes the AdminLTE assets into your webroot (creates a symlink to the
vendor package):

```bash
bin/cake cakelte install
```

> The command declares `--overwrite` / `-o`, but 3.x does not apply it yet. If
> `webroot/adminlte` already exists, remove it before running the command again.

This is a manual step, not run automatically by composer.

## `copy_files`

Copies the plugin templates into your application so you can override them:

```bash
bin/cake cakelte copy_files --all
```

You can copy a single category:

```bash
bin/cake cakelte copy_files sidebar
```

| Argument | Description |
|----------|-------------|
| `type` | The category to copy: `layout`, `content`, `header`, `footer` or `sidebar`. |

| Option | Description |
|--------|-------------|
| `--all` / `-a` | Copy all files. |
| `--force` / `-f` | Force overwrite of existing files. |

Files are copied into `templates/plugin/CakeLte/` in your application. See
[Customization](customization.md) for the list of files.

---
[Back to index](index.md)
