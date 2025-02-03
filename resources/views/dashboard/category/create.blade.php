@extends('adminlte::page')

@section('title', 'Category')

@section('content_header')
    <h1>Discount Create</h1>
@stop

@section('content')
<form action="{{route('dashboard.category.store')}}" method="POST">
    @csrf
    <div class="row justify-content-start">
        <x-adminlte-input name="name" label="name" type="text" placeholder="Enter category name"
            fgroup-class="col-md-4" />

        <x-adminlte-button theme="outline-primary" class="btn-lg" type="submit" label="Save"/>
    </div>
</form>
@stop
