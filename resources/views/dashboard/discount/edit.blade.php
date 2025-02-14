@extends('dashboard.layout')

@section('title', 'Discount')

@section('content_header')
<x-breadcrumb :breadcrumbs="generate_breadcrumbs()" />@stop

@section('content')
<form action="{{route('dashboard.discount.update', $discount->id)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="row justify-content-start">
        <x-adminlte-input name="code" label="{{__('discount.code')}}" type="text" value="{{$discount->code}}"
            fgroup-class="col-md-4" />

        <x-adminlte-button theme="outline-primary" class="align-self-center"  id="generate-code"  label="{{__('discount.generate_discount_code')}}"/>

        <x-adminlte-input name="quantity"  label="{{__('discount.quantity')}}" type="number" value="{{$discount->quantity}}"
            fgroup-class="col-md-6" />

        <x-adminlte-input name="percentage" label="{{__('discount.percentage')}}"  type="text" value="{{$discount->percentage}}"
            fgroup-class="col-md-6" />

        <x-adminlte-input name="expiry_date"  label="{{__('discount.expiry_date')}}" type="datetime-local" value="{{$discount->expiry_date}}"
            fgroup-class="col-md-6" />

        <x-adminlte-button theme="outline-primary" class="btn-lg" type="submit" label="{{__('actions.save')}}"/>

        <x-adminlte-input name="discount_id"  type="hidden" value="{{$discount->id}}"
            fgroup-class="col-md-12" />
    </div>
</form>
@stop
