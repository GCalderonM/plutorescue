<label for="animal_type">{{ __('global.animal-type') }}</label>
<select wire:model="selectedType" required id="animal_type" name="type" class="form-control">
    <option value="">{{ __('global.select') }}</option>
    @foreach($types as $type)
        <option @if($type->id == $selectedType) selected  @endif
                value="{{ $type->id }}">{{ __('global.'.$type->typeName) }}</option>
    @endforeach
</select>
