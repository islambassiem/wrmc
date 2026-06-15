<section class="container mx-auto scroll-mt-36" id="doctors">
    <p class="my-10 text-primary-950 text-center text-3xl md:text-5xl font-extrabold">Meet our Doctors</p>
    <p class="my-5 text-primary-950 text-center text-xl md:text-3xl font-semibold max-w-xl mx-auto">Dedicated & Experienced Team</p>

    <div class="grid grid-cols-2 xl:grid-cols-4 gap-8">
        @foreach ($doctors as $doctor)
            <x-home.doctors.doctor-card
                :name="$doctor['name']"
                :title="$doctor['title']"
                :image="$doctor['image']"
            />
        @endforeach
    </div>
</section>
