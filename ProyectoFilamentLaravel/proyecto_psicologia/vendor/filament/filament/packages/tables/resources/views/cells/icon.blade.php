@php
    $iconToShow = null;

    foreach ($column->getOptions() as $icon => $callback) {
        if (! $callback($column->getValue($record))) {
            continue;
        }

        $iconToShow = $icon;

        break;
    }
@endphp

@if ($iconToShow)
    @if ($column->getAction($record) !== null)
        <button
            wire:click="{{ $column->getAction($record) }}('{{ $record->getKey() }}')"
            type="button"
        >
            <x-dynamic-component :component="$iconToShow" class="{{ $classes ?? null }} w-6 h-6" />
        </button>
    @elseif ($column->getUrl($record) !== null)
        <a
            href="{{ $column->getUrl($record) }}"
            @if ($column->shouldUrlOpenInNewTab())
                target="_blank"
                rel="noopener noreferrer"
            @endif
        >
            <x-dynamic-component :component="$iconToShow" class="{{ $classes ?? null }} w-6 h-6" />
        </a>
    @else
        <x-dynamic-component :component="$iconToShow" class="{{ $classes ?? null }} w-6 h-6" />
    @endif
@endif
