<section class="container mx-auto bg-gray-100 py-10 mb-10">
    <h2 class="font-bold text-3xl text-center text-primary-500">
        Accepted Health Cards & Partners
    </h2>
    <p class="leading-6 text-center text-gray-600 pt-4">Please call us at
        <span class="text-primary-800 font-bold"> 07 3412 8333</span>
        and we'll help you out.
    </p>

    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-6 mx-auto place-items-center">
        <x-home.accepted-cards.card-image
            url="{{ asset('assets/images/cards/Medicare-Bulk-BIlling-Practice.webp') }}"
        />
        <x-home.accepted-cards.card-image
            url="{{ asset('assets/images/cards/DVA-logo-circle-2c476cc2.webp') }}"
        />
        <x-home.accepted-cards.card-image
            url="{{ asset('assets/images/cards/my-aged-care-circle-logo-445bd72c.webp') }}"
        />
        <x-home.accepted-cards.card-image
            url="{{ asset('assets/images/cards/Workcover.png') }}"
        />
        <x-home.accepted-cards.card-image
            url="{{ asset('assets/images/cards/bsphn.png') }}"
        />
        <x-home.accepted-cards.card-image
            url="{{ asset('assets/images/cards/tile-logo-css-metro-south-health.png') }}"
        />
    </div>

</section>
