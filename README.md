# Blank: Blueprint for WordPress plugin

Blueprint for develop new WordPress plugin.


## Description

Save time in WordPress plugin development.


## Features
* Extremely lightweight. 
* Already registered options page


## Security
* Blank is totally safe.


## Sviluppo locale (WordPress Playground)

Il file `blueprint.json` configura [WordPress Playground](https://wordpress.github.io/wordpress-playground/) (PHP 7.4, WP latest, login automatico, plugin attivato, landing sulla pagina Impostazioni).

Dalla root del plugin:

```bash
npx @wp-playground/cli@latest server --auto-mount --blueprint=blueprint.json
```

`--auto-mount` monta la cartella corrente come plugin (`wp-content/plugins/wp-blank-plugin`), quindi le modifiche ai file sono immediate. Se rinomini il plugin, aggiorna `pluginPath` e `landingPage` nel blueprint.

## Changelog

### 0.0.2
* Aggiunte costanti plugin, caricamento traduzioni, hook di activation/deactivation e markup base della pagina opzioni

### 0.0.1
* Initial release
