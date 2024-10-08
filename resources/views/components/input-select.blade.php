@props(['disabled' => false, 'options' => [], 'selected' => null, 'default' => null])

<select {!! $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm']) !!}>
    <option value="">Please select</option>
    @foreach ($options as $key => $value )

        <option value="{{ $value }}">{{ $key }} </option>
    @endforeach

</select>
