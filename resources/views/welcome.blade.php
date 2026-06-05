<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('partials.head')

<body class="min-h-screen antialiased">
    <div class="min-h-screen bg-white font-sans">
        <x-home.hero />
        <x-home.stats />
        <x-home.medicare />
        <x-home.consultations />
        <x-home.features />
        <x-home.why-us />
        <x-home.services />
        <x-home.ndis />
        <x-home.telehealth />
        <x-home.cta />
        <x-home.footer />
    </div>
</body>

</html>
