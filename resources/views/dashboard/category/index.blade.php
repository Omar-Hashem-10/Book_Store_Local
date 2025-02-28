@extends('dashboard.layout')

@section('title', 'Category')

@section('content_header')

<x-header>
    <x-slot:title>
        {{__('adminlte::adminlte.' . capitalize(last(generate_breadcrumbs())['text']))}}
    </x-slot:title>
    <x-slot:actions>
        <a href="{{ route('dashboard.category.create') }}" class="btn btn-success btn-lg">
            <i class="fas fa-plus"></i>
            {{ __('actions.create') }}
        </a>
    </x-slot:actions>
</x-header>
<x-breadcrumb :breadcrumbs="generate_breadcrumbs()" />
@stop

@section('content')
<table class="table">
    <thead>
        <tr>
            <th>{{__('category.id')}}</th>
            <th>{{__('category.image')}}</th>
            <th>{{__('category.name_english')}}</th>
            <th>{{__('category.name_arabic')}}</th>
            <th>{{__('category.discount')}}</th>
            <th>{{__('actions.created_at')}}</th>
            <th>{{__('actions.updated_at')}}</th>
            <th>{{__('actions.actions')}}</th>
        </tr>
    </thead>
    <tbody>
        @include('dashboard.category.partials.filter')
        @foreach ($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>
                    @if ($category->getFirstMediaUrl('image','preview'))
                        <img src="{{ $category->getFirstMediaUrl('image','preview')}}"
                            alt="Thumbnail"
                            style="width: 200px; height: 100px; object-fit: contain;">
                    @endif
                </td>
                <td> {{ $category->getTranslation('name','en') }}</td>
                <td> {{ $category->getTranslation('name','ar') }}</td>
                <td>{{ $category->discount?->code }}</td>
                <td>{{ $category->created_at }}</td>
                <td>{{ $category->updated_at }}</td>
                <td style="display: flex; gap: 12px;">
                    <a href="{{route('dashboard.category.show', $category->id)}}">
                        <x-adminlte-button theme="outline-primary" class="btn-flate" type="submit" label="{{__('actions.view')}}"/>
                    </a>
                    <a href="{{route('dashboard.category.edit', $category->id)}}">
                        <x-adminlte-button theme="outline-warning" class="btn-flate" type="submit" label="{{__('actions.edit')}}"/>
                    </a>
                    <form action="{{route('dashboard.category.destroy', $category->id)}}" method="POST" style="margin: 0;">
                        @csrf
                        @method('DELETE')
                        <x-adminlte-button theme="outline-danger" class="btn-flate" type="submit" label="{{__('actions.delete')}}"/>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
{{ $categories->links() }}
@stop
