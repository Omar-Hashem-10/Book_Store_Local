@extends('dashboard.layout')

@section('title', 'Author')

@section('content_header')
<x-breadcrumb :breadcrumbs="generate_breadcrumbs()" />
@stop

@section('content')
<form action="{{route('dashboard.author.update', $author->id)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="row justify-content-start">
        <x-adminlte-input name="name" label="{{__('author.name')}}" type="text" value="{{$author->name}}"
            fgroup-class="col-md-4" />

            <div class="col-12 mt-4 text-start">
                <x-adminlte-button theme="outline-primary" class="btn-lg" type="submit" label="{{__('actions.save')}}"/>
            </div>

        <x-adminlte-input name="author_id"  type="hidden" value="{{$author->id}}"
            fgroup-class="col-md-12" />
    </div>
</form>
@stop
