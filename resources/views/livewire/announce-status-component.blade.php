<label for="announce_status">{{ __('global.announce-status') }}</label>
<select wire:model="selectedStatus" required id="announce_status" name="status" class="form-control">
    <option value="">{{ __('global.select') }}</option>
    @foreach($statuses as $status)
        <option @if($status->id == $selectedStatus) selected  @endif
                value="{{ $status->id }}">{{ __('global.'.$status->statusName) }}</option>
    @endforeach
</select>
