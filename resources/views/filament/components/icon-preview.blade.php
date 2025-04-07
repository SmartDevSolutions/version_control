{{-- resources/views/filament/components/icon-preview.blade.php --}}
@if ($icon)
    <img src="{{ asset('images/icons/' . $icon) }}" alt="Icon Preview" style="height: 40px; margin-left: 10px;" />
@endif
