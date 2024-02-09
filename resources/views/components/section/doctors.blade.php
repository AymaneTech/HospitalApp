@props(['doctors'])
<section id="doctors" class="slider-container m-16">
    <div class="headings text-center text-4xl my-8">
        <p>We Offer Specialized</p>
        <h2 class="font-bold">Our Doctors</h2>
    </div>
    <div class="flex items-center justify-center w-full h-full py-24 sm:py-8 px-4">
        <div class="w-full relative flex items-center justify-center">
            <x-btn.arrow arrow="left" />
            <div class="container mx-auto overflow-x-hidden overflow-y-hidden">
                <div id="slider"
                    class="h-full flex lg:gap-8 md:gap-6 gap-14 items-center justify-center transition ease-out duration-700">
                    @foreach ($doctors as $doctor)
                        <div class="doctor-card flex flex-col gap-12 shadow-xl hover:shadow-2xl rounded-xl p-4">
                            <div class="w-[350px]">
                                <img src="/assets/images/illlustration.png" alt="">
                                <h3 class="text-2xl font-bold hover:text-blue-700"><a
                                        href="">{{ $doctor->name }}</a></h3>
                                <p>
                                    {{ $doctor->speciality->name }}
                                </p>
                                <span>working since {{ $doctor->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <x-btn.arrow arrow="right" />

        </div>
    </div>




</section>
