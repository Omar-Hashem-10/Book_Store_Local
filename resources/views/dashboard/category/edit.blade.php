@extends('adminlte::page')

@section('title', 'Category')

@section('content_header')
    <h1>Category Edit</h1>
@stop

@section('content')
<form action="{{route('dashboard.category.update', $category->id)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="row justify-content-start">
        <x-adminlte-input name="name" label="name" type="text" value="{{$category->name}}"
            fgroup-class="col-md-4" />

        <x-adminlte-button theme="outline-primary" class="btn-lg" type="submit" label="Save"/>

        <x-adminlte-input name="category_id"  type="hidden" value="{{$category->id}}"
            fgroup-class="col-md-12" />
    </div>
</form>
@stop
