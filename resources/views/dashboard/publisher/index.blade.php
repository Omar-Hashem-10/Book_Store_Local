@extends('dashboard.layout')

@section('title', 'Publisher')

@section('content_header')
    <x-header>
        <x-slot:title>
            {{__('adminlte::adminlte.' . capitalize(last(generate_breadcrumbs())['text']))}}
        </x-slot:title>
        <x-slot:actions>
            <a href="{{ route('dashboard.publisher.create') }}" class="btn btn-success btn-lg">
                <i class="fas fa-plus"></i>
                {{ __('actions.create') }}
            </a>
        </x-slot:actions>
    </x-header>
    <x-breadcrumb :breadcrumbs="generate_breadcrumbs()" />
    @include('dashboard.publisher.partials.filter')
@endsection

@section('content')
<div class="d-flex col-3 justify-content-around my-2">
    <x-delete-selected model="Publisher" />
    <x-import-excel model="Publisher" />
    <x-export-excel model="Publisher" />
</div>
    <table class="table">
        <thead>
        <tr>
            <th><input type="checkbox" id="select-all"></th>
            <th>{{__('publisher.id')}}</th>
            <th>{{__('publisher.name')}}</th>
            <th>{{__('actions.created_at')}}</th>
            <th>{{__('actions.updated_at')}}</th>
            <th>{{__('actions.actions')}}</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($publishers as $publisher)
            <tr>
                <td><input type="checkbox" class="row-checkbox" value="{{ $publisher->id }}"></td>
                <td>{{ $publisher->id }}</td>
                <td>{{ $publisher->name }}</td>
                <td>{{ $publisher->created_at }}</td>
                <td>{{ $publisher->updated_at }}</td>
                <td style="display: flex; gap: 12px;">
                    @include('dashboard.partials.actions', ['resource_name' => 'publisher', 'resource' => $publisher->id])
                </td>
            </tr>
        @endforeach
    </tbody>
    </table>
    {{ $publishers->links() }}
@endsection
