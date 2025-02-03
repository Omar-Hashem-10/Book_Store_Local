@extends('adminlte::page')

@section('title', 'Discount')

@section('content_header')
<div class="d-flex justify-content-between">
    <h1>Discount</h1>
    <a href="{{route('dashboard.discount.create')}}" class="btn btn-success btn-lg">
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
            <th>Code</th>
            <th>Quantity</th>
            <th>Percentage</th>
            <th>Expiry Date</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($discounts as $discount)
            <tr>
                <td>{{ $discount->id }}</td>
                <td>{{ $discount->code }}</td>
                <td>{{ $discount->quantity }}</td>
                <td>{{ $discount->percentage }}</td>
                <td>{{ $discount->expiry_date }}</td>
                <td>{{ $discount->created_at }}</td>
                <td>{{ $discount->updated_at }}</td>
                <td style="display: flex; gap: 12px;">
                    <a href="{{route('dashboard.discount.show', $discount->id)}}">
                        <x-adminlte-button theme="outline-primary" class="btn-flate" type="submit" label="View"/>
                    </a>
                    <a href="{{route('dashboard.discount.edit', $discount->id)}}">
                        <x-adminlte-button theme="outline-warning" class="btn-flate" type="submit" label="Edit"/>
                    </a>
                    <form action="{{route('dashboard.discount.destroy', $discount->id)}}" method="POST" style="margin: 0;">
                        @csrf
                        @method('DELETE')
                        <x-adminlte-button theme="outline-danger" class="btn-flate" type="submit" label="Delete"/>
                    </form>
                </td>



            </tr>
        @endforeach
    </tbody>
</table>
{{ $discounts->links() }}
@stop
