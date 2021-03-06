{{--
    Various enhancements to do with "icons", "aria" and "toggle" buttons still to do.
--}}

@props([
    'icon',
    'aria-label',
    'no-ripple',
    'no-focus-ring',
    'no-touch-target',
    'no-touch-target-wrapper',
])

@php
    $hasRipple = ! ($noRipple ?? false);
    $hasFocusRing = ! ($noFocusRing ?? false);
    $hasTouchTarget = ! ($noTouchTarget ?? false);
    $hasTouchTargetWrapper = $hasTouchTarget && ! ($noTouchTargetWrapper ?? false);

    // ARIA-LABEL WORK
    // $ariaLabel // If present and no value, then this is (boolean) true.
                  // If present and value, then the value is strictly a string
    $ariaLabel = $ariaLabel ?? null;
    $ariaLabel = (is_string($ariaLabel) && $ariaLabel !== '') ? $ariaLabel : null;
    // $ariaLabel is now a non-empty string or null.
    $hasAriaLabel = ! is_null($ariaLabel);

    // ICON WORK
    $icon = $icon ?? null; // DO NOT CAST HERE (could be a string or a slot)
    $iconIsSlot = $icon instanceof Illuminate\View\ComponentSlot;
    if (! $iconIsSlot) {
        // "CAST" TO SLOT
        $icon = new Illuminate\View\ComponentSlot('<span class="material-icons">' . $icon . '</span>');
    }
    // $icon is now a slot

    $id = Str::uuid();
    $htmlFieldset = $attributes->has('href') ? 'a' : 'button';

    $attributes = $attributes->merge([
        'class' => 'mdc-icon-button material-icons',
        'data-mdc-auto-init' => $hasRipple ? 'MDCRipple' : false,
        'aria-label' => $hasAriaLabel ? $ariaLabel : false,
        'id' => $id,
    ]);
@endphp

@if ($hasTouchTargetWrapper)
    <div class="mdc-touch-target-wrapper">
@endif
    <{{ $htmlFieldset }} {{ $attributes }}>
        <div class="mdc-icon-button__ripple"></div>
        @if ($hasFocusRing) <span class="mdc-icon-button__focus-ring"></span> @endif
        {{ $icon }}
        @if ($hasTouchTarget) <span class="mdc-icon-button__touch"></span> @endif
    </{{ $htmlFieldset }}>
@if ($hasTouchTargetWrapper)
    </div>
@endif

@push('post-mdc-auto-init-js')
    @if ($hasRipple)
        document.getElementById('{{ $id }}').MDCRipple.unbounded = true;
    @endif
@endpush
