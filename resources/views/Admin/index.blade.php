<x-dashboard-layout>
                <x-section.admin-specialities :specialities="$specialities"/>

                <x-modals.create-speciality />

    <script src="{{ asset('assets/js/update-modal.js') }}"></script>
</x-dashboard-layout>
