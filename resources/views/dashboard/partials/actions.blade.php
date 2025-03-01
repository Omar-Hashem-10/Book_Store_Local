<a href="{{route('dashboard.'. $resource_name .'.show', $resource)}}">
    <x-adminlte-button theme="outline-primary" class="btn-flate" type="submit" label="{{__('actions.view')}}"/>
</a>
<a href="{{route('dashboard.'.$resource_name.'.edit', $resource)}}">
    <x-adminlte-button theme="outline-warning" class="btn-flate" type="submit" label="{{__('actions.edit')}}"/>
</a>
<form action="{{route('dashboard.'.$resource_name.'.destroy', $resource)}}" method="POST" id="delete-form" style="margin: 0;">
    @csrf
    @method('DELETE')
     <x-adminlte-button theme="outline-danger" type="submit" id="delete-btn" label="{{ __('actions.delete')}}"/>
</form>
