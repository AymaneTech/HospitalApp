<x-dashboard-layout>
    <div class="min-h-screen bg-gray-50/50">
        @include('includes.admin-sidebar')
        <div class="p-4 xl:ml-80">
            @include('includes.admin-header')
            <div class="mt-12">
  
                <x-section.admin-statistics />

                <x-section.admin-table />

            </div>
            @include('includes.admin-footer')
        </div>
    </div>
    <x-modals.create-speciality />

</x-dashboard-layout>
