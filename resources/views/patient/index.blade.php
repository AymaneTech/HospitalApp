<x-layout>
    <main>
        <x-section.hero />
        <x-section.about />
        <x-section.specialies :specialities="$specialities" />

        <section class="slider-container">
            <div class="headings text-center text-4xl my-8">
                <p>We Offer expert doctors</p>
                <h2 class="font-bold">Orthopedics To Meet Your Needs</h2>
            </div>
            <div class="doctors-cards-slider">
                <div class="doctors-cards grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 justify-around gap-8">
                    @foreach ($doctors as $doctor)
                        <div class="card-item">
                            <img src"" alt="">
                            <h3 class="text-2xl font-bold">{{ $doctor->name }}</h3>
                            <p>
                                {{ $doctor->speciality->name }}
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>
            <button class="prev-btn">&#10094;</button>
            <button class="next-btn">&#10095;</button>
        </section>
        <script>
            const slider = document.querySelector('.doctors-cards-slider');
            const prevBtn = document.querySelector('.prev-btn');
            const nextBtn = document.querySelector('.next-btn');

            let slideIndex = 0;

            function showSlide(index) {
                const slides = document.querySelectorAll('.doctors-cards-slider .doctors-cards');
                if (index < 0) {
                    slideIndex = slides.length - 1;
                } else if (index >= slides.length) {
                    slideIndex = 0;
                }
                slider.style.transform = `translateX(${-slideIndex * 100}%)`;
            }

            prevBtn.addEventListener('click', () => {
                showSlide(slideIndex - 1);
            });

            nextBtn.addEventListener('click', () => {
                showSlide(slideIndex + 1);
            });

            showSlide(slideIndex);
        </script>
    </main>
</x-layout>
