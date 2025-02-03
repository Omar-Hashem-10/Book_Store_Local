@extends('adminlte::page')

@section('title', 'Category ')

@section('content_header')
    <h1>Category->{{ $category->id }}</h1>
@stop

@section('content')

<h1>{{$category->name}}</h1>

<form action="{{route('dashboard.category.add.discount', $category->id)}}" method="post">
    @csrf
    <select class="js-example-placeholder-single col-md-4 js-states form-control discount-select2" name="discount_id">
        <option></option>
      </select>
    <button type="submit">Save</button>
</form>

@stop

@section('js')
<script>
    $('.discount-select2').select2({
        placeholder: 'Select discount',
        ajax: {
            url: "{{route('discount.search')}}",
            dataType: 'json',
            processResults: function(data) {
                return {
                    results: data.data.discounts.map(discount => ({
                        id: discount.id,
                        text: discount.code + ' - ' + discount.percentage
                    }))
                };
            }
        }
    });
</script>


@endsection
