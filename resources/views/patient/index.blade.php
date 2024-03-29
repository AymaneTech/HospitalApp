<x-layout>
    <main>
        <x-section.hero />
        <x-section.about />
        <x-section.specialies :specialities="$specialities" />
        <x-section.doctors :doctors="$doctors" />
        <x-section.favorite :favorites="$favorites"/>

    </main>
    <script src="{{ asset('assets/js/slider.js') }}"></script>
</x-layout>
