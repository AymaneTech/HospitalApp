@props(["doctor_id", "booked_shifts"])
<!-- Main modal -->
<div id="select-modal" tabindex="-1" aria-hidden="true"
     class="hidden overflow-y-auto overflow-x-hidden fixed top-0 rihgt-0 left-0 z-50 justify-center items-center md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                <h3 class="text-lg font-semibold text-gray-900 ">
                    Open Shifts
                </h3>
                <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm h-8 w-8 ms-auto inline-flex justify-center items-center"
                        data-modal-toggle="select-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                         viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5">
                <p class="text-gray-500 mb-4">Select your desired time:</p>
                <form action="{{ route('appointment-store') }}" method="post">
                    @csrf
                    <input type="hidden" name="doctor_id" value="{{ $doctor_id }}">
                    <ul class="space-y-4 mb-4">
                        @foreach (App\Enums\Time::map() as $shift)
                            @php
                                $isBooked = false;
                            @endphp

                            @foreach ($booked_shifts as $booked_shift)
                                @if ($shift === $booked_shift->time)
                                    @php
                                        $isBooked = true;
                                        break;
                                    @endphp
                                @endif
                            @endforeach
                            <li>
                                <input type="radio" id="shift_{{ $loop->index }}" name="time" value="{{ $shift }}"
                                       class="hidden" required @if ($isBooked) disabled @endif>
                                <label for="shift_{{ $loop->index }}"
                                       class="inline-flex items-center justify-between w-full p-5 @if ($isBooked) text-red-600 bg-red-200 border border-red-300 cursor-not-allowed @else text-gray-900 bg-white border border-gray-200 hover:text-gray-900 hover:bg-gray-100 cursor-pointer @endif rounded-lg">
                                    <div class="block">
                                        <div class="w-full text-lg font-semibold">{{ $shift }}</div>
                                    </div>
                                </label>
                            </li>
                        @endforeach
                    </ul>
                    <button type="submit"
                            class="text-white inline-flex w-full justify-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        Next step
                    </button>
                </form>

            </div>
        </div>
    </div>
</div>
