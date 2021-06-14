<div class="row">
    <div class="form-group col-12 col-md-6">
        <label for="community">{{__('global.community')}}</label>
        <select wire:model="selectedCommunity" class="form-control" name="community_id" id="community" required>
            <option selected value="">{{__('Selecciona una comunidad')}}</option>
            @foreach($communities as $community)
                <option value="{{$community->id}}">{{$community->name}}</option>
            @endforeach
        </select>
    </div>

    @if(!is_null($selectedCommunity))
        <div class="form-group col-12 col-md-6">
            <label for="province">{{__('global.province')}}</label>
            <select wire:model="selectedProvince" class="form-control" name="province_id" id="province" required>
                <option selected value="">{{__('Selecciona una provincia')}}</option>
                @foreach($provinces as $province)
                    <option value="{{$province->id}}">{{$province->name}}</option>
                @endforeach
            </select>
        </div>
    @endif
</div>
