@extends('dashboard.layout')

@section('title', 'Author')

@section('content_header')
    <x-header>
        <x-slot:title>
            {{__('adminlte::adminlte.' . capitalize(last(generate_breadcrumbs())['text']))}}
        </x-slot:title>
        <x-slot:actions>
            <a href="{{ route('dashboard.author.create') }}" class="btn btn-success btn-lg">
                <i class="fas fa-plus"></i>
                {{ __('actions.create') }}
            </a>
        </x-slot:actions>
    </x-header>
    <x-breadcrumb :breadcrumbs="generate_breadcrumbs()" />
    @include('dashboard.author.partials.filter')
@endsection

@section('content')
<div class="d-flex col-3 justify-content-around my-2">
    <x-delete-selected model="Author" />
    <x-import-excel model="Author" />
    <x-export-excel model="Author" />
</div>
    <table class="table">
        <thead>
        <tr>
            <th><input type="checkbox" id="select-all"></th>
            <th>{{__('author.id')}}</th>
            <th>{{__('author.name')}}</th>
            <th>{{__('actions.created_at')}}</th>
            <th>{{__('actions.updated_at')}}</th>
            <th>{{__('actions.actions')}}</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($authors as $author)
            <tr>
                <td><input type="checkbox" class="row-checkbox" value="{{ $author->id }}"></td>
                <td>{{ $author->id }}</td>
                <td>{{ $author->name }}</td>
                <td>{{ $author->created_at }}</td>
                <td>{{ $author->updated_at }}</td>
                <td style="display: flex; gap: 12px;">
                    @include('dashboard.partials.actions', ['resource_name' => 'author', 'resource' => $author->id])
                </td>
            </tr>
        @endforeach
    </tbody>
    </table>
    {{ $authors->links() }}
@endsection
