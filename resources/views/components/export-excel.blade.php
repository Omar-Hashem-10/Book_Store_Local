<form action="{{ route('dashboard.export.excel') }}" method="POST">
    @csrf
    <input type="hidden" name="model" value="{{ $model }}">
    <button type="submit" class="btn btn-success">
        {{ __('actions.export') }}
    </button>
</form>

