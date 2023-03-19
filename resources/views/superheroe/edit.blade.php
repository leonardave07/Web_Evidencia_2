Edición
<form action="{{url('/superheroe/'.$superheroe->id)}}" method="post" enctype="multipart/form-data">
@csrf
{{method_field('PATCH')}}
@include('superheroe.form')
</form>


