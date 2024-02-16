@props(['speciality'])

<div id="edit-modal-speciality" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 flex justify-center items-center w-full h-full bg-gray-100 bg-opacity-50">
    <div class="bg-white rounded-lg shadow-lg w-full md:max-w-2xl">
        <!-- Modal content -->
        <div class="flex flex-col">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 border-b">
                <h3 class="text-xl font-semibold text-gray-900">
                    Edit Speciality
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-full w-8 h-8 flex justify-center items-center focus:outline-none focus:ring-2 focus:ring-gray-300">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 space-y-4">
                <form method="POST" action="{{ route('speciality-update')}}">
                @csrf
                    @method('PATCH')
                    <div class="grid grid-cols-1 gap-y-4">
                        <input type="hidden" id="specialityId" name="id">
                        <input id="specialityName" name="name" type="text" 
                            class="border-gray-300 border rounded-md px-4 py-2 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        <input id="specialityDescription" name="description" type="text"
                            class="border-gray-300 border rounded-md px-4 py-2 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div class="pt-4 border-t border-gray-200">
                        <button data-modal-hide="edit-modal-speciality" type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-2 focus:ring-blue-300 font-medium rounded-lg py-2 px-4 text-sm focus:outline-none">Update</button>
                        <button data-modal-hide="edit-modal-speciality" type="button"
                            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-2 focus:ring-blue-300 font-medium rounded-lg py-2 px-4 text-sm border border-gray-200 focus:outline-none">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
