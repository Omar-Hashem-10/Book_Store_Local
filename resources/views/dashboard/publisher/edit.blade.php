@extends('dashboard.layout')

@section('title', 'Publisher')

@section('content_header')
<x-breadcrumb :breadcrumbs="generate_breadcrumbs()" />
@stop

@section('content')
<form action="{{route('dashboard.publisher.update', $publisher->id)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="row justify-content-start">
        <x-adminlte-input name="name" label="{{__('publisher.name')}}" type="text" value="{{$publisher->name}}"
            fgroup-class="col-md-4" />

            <div class="col-12 mt-4 text-start">
                <x-adminlte-button theme="outline-primary" class="btn-lg" type="submit" label="{{__('actions.save')}}"/>
            </div>

        <x-adminlte-input name="publisher_id"  type="hidden" value="{{$publisher->id}}"
            fgroup-class="col-md-12" />
    </div>
</form>
@stop
