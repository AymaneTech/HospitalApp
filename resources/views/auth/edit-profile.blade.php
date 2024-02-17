<x-dashboard-layout>
    <form action="{{ route("save-doctor", $doctor->id)}}" method="post" enctype="multipart/form-data">
        @method("patch")
        @csrf
        <div class="my-4 max-w-screen-md border px-4 shadow-xl sm:mx-4 sm:rounded-xl sm:px-4 sm:py-4 md:mx-auto">
            <div class="flex flex-col border-b py-4 sm:flex-row sm:items-start">
                <div class="shrink-0 mr-auto sm:py-3">
                    <p class="font-medium">Account Details</p>
                    <p class="text-sm text-gray-600">Edit your account details</p>
                </div>
                <button
                    class="mr-2 hidden rounded-lg border-2 px-4 py-2 font-medium text-gray-500 sm:inline focus:outline-none focus:ring hover:bg-gray-200">
                    Cancel
                </button>
                <button
                    class="hidden rounded-lg border-2 border-transparent bg-blue-600 px-4 py-2 font-medium text-white sm:inline focus:outline-none focus:ring hover:bg-blue-700">
                    Save
                </button>
            </div>
            <div class="flex flex-col gap-4 border-b py-4 sm:flex-row">
                <p class="shrink-0 w-32 font-medium">Name</p>
                <input placeholder="Complete name" name="name" value="{{ $doctor->name }}"
                       class="mb-2 w-full rounded-md border bg-white px-2 py-2 outline-none ring-blue-600 sm:mr-4 sm:mb-0 focus:ring-1"/>
                <x-specialities-select :specialities="$specialities"/>

            </div>
            <div class="flex flex-col gap-4 border-b py-4 sm:flex-row">
                <p class="shrink-0 w-32 font-medium">Contact</p>
                <input placeholder="aymane@gmail.com" name="email" value="{{ $doctor->email }}"
                       type="email"
                       class="mb-2 w-full rounded-md border bg-white px-2 py-2 outline-none ring-blue-600 sm:mr-4 sm:mb-0 focus:ring-1"/>
                <input placeholder="+212 714934362" name="phone" value="{{ $doctor->phone ?? false }}"
                       type="phone"
                       class="w-full rounded-md border bg-white px-2 py-2 outline-none ring-blue-600 focus:ring-1"/>
            </div>
            <div class="flex flex-col gap-4 border-b py-4 sm:flex-row">
                <p class="shrink-0 w-32 font-medium">Description</p>
                <textarea name="description" class="w-full rounded-md border bg-white px-2 py-2 outline-none ring-blue-600 focus:ring-1">
                {{ $doctor->description ?? false }}
            </textarea>
            </div>

            <div class="flex flex-col gap-4 py-4  lg:flex-row">
                <div class="shrink-0 w-32  sm:py-4">
                    <p class="mb-auto font-medium">Avatar</p>
                    <p class="text-sm text-gray-600">Change your avatar</p>
                </div>
                <div
                    class="flex h-56 w-full flex-col items-center justify-center gap-4 rounded-xl border border-dashed border-gray-300 p-5 text-center">
                    <img src="{{ asset("storage/".$doctor->image->path) }}" class="h-16 w-16 rounded-full"/>
                    <p class="text-sm text-gray-600">Drop your desired image file here to start the upload</p>
                    <input type="file" name="user_avatar"
                           class="max-w-full rounded-lg px-2 font-medium text-blue-600 outline-none ring-blue-600 focus:ring-1"/>
                </div>
            </div>
            {{--        <div class="flex justify-end py-4 sm:hidden">--}}
            {{--            <button--}}
            {{--                class="mr-2 rounded-lg border-2 px-4 py-2 font-medium text-gray-500 focus:outline-none focus:ring hover:bg-gray-200">--}}
            {{--                Cancel--}}
            {{--            </button>--}}
            {{--            <button--}}
            {{--                class="rounded-lg border-2 border-transparent bg-blue-600 px-4 py-2 font-medium text-white focus:outline-none focus:ring hover:bg-blue-700">--}}
            {{--                Save--}}
            {{--            </button>--}}
            {{--        </div>--}}
        </div>
    </form>
</x-dashboard-layout>
