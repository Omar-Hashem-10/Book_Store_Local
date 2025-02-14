<div class="card card-body mb-4">
    <form action="{{ route('dashboard.category.index') }}" method="GET">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="name">{{ __('category.name') }}</label>
                    <input
                        type="text"
                        name="name"
                        id="name"
                        class="form-control"
                        placeholder="{{ __('category.name_placeholder') }}"
                        value="{{ request('name') }}">
                </div>
            </div>
            <div class="col-md-12 text-end">
                @include('dashboard.partials.filter-actions')
            </div>
        </div>
    </form>
</div>
