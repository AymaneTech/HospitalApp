<section id="favorite-section" class="hidden w-[500px] h-[100vh] bg-blue-100 fixed top-0 right-0 bg-white">
    <div class="flex justify-between mx-8 my-4">
        <h5 class="font-bold text-4xl">
            All the favorites
        </h5>
        <button id="close-btn">
            <x-icon name="close"/>
        </button>
    </div>
    <div class="allfavorites flex flex-col">
        @foreach($favorites as $favorite)
            <div class="card mx-16">
                <div class="flex justify-between">
                    <h3 class="text-lg font-semibold">
                        {{ $favorite->doctor->name }}
                    </h3>
                    <p>{{ $favorite->doctor->speciality->name }}</p>
                </div>
                <div class="flex justify-end gap-8">
                    <a href="/doctor-profile/{{ $favorite->doctor->name }}" class="card-btn">Go To Profile</a>
                    <button class="card-btn bg-red-600 hover:bg-red-700">Urgent</button>

                </div>
            </div>
        @endforeach
    </div>
</section>
