<label for="animal_gender">{{ __('global.gender') }}</label>
<select wire:model="selectedGender" required id="animal_gender" name="gender" class="form-control">
    <option value="">{{ __('global.select') }}</option>
    @foreach($genders as $gender)
        <option @if($gender->id == $selectedGender) selected  @endif
                value="{{ $gender->id }}">{{ __('global.'.$gender->genderName) }}</option>
    @endforeach
</select>
