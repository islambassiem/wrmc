@props(['name', 'class'])
@php
    $svg = file_get_contents(resource_path("svg/{$name}.svg"));

    $svg = preg_replace(
        '/<svg\b([^>]*)>/',
        '<svg$1 class="' . $class . '">',
        $svg,
        1
    );
@endphp

{!! $svg !!}
