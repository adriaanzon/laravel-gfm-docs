# Laravel GFM Docs

View the markdown documentation you write for GitHub, right in your Laravel app.

- Uses [league/commonmark](https://commonmark.thephpleague.com) to render Github flavored markdown.
- Uses [@tailwindcss/typography](https://tailwindcss.com/docs/typography-plugin) to display the rendered HTML.
- Displays the documentation from your resources/docs folder on the /docs route by default. The route can be customized in your routes file.
- The actual filename of the markdown document is used the URI, enabling relative links to function just like they do on GitHub.
- When a directory is visited without a filename, like GitHub, it displays the README.md of that directory.

## Installation

```
composer require adriaanzon/laravel-gfm-docs
```

After you installed the composer package, you need to register the route by adding it to your `routes/web.php` file:

```php
use AdriaanZon\LaravelGfmDocs\GfmDocs;

GfmDocs::routes();
```

<details>

<summary>You can further customize this route using Laravel's routing facilities.</summary>

To protect the route, you can add it to a route group and apply middleware:

```php
use AdriaanZon\LaravelGfmDocs\GfmDocs;

Route::middleware('auth')->group(function () {
    GfmDocs::routes();
});
```

You can customize the default location using the first parameter. For example, to change it from /docs to /documentation:

```php
use AdriaanZon\LaravelGfmDocs\GfmDocs;

GfmDocs::routes('documentation');
```
    
</details>

### Configuration file

Optionally, you can customize the settings by creating `config/gfm-docs.php`. See [the default settings](config/gfm-docs.php). Currently, only the Commonmark markdown converter can be customized.
