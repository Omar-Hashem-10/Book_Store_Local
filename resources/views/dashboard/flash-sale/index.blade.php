@extends('dashboard.layout')

@section('title', 'Flash-Sale')

@section('content_header')
    <x-header>
        <x-slot:title>
            {{__('adminlte::adminlte.' . capitalize(last(generate_breadcrumbs())['text']))}}
        </x-slot:title>
        <x-slot:actions>
            <a href="{{ route('dashboard.flash-sale.create') }}" class="btn btn-success btn-lg">
                <i class="fas fa-plus"></i>
                {{ __('actions.create') }}
            </a>
        </x-slot:actions>
    </x-header>
    <x-breadcrumb :breadcrumbs="generate_breadcrumbs()" />
@endsection

@section('content')

<table class="table">
    @include('dashboard.flash-sale.partials.filter')
    <thead>
        <tr>
            <th>{{__('flash-sale.id')}}</th>
            <th>{{__('flash-sale.name')}}</th>
            <th>{{__('flash-sale.description')}}</th>
            <th>{{__('flash-sale.date')}}</th>
            <th>{{__('flash-sale.time')}}</th>
            <th>{{__('flash-sale.is_active')}}</th>
            <th>{{__('actions.created_at')}}</th>
            <th>{{__('actions.updated_at')}}</th>
            <th>{{__('actions.actions')}}</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($flash_sales as $flash_sale)
            <tr>
                <td>{{ $flash_sale->id }}</td>
                <td>{{ $flash_sale->name }}</td>
                <td>{{ $flash_sale->description }}</td>
                <td>{{ $flash_sale->date }}</td>
                <td>{{ $flash_sale->time }}</td>
                <td>{{ $flash_sale->is_active }}</td>
                <td>{{ $flash_sale->created_at }}</td>
                <td>{{ $flash_sale->updated_at }}</td>
                <td style="display: flex; gap: 12px;">
                    @include('dashboard.partials.actions', ['resource_name' => 'flash-sale', 'resource' => $flash_sale->id])
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
{{ $flash_sales->links() }}
@endsection
