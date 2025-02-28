@extends('dashboard.layout')

@section('title', 'Category')

@section('content_header')
<x-breadcrumb :breadcrumbs="generate_breadcrumbs()" />
@stop

@section('content')
<form action="{{route('dashboard.category.update', $category->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row justify-content-start">
        <x-adminlte-input name="name[en]" label="{{__('category.name_english')}}" type="text" value="{{$category->getTranslation('name', 'en')}}"
            fgroup-class="col-md-4" />
        <x-adminlte-input name="name[ar]" label="{{__('category.name_arabic')}}" type="text" value="{{$category->getTranslation('name', 'ar')}}"
            fgroup-class="col-md-4" />

            <x-image-preview name="image" value="{{ $category->getFirstMediaUrl('image')}}"/>


            <div class="col-12 mt-4 text-start">
                <x-adminlte-button theme="outline-primary" class="btn-lg" type="submit" label="{{__('actions.save')}}"/>
            </div>

        <x-adminlte-input name="category_id"  type="hidden" value="{{$category->id}}"
            fgroup-class="col-md-12" />
    </div>
</form>
@stop
