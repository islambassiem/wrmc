<x-layouts.page>
    <x-home.hero />
    <x-home.stats />
    <x-home.medicare />
    <x-home.features />
    <x-home.why-us />
    <x-home.services :services="$services" />
    <x-home.ndis />
    <x-home.doctors :doctors="$doctors" />
    <x-home.telehealth />
    @if ($posts->count())
        <x-home.blog :posts="$posts" />
    @endif
    <x-home.accepted-cards />
    <x-home.cta />
    <x-home.contacts />
    <x-home.footer />
</x-layouts.page>
