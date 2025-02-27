<div class="card card-body mb-4">
    <form action="{{ route('dashboard.publisher.index') }}" method="GET">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="name">{{ __('publisher.name') }}</label>
                    <input
                        type="text"
                        name="name"
                        id="name"
                        class="form-control"
                        placeholder="{{ __('publisher.name_placeholder') }}"
                        value="{{ request('name') }}">
                </div>
            </div>
            <div class="col-md-12 text-end">
                @include('dashboard.partials.filter-actions')
            </div>
        </div>
    </form>
</div>
