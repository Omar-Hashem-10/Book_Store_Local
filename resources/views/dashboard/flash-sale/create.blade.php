@extends('dashboard.layout')

@section('title', 'Flash Sale')

@section('content_header')
<x-breadcrumb :breadcrumbs="generate_breadcrumbs()" />
@stop

@section('content')
<form action="{{route('dashboard.flash-sale.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row justify-content-start">
        <x-adminlte-input name="name[en]" label="{{__('flash-sale.name_english')}}" value="{{ old('name.en') }}" type="text"
            placeholder="{{__('flash-sale.Enter_flash_sale_name_english')}}" fgroup-class="col-md-6" />

        <x-adminlte-input name="name[ar]" label="{{__('flash-sale.name_arabic')}}" value="{{ old('name.ar') }}" type="text"
            placeholder="{{__('flash-sale.Enter_flash_sale_name_arabic')}}" fgroup-class="col-md-6" />

        <x-adminlte-input name="description[en]" label="{{__('flash-sale.description_english')}}" value="{{ old('description.en') }}" type="text"
            placeholder="{{__('flash-sale.Enter_flash_sale_description_english')}}" fgroup-class="col-md-6" />

        <x-adminlte-input name="description[ar]" label="{{__('flash-sale.description_arabic')}}" value="{{ old('description.ar') }}" type="text"
            placeholder="{{__('flash-sale.Enter_flash_sale_description_arabic')}}" fgroup-class="col-md-6" />

        <x-adminlte-input name="date" label="{{__('flash-sale.date')}}" value="{{ old('date') }}" type="date"
            placeholder="{{__('flash-sale.Enter_flash_sale_date')}}" fgroup-class="col-md-6" />

        <x-adminlte-input name="time" label="{{__('flash-sale.time_minutes')}}" value="{{ old('time') }}" type="number"
            min="0" max="1440" placeholder="{{__('flash-sale.Enter_flash_sale_time_minutes')}}" fgroup-class="col-md-6" />

            <div class="col-md-6">
                <label class="form-label">{{ __('flash-sale.is_active') }}</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="is_active" id="active" value="1"
                        {{ old('is_active', '1') == '1' ? 'checked' : '' }}>
                    <label class="form-check-label" for="active">
                        {{ __('flash-sale.active') }}
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="is_active" id="inactive" value="0"
                        {{ old('is_active') == '0' ? 'checked' : '' }}>
                    <label class="form-check-label" for="inactive">
                        {{ __('flash-sale.inactive') }}
                    </label>
                </div>
            </div>

    </div>


    <x-image-preview name="image"/>

    <div class="row mt-3">
        <div class="col-12">
            <x-adminlte-button theme="outline-primary" class="btn-lg" type="submit" label="{{__('actions.save')}}"/>
        </div>
    </div>
</form>

@stop
