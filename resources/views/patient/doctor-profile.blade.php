@php
    $is_favorite = $doctor->favorites->where("patient_id", "=", auth("patient")->id())->first();
@endphp
<x-layout>
    <main class="">
        <div class="bio flex justify-between gap-16 container mx-auto mt-12">
            <div>
                <img class="w-[400px] h-[80vh]" src="{{asset("storage/". $doctor->image->path) }}" alt="">
            </div>
            <div class="flex flex-col gap-8 w-[50vw]">
                <div class="flex justify-between items-center">
                    <h3 class="text-2xl font-bold">{{ $doctor->name }}</h3>
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
                            <button class="">
                                <x-icon name="removeFromFavorite"/>
                            </button>
                        </form>
                    @endif
                </div>
                <div class="flex gap-8 items-center">
                    <h6 class="text-lg font-semibold border border-bg-gray-800 rounded-xl p-2 w-fit">{{$doctor->speciality->name}}</h6>
                    <p>working since {{ $doctor->created_at->diffForHumans() }}</p>
                </div>
                <p>{{ $doctor->description }}</p>
                <button data-modal-target="select-modal" data-modal-toggle="select-modal"
                        class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                        type="button">
                    Book now
                </button>
            </div>
        </div>
        <section class="comments container mx-auto">
            <div class="">
                <form action="{{ route("create-comment") }}" method="post"
                      class="w-[60vw]"
                      enctype="multipart/form-data"
                >
                    @csrf
                    <h2 class="text-4xl font-bold text-start text-blue-800 my-2">Leave a comment </h2>
                    <input type="hidden" name="doctor_id" value="{{ $doctor->id }}">
                    <div class="mb-8">
                        <textarea name="content" id="content" cols="30" rows="10"></textarea>
                    </div>

                    <div class="button flex items-start justify-end space-y-4">
                        <button class="font-semibold text-white bg-blue-800 px-8 py-2 rounded-3xl">Send</button>
                    </div>

                </form>
            </div>
            <div class="comments-items">
                @foreach($comments as $comment)
                    <div class="item my-12">
                        <div class="author flex items-center gap-8 mb-4">
                            <img class="w-12 h-12 rounded-full"
                                 src="{{ asset("storage/". $comment->patient->image->path) }}" alt="">
                            <h4 class="font-bold text-lg">{{ $comment->patient->name }}</h4>
                            <p>{{  $comment->created_at->diffForHumans() }}</p>
                        </div>
                        <div class="content ml-12 mb-4">
                            {!! $comment->content !!}
                        </div>
                        <hr/>
                    </div>
                @endforeach
            </div>
        </section>
    </main>
    <x-modals.appoitment :doctor="$doctor"/>

</x-layout>
<script>
    ClassicEditor
        .create(document.querySelector('#content'))
        .catch(error => {
            console.error(error);
        });
</script>
<style>
    .ck-editor__editable[role="textbox"] {
        /* Editing area */
        min-height: 200px;
    }
</style>
