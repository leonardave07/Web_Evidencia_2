@extends('layouts.app')

@section('content')
<div class="container">

    <h1>{{$producto->nombre}}</h1>
    <form action="{{url('/producto/'.$producto->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        {{method_field('PATCH')}}
        @include('producto.form')
    </form>

</div>

@endsection
