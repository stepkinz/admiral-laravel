@props([
  'name' => 'personal_data_consent',
  'id' => 'personal_data_consent',
  'required' => true,
  'wrapperClass' => '',
  'inputClass' => '',
  'labelClass' => '',
])
@php
  $wrapperClass = $wrapperClass ?: 'flex items-start gap-3';
  $labelClass = $labelClass ?: 'text-slate-700 text-sm cursor-pointer select-none';
@endphp
<div class="{{ $wrapperClass }}">
  <input
    type="checkbox"
    name="{{ $name }}"
    id="{{ $id }}"
    value="1"
    {{ $required ? 'required' : '' }}
    class="mt-1 h-4 w-4 rounded border-slate-300 text-slate-900 focus:ring-slate-900 {{ $inputClass }}"
    aria-describedby="{{ $id }}_label"
  />
  <label for="{{ $id }}" id="{{ $id }}_label" class="{{ $labelClass }} flex-1">
    <span class="text-slate-800">Я согласен(-на) с </span>
    <a href="{{ route('legal.personal-data') }}" target="_blank" rel="noopener noreferrer" class="text-slate-500 underline hover:text-slate-700 focus:outline-none focus:ring-2 focus:ring-slate-900 focus:ring-offset-1 rounded">обработкой персональных данных.</a>
  </label>
</div>
@error($name)
  <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
@enderror
