@props(['icon', 'name', 'placeholder', 'wire', 'type' => 'text', 'maxlength' => null, 'options'])

<div class="mt-5">
    <select wire:model.lazy="{{ $wire }}" class="form-select block w-full mt-1">
        <option value="">{{ $placeholder }}</option>
        @if (!empty($options))
            @foreach ($options as $option)
                @if (is_array($option) && isset($option['value'], $option['label']))
                    <option value="{{ $option['value'] }}">{{ $option['label'] }}</option>
                @endif
            @endforeach
        @else
            <option value="">No options available</option>
        @endif
    </select>
</div>
