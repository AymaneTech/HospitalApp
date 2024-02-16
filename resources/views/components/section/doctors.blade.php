@props(['doctors'])

<section id="doctors" class="slider-container m-16">
    <div class="headings text-center text-4xl my-8">
        <p>We Offer Specialized</p>
        <h2 class="font-bold">Our Doctors</h2>
    </div>
    <div class="flex items-center justify-center w-full h-full py-24 sm:py-8 px-4">
        <div class="w-full relative flex items-center justify-center">
            <x-btn.arrow arrow="left"/>
            <div class="container mx-auto overflow-x-hidden overflow-y-hidden">
                <div id="slider"
                     class="h-full flex lg:gap-8 md:gap-6 gap-14 items-center justify-center transition ease-out duration-700">
                    @foreach ($doctors as $doctor)
                        @php
                            $is_favorite = $doctor->favorites->where("patient_id", "=", auth("patient")->id())->first();
                        @endphp
                        <div class="doctor-card flex flex-col gap-12 shadow-xl hover:shadow-2xl rounded-xl p-4">
                            <div class="w-[350px]">
                                <img class="h-64 w-full mb-4 " src="{{ asset("storage/". $doctor->image->path) }}"
                                     alt="">
                                <div class="flex justify-between">
                                    <h3 class="text-2xl font-bold hover:text-blue-700">
                                        <a href="">{{ $doctor->name }}</a>
                                    </h3>
                                    @if(! $is_favorite)
                                        <form method="post" action="/favorite/create">
                                            @csrf
                                            <input type="hidden" name="doctor_id" value="{{ $doctor->id }}">
                                            <button class="">
                                                <x-icon name="addToFavorite"/>
                                            </button>
                                        </form>
                                    @else
                                        <form method="post" action="{{ route("delete-favorite", $is_favorite->id) }}">
                                            @method("delete")
                                            @csrf
                                            <input type="hidden" name="doctor_id" value="{{ $doctor->id }}">
                                            <button class="">
                                                <x-icon name="removeFromFavorite"/>
                                            </button>
                                        </form>
                                    @endif
                                </div>
                                <p>
                                    <span class="font-bold">Speciality: </span>{{ $doctor->speciality->name }}
                                </p>
                                <p>working since {{ $doctor->created_at->diffForHumans() }}</p>

                                <a href="/doctor-profile/{{ $doctor->name }}" class="card-btn">Go To Profile</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <x-btn.arrow arrow="right"/>

        </div>
    </div>


</section>
