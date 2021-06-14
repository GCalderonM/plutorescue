<div class="row pt-3 pl-3 pr-3">
    <div class="col-12 col-lg-3">
        <div class="form-group">
            <label for="title">{{ __('global.title') }}</label>
            <input class="form-control" id="title" name="title" type="text" />
        </div>
    </div>
    <div class="col-12 col-lg-3">
        <div class="form-group">
            <label for="username">{{ __('global.username') }}</label>
            <input class="form-control" id="username" name="username" type="text" />
        </div>
    </div>
    <div class="col-12 col-lg-3">
        <div class="form-group">
            <label for="announce_status">{{ __('global.announce-status') }}</label>
            <select id="announce_status" name="announce_status" class="form-control">
                <option selected value="">{{ __('global.select') }}</option>
                <option value="1">{{ __('global.new') }}</option>
                <option value="2">{{ __('global.on-hold') }}</option>
                <option value="3">{{ __('global.adopted') }}</option>
            </select>
        </div>
    </div>
    <div class="col-12 col-lg-3">
        <div class="form-group">
            <label for="animal_type">{{ __('global.animal-type') }}</label>
            <select id="animal_type" name="animal_type" class="form-control">
                <option selected value="">{{ __('global.select') }}</option>
                <option value="1">{{ __('global.dog') }}</option>
                <option value="2">{{ __('global.cat') }}</option>
                <option value="3">{{ __('global.bird') }}</option>
                <option value="4">{{ __('global.rodent') }}</option>
            </select>
        </div>
    </div>
    <div class="col-12 col-lg-3">
        <div class="form-group">
            <label for="animal_gender">{{ __('global.gender') }}</label>
            <select id="animal_gender" name="animal_gender" class="form-control">
                <option selected value="">{{ __('global.select') }}</option>
                <option value="1">{{ __('global.male') }}</option>
                <option value="2">{{ __('global.female') }}</option>
            </select>
        </div>
    </div>
    <div class="col-12 col-lg-3">
        <div class="form-group">
            <label for="announces_softDelete">{{ __('global.status') }}</label>
            <select id="announces_softDelete" name="announces_softDelete" class="form-control">
                <option selected value="1">{{ __('global.select-active') }}</option>
                <option value="2">{{ __('global.select-inactive') }}</option>
            </select>
        </div>
    </div>
    <div class="col-12 col-lg-3 justify-content-center">
        <div class="form-group">
            <label for="delete_filters">{{ __('global.deleteFilters') }}</label>
            <input type="button" class="btn btn-primary btn-block" id="delete_filters"
                   value="{{ __('global.deleteFilters') }}" />
        </div>
    </div>
</div>
