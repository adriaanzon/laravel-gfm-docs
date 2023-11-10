<?php

namespace AdriaanZon\LaravelGfmDocs\Http\Controllers;

use AdriaanZon\LaravelGfmDocs\GfmDocs;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;
use League\CommonMark\ConverterInterface;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class DocsController
{
    public function __invoke(?string $path = null): View|BinaryFileResponse
    {
        $basePath = resource_path('docs');
        $absolutePath = "{$basePath}/{$path}";

        if (File::isFile($absolutePath)) {
            if (!str_starts_with(File::mimeType($absolutePath), 'text/')) {
                return Response::file($absolutePath);
            }

            $markdownFile = $absolutePath;
            $isDirectory = false;
        } elseif (File::isDirectory($absolutePath) && File::isFile("{$absolutePath}/README.md")) {
            $markdownFile = "{$absolutePath}/README.md";
            $isDirectory = true;
        } else {
            throw new NotFoundHttpException();
        }

        return view('gfm-docs::docs', [
            'relativePath' => Str::after($markdownFile, $basePath),
            'renderedMarkdown' => GfmDocs::render($markdownFile),
            'isDirectory' => $isDirectory,
        ]);
    }
}
