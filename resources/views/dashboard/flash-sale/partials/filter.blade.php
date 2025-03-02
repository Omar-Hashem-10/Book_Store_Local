<div class="card card-body mb-4">
    <form action="{{ route('dashboard.flash-sale.index') }}" method="GET">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="name">{{ __('flash-sale.name') }}</label>
                    <input
                        type="text"
                        name="name"
                        id="name"
                        class="form-control"
                        placeholder="{{ __('flash-sale.name_placeholder') }}"
                        value="{{ request('name') }}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="description">{{ __('flash-sale.description') }}</label>
                    <input
                        type="text"
                        name="description"
                        id="description"
                        class="form-control"
                        placeholder="{{ __('flash-sale.description_placeholder') }}"
                        value="{{ request('description') }}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="date">{{ __('flash-sale.date') }}</label>
                    <input
                        type="date"
                        name="date"
                        id="date"
                        class="form-control"
                        placeholder="{{ __('flash-sale.Enter_flash_sale_date') }}"
                        value="{{ request('date') }}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="time">{{ __('flash-sale.time_minutes') }}</label>
                    <input
                        type="number"
                        name="time"
                        id="time"
                        class="form-control"
                        placeholder="{{ __('flash-sale.Enter_flash_sale_time_minutes') }}"
                        value="{{ request('time') }}">
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <label for="is_active">{{ __('flash-sale.is_active') }}</label>
                <select class="form-control" name="is_active" id="is_active">
                    <option value="1" {{ old('is_active', '1') == '1' ? 'selected' : '' }}>
                        {{ __('flash-sale.active') }}
                    </option>
                    <option value="0" {{ old('is_active') == '0' ? 'selected' : '' }}>
                        {{ __('flash-sale.inactive') }}
                    </option>
                </select>
            </div>

            <div class="col-md-12 text-end">
                @include('dashboard.partials.filter-actions')
            </div>
        </div>
    </form>
</div>
