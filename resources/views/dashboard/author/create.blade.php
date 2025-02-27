@extends('dashboard.layout')

@section('title', 'Author')

@section('content_header')
<x-breadcrumb :breadcrumbs="generate_breadcrumbs()" />
@stop

@section('content')
<form action="{{route('dashboard.author.store')}}" method="POST">
    @csrf
    <div class="row justify-content-start">
        <x-adminlte-input name="name" label="{{__('author.name')}}" value="{{ old('name') }}" type="text"
            placeholder="{{__('author.name_placeholder')}}" fgroup-class="col-md-4" />
    </div>

    <div class="row mt-3">
        <div class="col-12">
            <x-adminlte-button theme="outline-primary" class="btn-lg" type="submit" label="{{__('actions.save')}}"/>
        </div>
    </div>
</form>

@stop
