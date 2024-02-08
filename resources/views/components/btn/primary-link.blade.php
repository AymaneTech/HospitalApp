@props(['href'])

<div class="button flex items-center justify-center space-y-4">
    <a href="{{ $href }}" class="font-semibold text-white bg-[#0155B7] px-8 py-2 rounded-3xl">{{ $slot }}</a>
</div>
