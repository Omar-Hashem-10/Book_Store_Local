@extends('dashboard.layout')

@section('title', 'Flash Sale')

@section('content_header')
<x-breadcrumb :breadcrumbs="generate_breadcrumbs()" />
@stop

@section('content')
<form action="{{route('dashboard.flash-sale.update', $flashSale->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row justify-content-start">
        <x-adminlte-input name="name[en]" label="{{__('flash-sale.name_english')}}" type="text" value="{{$flashSale->getTranslation('name', 'en')}}"
            fgroup-class="col-md-6" />
        <x-adminlte-input name="name[ar]" label="{{__('flash-sale.name_arabic')}}" type="text" value="{{$flashSale->getTranslation('name', 'ar')}}"
            fgroup-class="col-md-6" />
        <x-adminlte-input name="description[en]" label="{{__('flash-sale.description_english')}}" type="text" value="{{$flashSale->getTranslation('description', 'en')}}"
            fgroup-class="col-md-6" />
        <x-adminlte-input name="description[ar]" label="{{__('flash-sale.description_arabic')}}" type="text" value="{{$flashSale->getTranslation('description', 'ar')}}"
            fgroup-class="col-md-6" />
        <x-adminlte-input name="date" label="{{__('flash-sale.date')}}" type="date" value="{{$flashSale->date}}"
            fgroup-class="col-md-6" />
        <x-adminlte-input name="time" label="{{__('flash-sale.time_minutes')}}" type="number" value="{{$flashSale->time}}"
            fgroup-class="col-md-6" />

            <div class="col-md-6">
                <label class="form-label">{{ __('flash-sale.is_active') }}</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="is_active" id="active" value="1"
                        {{ old('is_active', $flashSale->is_active ?? '1') == '1' ? 'checked' : '' }}>
                    <label class="form-check-label" for="active">
                        {{ __('flash-sale.active') }}
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="is_active" id="inactive" value="0"
                        {{ old('is_active', $flashSale->is_active ?? '1') == '0' ? 'checked' : '' }}>
                    <label class="form-check-label" for="inactive">
                        {{ __('flash-sale.inactive') }}
                    </label>
                </div>
            </div>


            <x-image-preview name="image" value="{{ $flashSale->getFirstMediaUrl('image')}}"/>


            <div class="col-12 mt-4 text-start">
                <x-adminlte-button theme="outline-primary" class="btn-lg" type="submit" label="{{__('actions.save')}}"/>
            </div>

        <x-adminlte-input name="flash_sale_id"  type="hidden" value="{{$flashSale->id}}"
            fgroup-class="col-md-12" />
    </div>
</form>
@stop
