<div class="row pt-3 pl-3 pr-3">
    <div class="col-12 col-lg-4">
        <div class="form-group">
            <label for="ip">{{ __('global.ip') }}</label>
            <input class="form-control" id="ip" name="ip" type="text" />
        </div>
    </div>
    <div class="col-12 col-lg-4">
        <div class="form-group">
            <label for="email">{{ __('global.email') }}</label>
            <input class="form-control" id="email" name="email" type="email" />
        </div>
    </div>
    <div class="col-12 col-lg-4">
        <div class="form-group">
            <label for="access_select">{{ __('global.status') }}</label>
            <select id="access_select" name="access_select" class="form-control">
                <option selected value="">{{ __('global.access') }}</option>
                <option value="1">{{ __('global.success') }}</option>
                <option value="0">{{ __('global.failed') }}</option>
            </select>
        </div>
    </div>
</div>
