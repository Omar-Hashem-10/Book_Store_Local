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
            <div class="col-md-12 text-end">
                @include('dashboard.partials.filter-actions')
            </div>
        </div>
    </form>
</div>
