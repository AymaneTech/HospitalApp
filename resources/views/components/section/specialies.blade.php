@props(['specialities'])

<section class="specialities container mx-auto">
    <div class="headings text-center text-4xl my-8">
        <p>We Offer Specialized</p>
        <h2 class="font-bold">Orthopedics To Meet Your Needs</h2>
    </div>
    <div class="specialities-cards grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 justify-around gap-8 ">
        @foreach ($specialities as $speciality)
            <div class="card-item">
                <img src="/assets/images/illlustration.png" alt="">
                <h3 class="text-2xl font-bold">{{ $speciality->name }}</h3>
                <p>
                    {{ $speciality->description }}
                </p>
                <a href="" class="card-btn">Learn more</a>
            </div>
        @endforeach
    </div>
</section>
