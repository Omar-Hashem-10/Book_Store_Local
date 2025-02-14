@extends('dashboard.layout')

@section('title', 'Category')

@section('content_header')
<x-breadcrumb :breadcrumbs="generate_breadcrumbs()" />
@stop

@section('content')
<form action="{{route('dashboard.category.store')}}" method="POST">
    @csrf
    <div class="row justify-content-start">
        <x-adminlte-input name="name[en]" label="{{__('category.name_english')}}" value="{{ old('name.en') }}" type="text"
            placeholder="Enter category name english" fgroup-class="col-md-4" />

        <x-adminlte-input name="name[ar]" label="n{{__('category.name_arabic')}}" value="{{ old('name.ar') }}" type="text"
            placeholder="Enter category name arabic" fgroup-class="col-md-4" />
    </div>

    <div class="row mt-3">
        <div class="col-12">
            <x-adminlte-button theme="outline-primary" class="btn-lg" type="submit" label="{{__('actions.save')}}"/>
        </div>
    </div>
</form>

@stop
