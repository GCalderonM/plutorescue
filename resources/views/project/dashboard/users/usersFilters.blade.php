<div class="row pt-3 pl-3 pr-3">
    <div class="col-12 col-lg-4">
        <div class="form-group">
            <label for="username">{{ __('global.username') }}</label>
            <input class="form-control" id="username" name="username" type="text" />
        </div>
    </div>
    <div class="col-12 col-lg-4">
        <div class="form-group">
            <label for="email">{{ __('global.email') }}</label>
            <input class="form-control" id="email" name="email" type="text" />
        </div>
    </div>
    <div class="col-12 col-lg-4">
        <div class="form-group">
            <label for="users_softDelete">{{ __('global.status') }}</label>
            <select id="users_softDelete" name="users_softDelete" class="form-control">
                <option selected value="1">{{ __('global.select-active') }}</option>
                <option value="2">{{ __('global.select-inactive') }}</option>
            </select>
        </div>
    </div>
</div>
