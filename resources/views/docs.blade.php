<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>

    {{-- When displaying the readme of a directory, append a slash to the base URL to make relative links work. --}}
    @if ($isDirectory && !str_ends_with(request()->url(), '/'))
        <base href="{{ request()->url() }}/">
    @endif

    <style>
        <?php require \AdriaanZon\LaravelGfmDocs\GfmDocs::cssFile(); ?>
    </style>
</head>
<body>
<div>
    <article class="prose mx-auto py-8 px-4">
        {!! $renderedMarkdown !!}
    </article>
</div>
</body>
</html>
