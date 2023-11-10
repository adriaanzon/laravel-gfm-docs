<?php

namespace AdriaanZon\LaravelGfmDocs;

use AdriaanZon\LaravelGfmDocs\Http\Controllers\DocsController;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use League\CommonMark\ConverterInterface;
use League\CommonMark\Output\RenderedContentInterface;

class GfmDocs
{
    public static function routes(string $prefix = 'docs'): void
    {
        Route::get($prefix . '/{any?}', DocsController::class)
            ->name('gfm-docs.docs')
            ->where('any', '.*');
    }

    public static function render(string $filename): RenderedContentInterface
    {
        $converter = new (config('gfm-docs.markdown_converter'));
        assert($converter instanceof ConverterInterface);

        return $converter->convert(File::get($filename));
    }

    public static function cssFile(): string
    {
        return __DIR__ . '/../dist/laravel-gfm-docs.css';
    }
}
