@props(['name', 'type'])
<div class="input-group">
    <input type="{{ $type }}" name="{{ $name }}" placeholder="{{ $name }}">
    @error($name)
    <span>{{ $message }}</span>
    @enderror
</div>
