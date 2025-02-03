@extends('adminlte::page')

@section('title', 'Category')

@section('content_header')
<div class="d-flex justify-content-between">
    <h1>category</h1>
    <a href="{{route('dashboard.category.create')}}" class="btn btn-success btn-lg">
        <i class="fas fa-plus"></i>
        Create
    </a>
</div>
@stop

@section('content')
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Discount</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->discount?->code }}</td>
                <td>{{ $category->created_at }}</td>
                <td>{{ $category->updated_at }}</td>
                <td style="display: flex; gap: 12px;">
                    <a href="{{route('dashboard.category.show', $category->id)}}">
                        <x-adminlte-button theme="outline-primary" class="btn-flate" type="submit" label="View"/>
                    </a>
                    <a href="{{route('dashboard.category.edit', $category->id)}}">
                        <x-adminlte-button theme="outline-warning" class="btn-flate" type="submit" label="Edit"/>
                    </a>
                    <form action="{{route('dashboard.category.destroy', $category->id)}}" method="POST" style="margin: 0;">
                        @csrf
                        @method('DELETE')
                        <x-adminlte-button theme="outline-danger" class="btn-flate" type="submit" label="Delete"/>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
{{ $categories->links() }}
@stop
