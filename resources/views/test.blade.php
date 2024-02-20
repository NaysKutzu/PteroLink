@php
    $settingValue = \App\Models\Setting::getSetting('name');
@endphp

{{-- Now you can use $settingValue in your Blade file --}}
{{$settingValue}}
