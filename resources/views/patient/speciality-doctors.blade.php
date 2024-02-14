<x-layout>
    <div class="">
        <div class="bg-[url(/assets/images/hero2.png)] bg-cover w-[100vw] h-[70vh] text-center ">
            <h1 class=" font-bold text-6xl pt-16 mb-12">{{ $speciality->name }}</h1>
            <p>{{ $speciality->description }}</p>
        </div>
        <div>
            <h2 class="font-bold text-2xl text-center my-4">All Disponible Doctors</h2>
            <div
                class="container mx-auto overflow-x-hidden overflow-y-hidden h-full flex lg:gap-8 md:gap-6 gap-14 items-center justify-center transition ease-out duration-700 ">
                @if($doctors)
                    @foreach ($doctors as $doctor)
                        <div class="doctor-card flex flex-col gap-12 shadow-xl hover:shadow-2xl rounded-xl p-4">
                            <div class="w-[350px]">
                                <img class="h-64 w-full mb-4 " src="{{ asset("storage/". $doctor->image->path) }}"
                                     alt="">
                                <h3 class="text-2xl font-bold hover:text-blue-700"><a
                                        href="">{{ $doctor->name }}</a></h3>
                                <p>
                                    <span class="font-bold">Speciality: </span>{{ $doctor->speciality->name }}
                                </p>
                                <p>working since {{ $doctor->created_at->diffForHumans() }}</p>

                                <a href="/doctor-profile/{{ $doctor->name }}" class="card-btn">Go To Profile</a>
                            </div>
                        </div>
                    @endforeach
                @else
                    nothing found here
                @endif
            </div>
        </div>
    </div>
</x-layout>
