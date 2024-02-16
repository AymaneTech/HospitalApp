@props(["specialities"])

<div class="col-span-2 sm:col-span-1">
    <label for="category" class="block mb-2 text-sm font-medium text-gray-900">Category</label>
    <select id="category" name="speciality_id"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
        @foreach ($specialities as $speciality)
            <option value="{{ $speciality->id }}">{{ $speciality->name }}</option>
        @endforeach
    </select>
</div>