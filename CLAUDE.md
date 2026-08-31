# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## What this repo is

`wp-blank-plugin` is a minimal **starter blueprint** for new WordPress plugins, not a functioning feature plugin. It has no build tooling, no dependencies, no tests, and no assets (`Description` in [readme.txt](readme.txt) states "No JavaScript, no CSS, no database queries"). The intended workflow is: copy this repo, rename `blank` → the new plugin's slug everywhere, then build the real plugin on top of it.

There are no build/lint/test commands in this repo — it's plain PHP with no Composer/npm setup.

## Structure

- [wp-blank-plugin.php](wp-blank-plugin.php) — the plugin bootstrap file. Contains the plugin header docblock (Name/Description/Author/Version/Text Domain) and all current logic: registers a single admin options page under Settings via `admin_menu` → `add_options_page`.
- `index.php` (root and [languages/index.php](languages/index.php)) — empty silent-index files, a standard WP convention to prevent directory listing; not meant to contain logic.
- [languages/](languages/) — i18n directory matching the `Domain Path: /languages/` plugin header; no `.pot`/`.mo` files yet.
- [readme.txt](readme.txt) — WordPress.org-format plugin readme (used if this is ever published to the plugin directory).
- [README.md](README.md) — GitHub-facing readme, content mirrors `readme.txt`.

## Renaming convention when cloning this blueprint

The one explicit TODO in the code ([wp-blank-plugin.php:25](wp-blank-plugin.php)) is the instruction for adopting this blueprint:

> Sostituire "blank" con "nome_plugin" nei nomi e nelle funzioni (Replace "blank" with the new plugin's name in names and functions)

This means renaming the `blank` slug and the `trp_blank_plugin_*` function prefix consistently across:
- the plugin header fields (`Text Domain`, and effectively the `Plugin Name`) in `wp-blank-plugin.php`
- function names (currently prefixed `trp_blank_plugin_`)
- the options-page slug (`'blank'` passed to `add_options_page`)
- the main plugin filename itself, `readme.txt`/`README.md`, and the settings page strings ("Impostazioni Blank", "Blank")

Keep the `trp_` (author-specific) prefix pattern and the `defined( 'ABSPATH' ) || exit;` guard when extending — both are already established conventions in this file, not incidental.

## Language note

Some in-code comments and admin-facing strings are Italian (e.g. "Impostazioni Blank", "PAGINA OPZIONI PLUGIN"). Match this when editing existing strings; user-facing text should still go through WordPress i18n functions (`__()`, `_e()`) with the `blank` text domain so it can be localized, even though none of the current strings do this yet.
