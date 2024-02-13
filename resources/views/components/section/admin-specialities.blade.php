<div class="mb-4 grid grid-cols-1 gap-6 xl:grid-cols-3">
    <div
        class="relative flex flex-col bg-clip-border rounded-xl bg-white text-gray-700 shadow-md overflow-hidden xl:col-span-2">
        <div
            class="relative bg-clip-border rounded-xl overflow-hidden bg-transparent text-gray-700 shadow-none m-0 flex items-center justify-between p-6">
            <div>
                <h6
                    class="block antialiased tracking-normal font-sans text-base font-semibold leading-relaxed text-blue-gray-900 mb-1">
                    The specialities</h6>
                <p
                    class="antialiased font-sans text-sm leading-normal flex items-center gap-1 font-normal text-blue-gray-600">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3"
                        stroke="currentColor" aria-hidden="true" class="h-4 w-4 text-blue-500">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5">
                        </path>
                    </svg>
                    <strong>{{ count($specialities) }}</strong> specialities
                </p>
            </div>
            <button data-modal-target="Create-speciality" data-modal-toggle="Create-speciality"
                class="middle none font-sans font-bold center transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 rounded-lg bg-gradient-to-tr from-blue-600 to-blue-400 text-white shadow-md shadow-blue-500/20 hover:shadow-lg hover:shadow-blue-500/40 active:opacity-[0.85]  flex items-center gap-4 px-4 capitalize"
                type="button">
                Create Speciality
            </button>
        </div>
        <div class="p-6 overflow-x-scroll px-0 pt-0 pb-2">
            <table class="w-full min-w-[640px] table-auto">
                <thead>
                    <tr>
                        <th class="border-b border-blue-gray-50 py-3 px-6 text-left">
                            <p class="block antialiased font-sans text-[11px] font-medium uppercase text-blue-gray-400">
                                Name</p>
                        </th>
                        <th class="border-b border-blue-gray-50 py-3 px-6 text-left">
                            <p class="block antialiased font-sans text-[11px] font-medium uppercase text-blue-gray-400">
                                Description</p>
                        </th>
                        <th class="border-b border-blue-gray-50 py-3 px-6 text-left">
                            <p class="block antialiased font-sans text-[11px] font-medium uppercase text-blue-gray-400">
                                N° Medicine</p>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($specialities as $speciality)
                        <tr>
                            <td class="py-3 px-5 border-b border-blue-gray-50">
                                <div class="flex items-center gap-4">
                                    <p
                                        class="block antialiased font-sans text-sm leading-normal text-blue-gray-900 font-bold">
                                        {{ $speciality->name }}</p>
                                </div>
                            </td>
                            <td class="py-3 px-5 border-b border-blue-gray-50">
                                <p class="block antialiased font-sans text-xs font-medium text-blue-gray-600">
                                    {{ $speciality->description }}</p>
                            </td>
                            <td class="py-3 px-5 border-b border-blue-gray-50">
                                <div class="w-10/12">
                                    <p class="antialiased font-sans mb-1 block text-xs font-medium text-blue-gray-600">
                                        {{ count($speciality->medicines) }}</p>
                                    <div
                                        class="flex flex-start bg-blue-gray-50 overflow-hidden w-full rounded-sm font-sans text-xs font-medium h-1">
                                        <div class="flex justify-center items-center h-full bg-gradient-to-tr from-blue-600 to-blue-400 text-white"
                                            style="width: {{ $speciality->medicine / 100 }};"></div>
                                    </div>
                                </div>
                            </td>
                            <td class="py-3 px-5 border-b border-blue-gray-50 flex items-center gap-2">
                                <button data-specialities-name="{{ $speciality->name }}"
                                    data-specialities-id="{{ $speciality->id }}"
                                    data-modal-target="edit-modal-speciality" data-modal-toggle="edit-modal-speciality"
                                    data-specialities-description="{{ $speciality->description }}"
                                    class=" bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full"
                                    type="button">
                                    <x-icon name="edit" />
                                </button>

                                <x-modals.update-speciality :speciality="$speciality" />

                                <form action="{{ route('speciality-delete', $speciality->name) }}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button>
                                        <x-icon name="delete" />
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $specialities->links() }}
        </div>
    </div>
</div>
