@props(['active'])

@php
$classes = ($active ?? false)
            ? 'menu-links'
            : 'menu-link';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
