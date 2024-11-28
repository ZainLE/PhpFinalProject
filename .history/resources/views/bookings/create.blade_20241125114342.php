<div class="grid grid-cols-3 gap-4">
    @foreach($timeSlots as $slot)
        <div class="relative">
            <input type="radio"
                   name="time"
                   id="time_{{ $slot['time'] }}"
                   value="{{ $slot['time'] }}"
                   {{ !$slot['available'] ? 'disabled' : '' }}
                   class="peer hidden">
            <label for="time_{{ $slot['time'] }}"
                   class="block p-4 text-center rounded-lg border
                          {{ $slot['available']
                             ? 'cursor-pointer peer-checked:border-indigo-600 peer-checked:bg-indigo-50 hover:border-indigo-600'
                             : 'bg-gray-100 text-gray-400 cursor-not-allowed' }}">
                {{ $slot['formatted'] }}
            </label>
        </div>
    @endforeach
</div>
