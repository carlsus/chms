@props(['options' => []])

<select {!! $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm']) !!}>
    {{-- @foreach ($options as $key => $value )
        <option value="{{ $key }}">{{ $value }} </option>
    @endforeach --}}
    <option value="0">0</option>
</select>