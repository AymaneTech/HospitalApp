<x-layout>
    <main class="">
        <div class="bio flex justify-between gap-16 container mx-auto mt-12">
            <div>
                <img class="w-[400px] h-[80vh]" src="{{asset("storage/". $doctor->image->path) }}" alt="">
            </div>
            <div class="flex flex-col gap-8 w-[50vw]">
                <div class="flex justify-between items-center">
                    <h3 class="text-2xl font-bold">{{ $doctor->name }}</h3>
                    <form method="post" action="/favorite/create">
                        @csrf
                        <input type="hidden" name="doctor_id" value="{{ $doctor->id }}">
                        <button class="card-btn">Add To Favorite</button>
                    </form>
                </div>
                <div class="flex gap-8 items-center">
                    <h6 class="text-lg font-semibold border border-bg-gray-800 rounded-xl p-2 w-fit">{{$doctor->speciality->name}}</h6>
                    <p>working since {{ $doctor->created_at->diffForHumans() }}</p>
                </div>
                <p>{{ $doctor->description }}</p>
                <a class="card-btn w-fit" href="/appointment?doctor={{ $doctor->name }}">Make Appointment</a>
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
