@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Nuevo producto</h1>
    <form action="{{ url('/producto')}}" method="post" enctype="multipart/form-data">
        @csrf
        @include('producto.form')
    </form>
</div>

@endsection