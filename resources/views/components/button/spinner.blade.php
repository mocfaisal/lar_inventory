@php
    $hasText = trim($slot) !== '';
    $btnClass = $class . ($hasText ? '' : ' btn-icon');
    $iconClass = $icon . ' icon-base' . ($hasText ? ' icon-sm me-1' : ' icon-md');
    $is_disabled = $isDisabled ? 'disabled' : '';
@endphp

<button type="{{ $type }}" {{ $attributes->merge(['class' => $btnClass]) }}
    @if ($loadingTarget) wire:target="{{ $loadingTarget }}" @endif wire:loading.attr="disabled"
    {{ $is_disabled }}>
    {{-- Spinner saat loading --}}
    <div wire:loading @if ($loadingTarget) wire:target="{{ $loadingTarget }}" @endif>
        <span class="spinner-border spinner-border-sm align-middle" aria-hidden="true"></span>
        <span class="visually-hidden" role="status">Loading...</span>
    </div>

    {{-- Isi tombol saat tidak loading --}}
    <div wire:loading.remove @if ($loadingTarget) wire:target="{{ $loadingTarget }}" @endif>

        @if ($icon)
            <span class="{{ $iconClass }}"></span>
        @endif

        @if ($hasText)
            {{ $slot }}
        @endif
    </div>
</button>
