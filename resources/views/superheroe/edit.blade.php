@extends('layouts.app')

@section('content')
<div class="container">

    <h1>{{$superheroe->nombreSuper}}</h1>
    <form action="{{url('/superheroe/'.$superheroe->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        {{method_field('PATCH')}}
        @include('superheroe.form')
    </form>

</div>

@endsection
