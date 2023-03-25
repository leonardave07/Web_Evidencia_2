@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Nuevo superheroe</h1>
    <form action="{{ url('/superheroe')}}" method="post" enctype="multipart/form-data">
        @csrf
        @include('superheroe.form')
    </form>
</div>

@endsection