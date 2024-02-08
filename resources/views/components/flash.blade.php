@if(session()->has("success"))
    <div x-data="{ show: true }"
         x-init="setTimeout(() => show = false, 4000)"
         x-show="show"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 transform scale-90"
         x-transition:enter-end="opacity-100 transform scale-100"
         x-transition:leave="transition ease-in duration-300"
         x-transition:leave-start="opacity-100 transform scale-100"
         x-transition:leave-end="opacity-0 transform scale-90"
         class="fixed bottom-10 right-10 z-50">
        <div x-show="show"
             x-transition:enter="transition-opacity duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition-opacity duration-300"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="bg-green-500 text-white py-3 px-6 rounded-lg shadow-lg">
            <div>{{ session('success') }}</div>
            <button @click="show = false" class="text-sm text-green-100 hover:text-white absolute top-2 right-2 focus:outline-none">&times;</button>
        </div>
    </div>
@endif
