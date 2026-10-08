@props(['type' => 'success'])

@php
    $styles = [
        'success' => 'bg-green-50 border-green-500 text-green-800',
        'error'   => 'bg-red-50 border-red-500 text-red-800',
    ];
    $icon = $type === 'success' ? '✅' : '⚠️';
@endphp

<div {{ $attributes->merge(['class' => 'border-l-4 p-4 rounded-lg mb-6 shadow-sm flex gap-2 ' . ($styles[$type] ?? $styles['success'])]) }} role="alert">
    <span>{{ $icon }}</span>
    <div>{{ $slot }}</div>
</div>