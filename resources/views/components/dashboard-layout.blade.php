@php $primaryColor = "#579DFF" @endphp
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=devi   ce-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="/assets/css/index.css">

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />

    <title>Medi Connect</title>
</head>

<body {{ $attributes->merge(['class' => '']) }}">
    <div class="min-h-screen bg-gray-50/50">
        @include('includes.admin-sidebar')
        <div class="p-4 xl:ml-80">
            @include('includes.admin-header')
            <div class="mt-12">

                {{ $slot }}


            </div>
            @include('includes.admin-footer')
        </div>
    </div>



    <x-flash />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/41.0.0/classic/ckeditor.js"></script>
</body>

</html>
